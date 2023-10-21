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

        View::composer('content.system-admin.add_account', function ($view) {
            $collegeList = College::all();
            $view->with('collegeList', $collegeList);
        });
        View::composer('content.academic-admin.pending-eval', function ($view) {
            $formattedRecords = Evaluation_Records::with(['user.college'])
                ->join('users', 'users.studentID', '=', 'evaluation_records.faculty_id')
                ->join('college', 'users.collegeID', '=', 'college.id')
                ->select(
                    'evaluation_records.faculty_id',
                    'users.name',
                    'college.college_name',
                    'evaluation_records.academic_year',
                    'evaluation_records.semester',
                    DB::raw("CONCAT(evaluation_records.academic_year, ' ', evaluation_records.semester) AS academic_term"),
                    DB::raw('(SELECT COUNT(*) FROM evaluation_records eval WHERE eval.academic_year = evaluation_records.academic_year AND eval.semester = evaluation_records.semester) AS evaluated')
                )
                ->where('users.userType', 'Faculty')
                ->groupBy('evaluation_records.faculty_id', 'users.name', 'college.college_name', 'academic_term', 'academic_year', 'semester')
                ->get();

        
            $formattedRecords = $formattedRecords->map(function ($record) {
                return [
                    'faculty_id' => $record->faculty_id,
                    'name' => $record->name,
                    'college_name' => $record->college_name,
                    'academic_term' => $record->academic_term,
                    'evaluated' => $record->evaluated . '/30',
                    'academic_year' => $record->academic_year,
                    'semester' => $record->semester,
                ];
            });
        
            $view->with('facultyList', $formattedRecords);
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
        

        //End of Student

    }
}
