<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Evaluation_Records;
use App\Models\Evaluation_Responses;
use App\Models\Faculty;
use App\Models\Pending_Eval;
use App\Models\Program;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator; // Import the Validator class
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class StudentController extends Controller
{
    public function dashboard()
    {
        return view('content.student.dashboards-analytics');
    }
    public function evaluate()
    {
        return view('content.student.evaluation-form');
    }
    public function evaluationPro(Request $request)
    {
        // Get the currently authenticated user
        $user = Auth::user();
        $comment = $request->comment;
        
        $evalId = $request->input('faculty') . '-' . $request->input('AY') . '-' . $request->input('semester');


        // Validate the form data
        $validator = Validator::make($request->all(), [
            'faculty' => 'required',
            'AY' => 'required',
            'semester' => 'required',
            'college' => 'required',
            'department' => 'required',
            'comment' => 'required',
            // Add more validation rules for other input fields if needed
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'status_code' => '1', // Use a different status code for validation errors
                'message' => 'Please fill in all required fields.',
                'errors' => $validator->errors(),
            ]);
        }

        // Create an evaluation record
        $evaluationRecord = Pending_Eval::create([
            'student_id' => $user->studentID,
            'faculty_id' => $request->input('faculty'),
            'academic_year' => $request->input('AY'),
            'semester' => $request->input('semester'),
            'college_id' => $request->input('college'),
            'department_id' => $request->input('department'),
            'comment' => $request->input('comment'),
            'A1' => $request->input('A1'),
            'A2' => $request->input('A2'),
            'A3' => $request->input('A3'),
            'A4' => $request->input('A4'),
            'A5' => $request->input('A5'),
            'B1' => $request->input('B1'),
            'B2' => $request->input('B2'),
            'B3' => $request->input('B3'),
            'B4' => $request->input('B4'),
            'B5' => $request->input('B5'),
            'C1' => $request->input('C1'),
            'C2' => $request->input('C2'),
            'C3' => $request->input('C3'),
            'C4' => $request->input('C4'),
            'C5' => $request->input('C5'),
            'D1' => $request->input('D1'),
            'D2' => $request->input('D2'),
            'D3' => $request->input('D3'),
            'D4' => $request->input('D4'),
            'D5' => $request->input('D5'),
            'eval_id' => $evalId,
        ]);
        
        $evaluationRecord->save();

        // Return a JSON response with a status code of '0'
        return response()->json([
            'status_code' => '0',
            'message' => 'Evaluation submitted successfully.', // You can customize this message
        ]);
        // You can use $letterSums as needed in your application logic.
    }






    public function fetchDepartments(Request $request)
    {
        $collegeId = $request->input('college_id');

        // Fetch departments based on the selected college ID
        $departments = Department::where('college_id', $collegeId)->get();

        // Build HTML options for the department select
        $options = '<option value="">Select a department</option>';
        foreach ($departments as $department) {
            $options .= '<option value="' . $department->id . '">' . $department->department_name . '</option>';
        }

        return $options;
    }


    public function fetchFaculties(Request $request)
    {
        $collegeId = $request->input('college_id');

        // Fetch departments based on the selected college ID
        $faculties = User::where('userType', 'Faculty')
                         ->where('collegeID', $collegeId)
                         ->get();

        // Build HTML options for the department select
        $options = '<option value="">Select a faculty</option>';
        foreach ($faculties as $faculty) {
            $options .= '<option value="' . $faculty->studentID . '">' . $faculty->name . '</option>';
        }

        return $options;
    }
    public function showProfile()
    {
        $user = Auth::user();

        return view('content\student\layouts.sections.navbar.navbar', compact('user'));
    }


    public function historyList()
    {
        $user = Auth::user();
        $studentID = $user->studentID;
    $itemsPerPage = 5;

    $result = DB::table('pending_eval AS pe')
        ->select([
            'pe.id',
            'pe.faculty_id',
            'users.name',
            'department.department_name',
            DB::raw("CONCAT(pe.semester, ' ', 'AY', ' ', pe.academic_year) AS academic_period"),
        ])
        ->join('users', 'users.studentID', '=', 'pe.faculty_id')
        ->leftJoin('semantic_records AS sr', 'sr.eval_id', '=', 'pe.eval_id')
        ->join('college', 'college.id', '=', 'pe.college_id')
        ->leftJoin('department', 'department.id', '=', 'pe.department_id')
        ->where('pe.student_id', '=', $studentID)
        ->groupBy('pe.id',
        'pe.faculty_id',
        'users.name',
        'department.department_name', 'academic_period')
        ->simplePaginate($itemsPerPage);

    return view('content.student.history', compact('result'));
    }



    public function viewHistory(Request $request)
    {
        $pe = $request->input('pe');
        $user = Auth::user();
        $studentID = $user->studentID;

        $result = DB::table('pending_eval AS pe')
    ->select([
        'pe.id',
        'pe.faculty_id',
        'users.name',
        'department.department_name',
        DB::raw("CONCAT(pe.semester, ' ', 'AY', ' ', pe.academic_year) AS academic_period"),
        'pe.comment',
        'pe.A1',
        'pe.A2',
        'pe.A3',
        'pe.A4',
        'pe.A5',
        'pe.B1',
        'pe.B2',
        'pe.B3',
        'pe.B4',
        'pe.B5',
        'pe.C1',
        'pe.C2',
        'pe.C3',
        'pe.C4',
        'pe.C5',
        'pe.D1',
        'pe.D2',
        'pe.D3',
        'pe.D4',
        'pe.D5',
        DB::raw("SUM(pe.A1 + pe.A2 + pe.A3 + pe.A4 + pe.A5) AS TotalA"),
        DB::raw("SUM(pe.B1 + pe.B2 + pe.B3 + pe.B4 + pe.B5) AS TotalB"),
        DB::raw("SUM(pe.C1 + pe.C2 + pe.C3 + pe.C4 + pe.C5) AS TotalC"),
        DB::raw("SUM(pe.D1 + pe.D2 + pe.D3 + pe.D4 + pe.D5) AS TotalD")
    ])
    ->join('users', 'users.studentID', '=', 'pe.faculty_id')
    ->leftJoin('semantic_records AS sr', 'sr.eval_id', '=', 'pe.eval_id')
    ->join('college', 'college.id', '=', 'pe.college_id')
    ->leftJoin('department', 'department.id', '=', 'pe.department_id')
    ->where('pe.student_id', '=', $studentID)
    ->where('pe.id', '=', $pe)
    ->groupBy('pe.id', 'pe.faculty_id', 'users.name', 'department.department_name', 'academic_period', 'pe.comment', 'pe.A1', 'pe.A2', 'pe.A3', 'pe.A4', 'pe.A5', 'pe.B1', 'pe.B2', 'pe.B3', 'pe.B4', 'pe.B5', 'pe.C1', 'pe.C2', 'pe.C3', 'pe.C4', 'pe.C5', 'pe.D1', 'pe.D2', 'pe.D3', 'pe.D4', 'pe.D5')
    ->first();
            
        return view('content.student.view-history', compact('result'));
    }
}
