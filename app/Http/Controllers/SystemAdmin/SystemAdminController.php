<?php

namespace App\Http\Controllers\SystemAdmin;

use App\Http\Controllers\Controller;
use App\Models\Evaluation_Records;
use App\Models\Faculty;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Import the User model
use Illuminate\Support\Facades\Hash; // Import the Hash facade
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; // Import the Validator class
use Illuminate\Support\Facades\Http;

class SystemAdminController extends Controller
{
    public function dashboard()
    {
        return view('content.system-admin.dashboards-analytics');
    }
    public function add()
    {
        return view('content.system-admin.add_account');
    }
    public function pending()
    {
        return view('content.system-admin.pending-eval');
    }
    public function addPro(Request $request)
    {
        // Validate the request data (you can customize this based on your needs)
        $validatedData = $request->validate([
            'studentID' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
            'userType' => 'required|string|max:255',
            'college' => 'required||max:255',
        ]);

        // Validate the form data
        $validator = Validator::make($request->all(), [
            'studentID' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
            'userType' => 'required|string|max:255',
            'college' => 'required||max:255',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'status_code' => '1', // Use a different status code for validation errors
                'message' => 'Please fill in all required fields.',
                'errors' => $validator->errors(),
            ]);
        }

        // Hash the password
        $hashedPassword = Hash::make($validatedData['password']);

        // Create a new user with the validated and hashed data
        $user = User::create([
            'studentID' => $validatedData['studentID'],
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => $hashedPassword,
            'userType' => $validatedData['userType'],
            'collegeID' => $validatedData['college'],
        ]);
        // Return a JSON response with a status code of '0'
        return response()->json([
            'status_code' => '0',
            'message' => 'Evaluation submitted successfully.', // You can customize this message
        ]);
    }
    public function assign()
    {
        return view('content.system-admin.assign');
    }
    public function assignPro(Request $request)
    {
        // Validate the request data (you can customize this based on your needs)
        $validatedData = $request->validate([
            'studentID' => 'required|string|max:255',
            'facultyID' => 'required|string|max:255',
        ]);

        // Create a new user with the validated and hashed data
        $user = Faculty::create([
            'studentID' => $validatedData['studentID'],
            'facultyID' => $validatedData['facultyID'],
        ]);
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
            ->pluck('comment')->toArray();

        // Initialize an array to store sentiment analysis results
        $sentimentResults = [];

        // Loop through each text and perform sentiment analysis
        foreach ($textsArray as $text) {
            $response = Http::post('http://127.0.0.1:5000/predict_sentiment', [
                'text' => $text
            ]);

            if ($response->ok()) {
                $sentimentData = $response->json();

                // Process the sentiment analysis results
                $predictedSentiment = $sentimentData['predicted_sentiment'];
                $predictionScore = $sentimentData['prediction_score'];

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
        dd($sentimentResults);
        
    }


    
    public function showProfile()
    {
        $user = Auth::user();

        return view('content\system-admin\layouts\sections\navbar\navbar', compact('user'));
    }
}
