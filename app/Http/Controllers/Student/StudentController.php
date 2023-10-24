<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Evaluation_Records;
use App\Models\Evaluation_Responses;
use App\Models\Faculty;
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
        
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'faculty' => 'required',
            'AY' => 'required',
            'semester' => 'required',
            'college' => 'required',
            'department' => 'required',
            'program' => 'required',
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
        $evaluationRecord = Evaluation_Records::create([
            'student_id' => $user->studentID,
            'faculty_id' => $request->input('faculty'),
            'academic_year' => $request->input('AY'),
            'semester' => $request->input('semester'),
            'college_id' => $request->input('college'),
            'department_id' => $request->input('department'),
            'program_id' => $request->input('program'),
            'comment' => $request->input('comment'),
        ]);

        // Loop through the request data to calculate sums for each letter
        $letterSums = [
            'A' => 0,
            'B' => 0,
            'C' => 0,
            'D' => 0,
        ];

        foreach ($request->all() as $name => $value) {
            // Check if the input name starts with a letter and is followed by a number
            if (preg_match('/^([A-Z]+)(\d+)$/', $name, $matches)) {
                $letter = $matches[1];
                $response = (int)$value; // Convert the response to an integer

                // Update the sum for the letter
                if (array_key_exists($letter, $letterSums)) {
                    $letterSums[$letter] += $response;
                }
            }
        }

        // Now, $letterSums contains the sums for each letter (A, B, C, D)
        
        // Set the sums in the evaluation_record and save it
        $evaluationRecord->A = $letterSums['A'];
        $evaluationRecord->B = $letterSums['B'];
        $evaluationRecord->C = $letterSums['C'];
        $evaluationRecord->D = $letterSums['D'];
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
    public function fetchPrograms(Request $request)
    {
        $collegeId = $request->input('college_id');

        // Fetch departments based on the selected college ID
        $programs = Program::where('college_id', $collegeId)->get();

        // Build HTML options for the department select
        $options = '<option value="">Select a program</option>';
        foreach ($programs as $program) {
            $options .= '<option value="' . $program->id . '">' . $program->program_name . '</option>';
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
