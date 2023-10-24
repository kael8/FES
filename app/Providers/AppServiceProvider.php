<?php
namespace App\Providers;

use App\Models\College;
use App\Models\Evaluation_Records;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Student
        View::composer('content.student.dashboards-analytics', function ($view) {
            $user = Auth::user();
            $view->with('user', $user);
        });
        // Student
        View::composer('content.student.layouts.sections.navbar.navbar', function ($view) {
            $user = Auth::user();
            $view->with('user', $user);
        });
        // Faculty
        View::composer('content.faculty.layouts.sections.navbar.navbar', function ($view) {
            $user = Auth::user();
            $view->with('user', $user);
        });
        // Academic Admin
        View::composer('content.academic-admin.layouts.sections.navbar.navbar', function ($view) {
            $user = Auth::user();
            $view->with('user', $user);
        });

        View::composer('content.student.evaluation-form', function ($view) {
          $facultyList = User::with('faculty')
          ->select('users.*')
          ->join('faculty', 'users.studentID', '=', 'faculty.facultyID')
          ->get();

          $view->with('facultyList', $facultyList);

                
        });

        View::composer('content.student.modify_account', function ($view) {
            $facultyList = User::with('faculty')
            ->select('users.*')
            ->join('faculty', 'users.studentID', '=', 'faculty.facultyID')
            ->get();
  
            $view->with('facultyList', $facultyList);
  
                  
          });

        View::composer('content.system-admin.add_account', function ($view) {
            $collegeList = College::all();
            $view->with('collegeList', $collegeList);
        });

        View::composer('content.system-admin.modify_account', function ($view) {
            $collegeList = College::all();
            $view->with('collegeList', $collegeList);
        });

        
        
        
        
        



        View::composer('content.student.evaluation-form', function ($view) {
            $collegeList = College::all();
            $view->with('collegeList', $collegeList);
            $departmentList = Department::all();
            $view->with('departmentList', $departmentList);
            

            // Define the range of academic years you want to include
            $startYear = 2000;
            $endYear = 2100; // You can adjust this based on your needs

            // Create an array to store academic year options
            $academicYears = [];

            for ($year = $startYear; $year <= $endYear; $year++) {
                $nextYear = $year + 1;
                $academicYear = "{$year}-{$nextYear}";
                $academicYears[$academicYear] = $academicYear;
            }
            $view->with('academicYears', $academicYears);
        });
        
        View::composer('content.student.modify_account', function ($view) {
            $collegeList = College::all();
            $view->with('collegeList', $collegeList);
            $departmentList = Department::all();
            $view->with('departmentList', $departmentList);
            

            // Define the range of academic years you want to include
            $startYear = 2000;
            $endYear = 2100; // You can adjust this based on your needs

            // Create an array to store academic year options
            $academicYears = [];

            for ($year = $startYear; $year <= $endYear; $year++) {
                $nextYear = $year + 1;
                $academicYear = "{$year}-{$nextYear}";
                $academicYears[$academicYear] = $academicYear;
            }
            $view->with('academicYears', $academicYears);
        });

        //End of Student

    }
}
