<?php

namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FacultyController extends Controller
{
    public function dashboard()
    {
        return view('content.faculty.dashboards-analytics');
    }
    public function results()
    {
        $result = DB::table('semantic_analysis AS se')
            ->select([
                DB::raw("CONCAT(se.semester, ', AY ', se.academic_year) AS rating_period"),
                'users.name',
                'users.userType',
                'department.department_name',
                'users.studentID',
                'se.id',
                DB::raw('(se.A + se.B + se.C + se.D) AS total')
            ])
            ->join('users', 'users.studentID', '=', 'se.faculty_id')
            ->join('college', 'college.id', '=', 'users.collegeID')
            ->join('department', 'department.college_id', '=', 'college.id')
            ->where('se.faculty_id', '=', '2010460-10')
            ->get();
        return view('content.faculty.results', compact('result'));
    }
}
