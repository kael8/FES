<?php

namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FacultyController extends Controller
{
    public function dashboard()
    {
        return view('content.faculty.dashboards-analytics');
    }
    public function results()
    {
        $user = Auth::user();
        $studentID = $user->studentID;
        
        $result = DB::table('semantic_analysis AS se')
    ->select([
        DB::raw("CONCAT(se.semester, ', AY ', se.academic_year) AS rating_period"),
        'users.name',
        'users.userType',
        'department.department_name',
        'users.studentID',
        'se.id',
        DB::raw('CAST(se.A AS SIGNED) AS A'),
        DB::raw('CAST(se.B AS SIGNED) AS B'),
        DB::raw('CAST(se.C AS SIGNED) AS C'),
        DB::raw('CAST(se.D AS SIGNED) AS D'),
        DB::raw('(CAST(se.A AS SIGNED) + CAST(se.B AS SIGNED) + CAST(se.C AS SIGNED) + CAST(se.D AS SIGNED)) AS total')
    ])
    ->join('users', 'users.studentID', '=', 'se.faculty_id')
    ->join('college', 'college.id', '=', 'users.collegeID')
    ->join('department', 'department.college_id', '=', 'college.id')
    ->where('se.faculty_id', '=', $studentID)
    ->orderBy('se.academic_year')
    ->orderBy('se.semester')
    ->get();



        return view('content.faculty.results', compact('result'));
    }

    public function resultPro(Request $request)
    {
        $dataId = $request->input('dataId');

        $result = DB::table('semantic_analysis AS se')
            ->select([
                DB::raw("CONCAT(se.semester, ', AY ', se.academic_year) AS rating_period"),
                'users.name',
                'users.userType',
                'department.department_name',
                'users.studentID',
                'se.id',
                DB::raw('(se.A + se.B + se.C + se.D) AS total'),
                'se.A',
                'se.B',
                'se.C',
                'se.D'
            ])
            ->join('users', 'users.studentID', '=', 'se.faculty_id')
            ->join('college', 'college.id', '=', 'users.collegeID')
            ->join('department', 'department.college_id', '=', 'college.id')
            ->where('se.id', '=', $dataId)
            ->first(); // Use first() to get a single record

        if ($result) {
            return response()->json([
                'message' => 'Approved',
                'status_code' => 0,
                'A' => $result->A, // Access columns using object notation
                'B' => $result->B,
                'C' => $result->C,
                'D' => $result->D,
                'total' => $result->total,
                'rating_period' => $result->rating_period,
                'name' => $result->name,
                'service' => $result->userType,
                'dep' => $result->department_name
            ]);
        } else {
            return response()->json([
                'message' => 'Record not found',
                'status_code' => 404
            ], 404);
        }
}

}
