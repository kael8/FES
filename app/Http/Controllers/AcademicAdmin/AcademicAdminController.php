<?php

namespace App\Http\Controllers\AcademicAdmin;

use App\Http\Controllers\Controller;
use App\Models\Evaluation_Records;
use App\Models\Pending_Eval;
use App\Models\Semantic_Analysis;
use App\Models\Semantic_Records;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class AcademicAdminController extends Controller
{
    public function dashboard()
    {
        return view('content.academic-admin.dashboards-analytics');
    }

    public function pending(Request $request)
    {
        $user = Auth::user();
        $college = $user->collegeID;
        $department = $user->departmentID;
        $itemsPerPage = 5;
        $search = $request->input('search', ''); // Get the search query parameter

        $result = DB::table('pending_eval as er')
    ->select([
        'er.faculty_id',
        'users.name',
        'college.college_name',
        'er.academic_year',
        'er.semester',
        DB::raw("CONCAT(er.academic_year, ' ', er.semester, ' Semester') AS academic_period"),
        DB::raw("CONCAT((SELECT COUNT(*) FROM pending_eval WHERE er.academic_year = academic_year AND er.semester = semester), '/30') AS evaluated")
    ])
    ->leftJoin('semantic_records as sr', 'er.eval_id', '=', 'sr.eval_id')
    ->join('users', 'users.studentID', '=', 'er.faculty_id')
    ->join('college', 'users.collegeID', '=', 'college.id')
    ->where('users.userType', '=', 'Faculty')
    ->where('users.collegeID', '=', $college)
    ->where('er.department_id', '=', $department)
    ->groupBy('er.faculty_id', 'users.name', 'college.college_name', 'academic_period', 'er.academic_year', 'er.semester')
    ->whereNull('sr.eval_id') // Filters out rows with a match in semantic_records
    ->orWhereNull('er.eval_id') // Filters out rows with a match in pending_eval
    ->simplePaginate($itemsPerPage);



        return view('content.academic-admin.pending-eval', compact('result', 'search'));
    }


    public function analyzed()
{
    $user = Auth::user();
    $college = $user->collegeID;
    $department = $user->departmentID;
    
    // Check if the user is a dean
    $isDean = $user->is_dean;

    $result = DB::table('pending_eval AS pe')
    ->select([
        DB::raw("CONCAT(pe.semester, ', AY ', pe.academic_year) AS rating_period"),
        'users.name',
        'users.userType',
        'department.department_name',
        'users.studentID',
        'sr.id',
        'users.departmentID',
    ])
    ->join('users', 'users.studentID', '=', 'pe.faculty_id')
    ->join('semantic_records AS sr', 'sr.eval_id', '=', 'pe.eval_id')
    ->join('college', 'college.id', '=', 'pe.college_id')
    ->join('department', 'department.college_id', '=', 'pe.college_id');

// If the user is not a dean, filter results by department; if true, display all for the college
if (!$isDean) {
    $result->where(function ($query) use ($department) {
        $query->where('department.id', '=', $department);
    });
} else {
    // Remove the department filter when the user is a dean
    $result->where('pe.college_id', '=', $college);
}

$result = $result->groupBy(
    'users.name',
    'users.userType',
    'department.department_name',
    'users.studentID',
    'sr.id',
    'rating_period',
    'users.departmentID',
)->get();


    return view('content.academic-admin.analyzed', compact('result'));
}




    public function summary(Request $request)
    {
        $evalid = $request->input('evalid');

        $result = DB::table('semantic_records as sr')
    ->select([
        DB::raw("CONCAT(pe.semester, ', AY ', pe.academic_year) AS rating_period"),
        'users.name',
        'users.userType',
        'department.department_name',
        'sr.positive',
        'sr.negative',
        'sr.respondents',
        'department.department_head',
        'college.college_name',
        'college.full_coll_name',
        'department.department_head',
        DB::raw("CONCAT(pe.semester, ', AY ', pe.academic_year) AS rating_period"),
            DB::raw('ROUND((SUM(pe.A1) / sr.respondents), 2) AS A1'),
            DB::raw('ROUND((SUM(pe.A2) / sr.respondents), 2) AS A2'),
            DB::raw('ROUND((SUM(pe.A3) / sr.respondents), 2) AS A3'),
            DB::raw('ROUND((SUM(pe.A4) / sr.respondents), 2) AS A4'),
            DB::raw('ROUND((SUM(pe.A5) / sr.respondents), 2) AS A5'),
            DB::raw('ROUND((SUM(pe.B1) / sr.respondents), 2) AS B1'),
            DB::raw('ROUND((SUM(pe.B2) / sr.respondents), 2) AS B2'),
            DB::raw('ROUND((SUM(pe.B3) / sr.respondents), 2) AS B3'),
            DB::raw('ROUND((SUM(pe.B4) / sr.respondents), 2) AS B4'),
            DB::raw('ROUND((SUM(pe.B5) / sr.respondents), 2) AS B5'),
            DB::raw('ROUND((SUM(pe.C1) / sr.respondents), 2) AS C1'),
            DB::raw('ROUND((SUM(pe.C2) / sr.respondents), 2) AS C2'),
            DB::raw('ROUND((SUM(pe.C3) / sr.respondents), 2) AS C3'),
            DB::raw('ROUND((SUM(pe.C4) / sr.respondents), 2) AS C4'),
            DB::raw('ROUND((SUM(pe.C5) / sr.respondents), 2) AS C5'),
            DB::raw('ROUND((SUM(pe.D1) / sr.respondents), 2) AS D1'),
            DB::raw('ROUND((SUM(pe.D2) / sr.respondents), 2) AS D2'),
            DB::raw('ROUND((SUM(pe.D3) / sr.respondents), 2) AS D3'),
            DB::raw('ROUND((SUM(pe.D4) / sr.respondents), 2) AS D4'),
            DB::raw('ROUND((SUM(pe.D5) / sr.respondents), 2) AS D5'),

            DB::raw('ROUND((SUM(pe.A1 + pe.A2 + pe.A3 + pe.A4 + pe.A5) / sr.respondents), 2) AS TotalA'),
            DB::raw('ROUND((SUM(pe.B1 + pe.B2 + pe.B3 + pe.B4 + pe.B5) / sr.respondents), 2) AS TotalB'),
            DB::raw('ROUND((SUM(pe.C1 + pe.C2 + pe.C3 + pe.C4 + pe.C5) / sr.respondents), 2) AS TotalC'),
            DB::raw('ROUND((SUM(pe.D1 + pe.D2 + pe.D3 + pe.D4 + pe.D5) / sr.respondents), 2) AS TotalD'),
            DB::raw('ROUND((SUM(pe.A1 + pe.A2 + pe.A3 + pe.A4 + pe.A5 + pe.B1 + pe.B2 + pe.B3 + pe.B4 + pe.B5 + pe.C1 + pe.C2 + pe.C3 + pe.C4 + pe.C5 + pe.D1 + pe.D2 + pe.D3 + pe.D4 + pe.D5) / sr.respondents), 2) AS TotalSum'),
    ])
    ->join('pending_eval as pe', 'sr.eval_id', '=', 'pe.eval_id')
    ->join('users', 'pe.faculty_id', '=', 'users.studentID')
    ->join('college', 'college.id', '=', 'users.collegeID')
    ->join('department', 'department.college_id', '=', 'college.id')
    ->where('sr.id', '=', $evalid)
    ->groupBy(
        'sr.id',
        'pe.semester',
        'pe.academic_year',
        'users.name',
        'users.userType',
        'department.department_name',
        'department.department_head',
        'college.college_name',
        'college.full_coll_name',
        'department.department_head'
    )
    ->first();

    $commentData = DB::table('pending_eval AS pe')
    ->select('pe.comment')
    ->where('pe.id', '=', $evalid)
    ->get();

$comments = [];

foreach ($commentData as $row) {
    $comments[] = $row->comment;
}

$concatenatedComments = implode(' ', $comments);


        return view('content.academic-admin.summary', compact('result', 'concatenatedComments'));
    }

    public function analyzeSentiment(Request $request)
    {
        $facultyId = $request->input('facultyId');
        $academicYear = $request->input('academicYear');
        $semester = $request->input('semester');

        // Replace 'YourModel' with the appropriate model representing your database table
        $textsArray = Pending_Eval::where('faculty_id', $facultyId)
            ->where('academic_year', $academicYear)
            ->where('semester', $semester)
            ->select('eval_id', 'comment')
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

        $ed = '';

        // Loop through each text and perform sentiment analysis
        foreach ($textsArray as $text) {
            $response = Http::post('http://127.0.0.1:8080/predict_sentiment', [
                'text' => $text['comment']
            ]);
            $ed = $text['eval_id'];
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
                /*$A += $text['A'];
                $B += $text['B'];
                $C += $text['C'];
                $D += $text['D'];*/
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
        /*$A = $A/$num;
        $B = $B/$num;
        $C = $C/$num;
        $D = $D/$num;*/

        $positiveCount = number_format($positiveCount / $num * 100, 2);
        $negativeCount = number_format($negativeCount / $num * 100, 2);
        
        $up = new Semantic_Records;
        $up->positive = $positiveCount;
        $up->negative = $negativeCount;
        $up->respondents = $num;
        $up->eval_id = $ed;
        $up->save();

        // Create a new instance of the model and set the values
        /*$analysis = new Semantic_Analysis;
        $analysis->faculty_id = $facultyId;
        $analysis->academic_year = $academicYear;
        $analysis->semester = $semester;
        $analysis->A = number_format($A, 2);
        $analysis->B = number_format($B, 2);
        $analysis->C = number_format($C, 2);
        $analysis->D = number_format($D, 2);
        $analysis->positive = $positiveCount;
        $analysis->negative = $negativeCount;
        $analysis->respondents = $num;*/

        // Save the record to the database
        //$analysis->save();

        $evalid = $up->id;

        // Return the aggregated sentiment analysis results and counts
        return response()->json([
            'message' => 'Approved',
            'status_code' => 1,
            'evalid' => $evalid
        ]);
    }

    

}
