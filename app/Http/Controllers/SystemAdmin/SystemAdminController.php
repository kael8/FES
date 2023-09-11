<?php

namespace App\Http\Controllers\SystemAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SystemAdminController extends Controller
{
    public function dashboard()
    {
        return view('content.system-admin.dashboards-analytics');
    }
    public function showProfile()
    {
        $user = Auth::user();

        return view('content\system-admin\layouts\sections\navbar\navbar', compact('user'));
    }
}
