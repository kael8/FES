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
        
        $result = DB::table('semantic_records AS sr')
        ->select([
            'sr.id',
            'users.name',
            'users.userType',
            'department.department_name',
            'sr.positive',
            'sr.negative',
            'sr.respondents',
            'college.full_coll_name',
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
    ->join('pending_eval AS pe', 'sr.eval_id', '=', 'pe.eval_id')
        ->join('users', 'pe.faculty_id', '=', 'users.studentID')
        ->join('college', 'users.collegeID', '=', 'college.id')
        ->join('department', 'college.id', '=', 'department.college_id')
        ->groupBy(
            'sr.id',
            'sr.eval_id',
            'sr.positive',
            'sr.negative',
            'sr.respondents',
            'users.name',
            'users.userType',
            'department.department_name',
            'rating_period',
            'college.full_coll_name'
        )
        ->get();


        return view('content.faculty.results', compact('result'));
    }

    public function resultPro(Request $request)
    {
        $dataId = $request->input('dataId');

        $result = DB::table('semantic_records AS sr')
        ->select([
            'sr.id',
            'users.name',
            'users.userType',
            'department.department_name',
            'sr.positive',
            'sr.negative',
            'sr.respondents',
            'pe.comment',
            'pe.eval_id',
            'college.full_coll_name',
            'department.department_head',
            'college.college_name',
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
    ->join('pending_eval AS pe', 'sr.eval_id', '=', 'pe.eval_id')
        ->join('users', 'pe.faculty_id', '=', 'users.studentID')
        ->join('college', 'users.collegeID', '=', 'college.id')
        ->join('department', 'college.id', '=', 'department.college_id')
        ->groupBy(
            'sr.id',
            'sr.eval_id',
            'sr.positive',
            'sr.negative',
            'sr.respondents',
            'users.name',
            'users.userType',
            'department.department_name',
            'rating_period',
            'pe.comment',
            'college.full_coll_name',
            'department.department_head',
            'college.college_name',
        )
            ->where('sr.id', '=', $dataId)
            ->first(); // Use first() to get a single record

            $commentData = DB::table('pending_eval AS pe')
    ->select('pe.comment')
    ->where('pe.eval_id', '=', $result->eval_id)
    ->get();

$comments = [];

foreach ($commentData as $row) {
    $comments[] = $row->comment;
}

$concatenatedComments = implode(' ', $comments);

            
        if ($result) {
            return response()->json([
                'message' => 'Approved',
                'status_code' => 0,
                'A' => $result->TotalA, // Access columns using object notation
                'B' => $result->TotalB,
                'C' => $result->TotalC,
                'D' => $result->TotalD,
                'A1' => $result->A1,
                'A2' => $result->A2,
                'A3' => $result->A3,
                'A4' => $result->A4,
                'A5' => $result->A5,
                'B1' => $result->B1,
                'B2' => $result->B2,
                'B3' => $result->B3,
                'B4' => $result->B4,
                'B5' => $result->B5,
                'C1' => $result->C1,
                'C2' => $result->C2,
                'C3' => $result->C3,
                'C4' => $result->C4,
                'C5' => $result->C5,
                'D1' => $result->D1,
                'D2' => $result->D2,
                'D3' => $result->D3,
                'D4' => $result->D4,
                'D5' => $result->D5,
                'positive' => $result->positive,
                'negative' => $result->negative,
                'total' => $result->TotalSum,
                'rating_period' => $result->rating_period,
                'name' => $result->name,
                'service' => $result->userType,
                'dep' => $result->department_name,
                'comment' => $concatenatedComments,
                'college' => $result->full_coll_name,
                'dep_head' => $result->department_head,
                'college_name' => $result->college_name,
            ]);
        } else {
            return response()->json([
                'message' => 'Record not found',
                'status_code' => 404
            ], 404);
        }
}

}
