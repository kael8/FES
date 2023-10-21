<?php

namespace App\Http\Controllers\AcademicAdmin;

use App\Http\Controllers\Controller;
use App\Models\Evaluation_Records;
use App\Models\Semantic_Analysis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class AcademicAdminController extends Controller
{
    public function dashboard()
    {
        return view('content.academic-admin.dashboards-analytics');
    }

    public function pending()
    {
        return view('content.academic-admin.pending-eval');
    }

    public function analyzed()
    {
        $result = DB::table('semantic_analysis AS se')
            ->select([
                DB::raw("CONCAT(se.semester, ', AY ', se.academic_year) AS rating_period"),
                'users.name',
                'users.userType',
                'department.department_name',
                'users.studentID',
                'se.id'
            ])
            ->join('users', 'users.studentID', '=', 'se.faculty_id')
            ->join('college', 'college.id', '=', 'users.collegeID')
            ->join('department', 'department.college_id', '=', 'college.id')
            ->get();
            

        return view('content.academic-admin.analyzed', compact('result'));
    }

    public function summary(Request $request)
    {
        $evalid = $request->input('evalid');

        $result = DB::table('semantic_analysis AS se')
            ->select([
                DB::raw("CONCAT(se.semester, ', AY ', se.academic_year) AS rating_period"),
                'users.name',
                'users.userType',
                'department.department_name',
                'se.A',
                'se.B',
                'se.C',
                'se.D',
                DB::raw('(se.A + se.B + se.C + se.D) AS total')
            ])
            ->join('users', 'users.studentID', '=', 'se.faculty_id')
            ->join('college', 'college.id', '=', 'users.collegeID')
            ->join('department', 'department.college_id', '=', 'college.id')
            ->where('se.id', '=', $evalid)
            ->first();
            

        return view('content.academic-admin.summary', compact('result'));
    }

    public function analyzeSentiment(Request $request)
    {
        $facultyId = $request->input('facultyId');
        $academicYear = $request->input('academicYear');
        $semester = $request->input('semester');

        // Replace 'YourModel' with the appropriate model representing your database table
        $textsArray = Evaluation_Records::where('faculty_id', $facultyId)
            ->where('academic_year', $academicYear)
            ->where('semester', $semester)
            ->select('comment', 'A', 'B', 'C', 'D')
            ->get()
            ->toArray();

        // Initialize counters for positive and negative sentiments
        $positiveCount = 0;
        $negativeCount = 0;
        $A = 0;
        $B = 0;
        $C = 0;
        $D = 0;
        $num = 0;

        // Loop through each text and perform sentiment analysis
        foreach ($textsArray as $text) {
            $response = Http::post('http://127.0.0.1:5000/predict_sentiment', [
                'text' => $text['comment']
            ]);
            
            if ($response->ok()) {
                $sentimentData = $response->json();

                // Process the sentiment analysis results
                $predictedSentiment = $sentimentData['predicted_sentiment'];
                $predictionScore = $sentimentData['prediction_score'];

                // Increment the respective counter based on sentiment
                if ($predictedSentiment === 'Positive') {
                    $positiveCount++;
                } elseif ($predictedSentiment === 'Negative') {
                    $negativeCount++;
                }
                // Accumulate the values of 'A', 'B', 'C', and 'D'
                $A += $text['A'];
                $B += $text['B'];
                $C += $text['C'];
                $D += $text['D'];
                $num += 1;
                // Store the sentiment analysis results for this text
                $sentimentResults[] = [
                    'text' => $text,
                    'predicted_sentiment' => $predictedSentiment,
                    'prediction_score' => $predictionScore
                ];
            } else {
                return response()->json([
                    'error' => 'Failed to retrieve sentiment analysis data from the Flask API.'
                ], $response->status());
            }
        }
        // Get the average of 'A', 'B', 'C', and 'D'
        $A = $A/$num;
        $B = $B/$num;
        $C = $C/$num;
        $D = $D/$num;

        $positiveCount = number_format($positiveCount / $num * 100, 2);
        $negativeCount = number_format($negativeCount / $num * 100, 2);
                

        // Create a new instance of the model and set the values
        $analysis = new Semantic_Analysis;
        $analysis->faculty_id = $facultyId;
        $analysis->academic_year = $academicYear;
        $analysis->semester = $semester;
        $analysis->A = number_format($A, 2);
        $analysis->B = number_format($B, 2);
        $analysis->C = number_format($C, 2);
        $analysis->D = number_format($D, 2);
        $analysis->positive = $positiveCount;
        $analysis->negative = $negativeCount;
        $analysis->respondents = $num;

        // Save the record to the database
        $analysis->save();

        $evalid = $analysis->id;

        // Return the aggregated sentiment analysis results and counts
        return response()->json([
            'message' => 'Approved',
            'status_code' => 1,
            'evalid' => $evalid
        ]);
    }

    

}
