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
}
