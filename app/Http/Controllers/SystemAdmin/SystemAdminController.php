<?php

namespace App\Http\Controllers\SystemAdmin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Evaluation_Records;
use App\Models\Faculty;
use App\Models\Semantic_Analysis;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Import the User model
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; // Import the Hash facade
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; // Import the Validator class
use Illuminate\Support\Facades\Http;

class SystemAdminController extends Controller
{
    private $searchTable;
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

    public function modifylist(Request $request)
    {
        $itemsPerPage = 5;
        $search = $request->input('search', ''); // Get the search query parameter

        $result = DB::table('users')
            ->select([
                'users.name',
                'users.userType',
                'college.college_name',
                'department.department_name',
                'users.studentID',
                'users.id',
                'users.email',
            ])
            ->join('college', 'college.id', '=', 'users.collegeID')
            ->join('department', 'department.college_id', '=', 'college.id')
            ->where(function($query) use ($search) {
                $query->where('users.name', 'LIKE', '%' . $search . '%')
                    ->orWhere('users.studentID', 'LIKE', '%' . $search . '%')
                    ->orWhere('users.email', 'LIKE', '%' . $search . '%')
                    ->orWhere('college.college_name', 'LIKE', '%' . $search . '%')
                    ->orWhere('department.department_name', 'LIKE', '%' . $search . '%')
                    ->orWhere('users.userType', 'LIKE', '%' . $search . '%');
            })
            ->orderBy('users.name', 'asc')
            ->simplePaginate($itemsPerPage);

        return view('content.system-admin.modify_list', compact('result', 'search'));
    }



    public function showModifyList($results)
    {
        $result = $results;
        return view('content.system-admin.modify_list', compact('result'));
    }

    public function modify_account(Request $request)
    {
        $id = $request->input('id');

        $result = DB::table('users')
            ->select([
                'users.name',
                'users.userType',
                'college.college_name',
                'department.department_name',
                'users.studentID',
                'users.id',
                'users.email',
                'users.password',
                'collegeID'
            ])
            ->join('college', 'college.id', '=', 'users.collegeID')
            ->join('department', 'department.college_id', '=', 'college.id')
            ->where('users.studentID', $id) // Assuming $id is the user ID you want to fetch
            ->first(); // Use first() to get a single record

        return view('content.system-admin.modify_account', compact('result'));
    }

    public function addPro(Request $request)
{  
    if ($request->isDean) {
        $department = null;
    }
    // Validate the request data (you can customize this based on your needs)
    $validatedData = $request->validate([
        'studentID' => 'required|string|max:255',
        'name' => 'required|string|max:255',
        'password' => 'required|string|min:8',
        'userType' => 'required|string|max:255',
        'college' => 'required|max:255', // Remove extra '|'
        
    ]);

    // Validate the form data (you can keep this part for additional validation)
    $validator = Validator::make($request->all(), [
        'studentID' => 'required|string|max:255',
        'name' => 'required|string|max:255',
        'password' => 'required|string|min:8',
        'userType' => 'required|string|max:255',
        'college' => 'required|max:255', // Remove extra '|'
        'department' => $request->isDean !== '1' ? 'required|string|max:255' : '', // Make 'department' required only if the user is not a dean
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
        'password' => $hashedPassword,
        'userType' => $validatedData['userType'],
        'collegeID' => $validatedData['college'],
        'departmentID' => $request->isDean !== '1' ? $request->department : null,
        'is_dean' => $request->isDean == '1' ? $request->isDean : '0',
    ]);

    // Return a JSON response with a status code of '0'
    return response()->json([
        'status_code' => '0',
        'message' => 'User created successfully.', // You can customize this message
    ]);
}

    public function modifyPro(Request $request)
    {
        $id = $request->input('id');
        $studentID = $request->input('studentID');
        $name = $request->input('name');
        $email = $request->input('email');
        $userType = $request->input('userType');
        $college = $request->input('college');

        // Update the user's information based on the studentID
        $result = User::where('id', $id)->update([
            'studentID' => $studentID,
            'name' => $name, // Update with the new name
            'email' => $email, // Update with the new email
            'userType' => $userType, // Update with the new userType
            'collegeID' => $college, // Update with the new collegeID
        ]);

        if ($result) {
            // The update was successful
            return response()->json([
                'status_code' => 0,
                'message' => 'User information updated successfully.',
            ]);
        } else {
            // Handle the case where the update failed
            return response()->json([
                'status_code' => 1,
                'message' => 'User not found or update failed.',
            ]);
        }
    }

    public function removePro(Request $request)
    {
        $id = $request->input('id');

        // Delete the user based on the studentID
        $result = User::where('studentID', $id)->delete();

        if ($result) {
            // The delete was successful
            return redirect('/system-admin/modifylist');
        } else {
            // Handle the case where the delete failed
            return response()->json([
                'status_code' => 1,
                'message' => 'User not found or delete failed.',
            ]);
        }
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

    



    
    public function showProfile()
    {
        $user = Auth::user();

        return view('content\system-admin\layouts\sections\navbar\navbar', compact('user'));
    }
}
