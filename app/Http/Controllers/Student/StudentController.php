<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class StudentController extends Controller
{
    public function dashboard()
    {
        return view('content.student.dashboards-analytics');
    }

    public function showProfile()
    {
        $user = Auth::user();

        return view('content\student\layouts.sections.navbar.navbar', compact('user'));
    }
}
