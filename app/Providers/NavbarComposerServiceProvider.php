<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class NavbarComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('content.student.layouts.sections.navbar.navbar', function ($view) {
            $user = Auth::user();
            $view->with('user', $user);
        });
        View::composer('content.system-admin.layouts.sections.navbar.navbar', function ($view) {
            $user = Auth::user();
            $view->with('user', $user);
        });
        View::composer('layouts.sections.navbar.navbar', function ($view) {
            $user = Auth::user();
            $view->with('user', $user);
        });
    }
}
