<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserType
{
    public function handle($request, Closure $next, $userType)
    {
        // Check if the user is authenticated and has a userType
        if (!Auth::check() || !$request->user()->userType) {
            return redirect('/login'); // Redirect to the login page if not authenticated or userType is not defined
        }

        // Check if the user's userType matches the expected userType
        if ($request->user()->userType !== $userType) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
