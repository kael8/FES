<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

$controller_path = 'App\Http\Controllers';

// System Admin Routes

// System Admin Routes
Route::middleware(['userType:System Admin'])->group(function () use ($controller_path) {
    Route::get('/system-admin/dashboard', $controller_path . '\SystemAdmin\SystemAdminController@dashboard')->name('systemadmin.dashboard');
    Route::get('/system-admin/add', $controller_path . '\SystemAdmin\SystemAdminController@add')->name('systemadmin.add');
    Route::get('/system-admin/modifylist', $controller_path . '\SystemAdmin\SystemAdminController@modifylist')->name('systemadmin.modifylist');
    Route::get('/system-admin/modify-account', $controller_path . '\SystemAdmin\SystemAdminController@modify_account')->name('systemadmin.modifyaccount');
    Route::get('/system-admin/assign', $controller_path . '\SystemAdmin\SystemAdminController@assign')->name('systemadmin.assign');
    Route::get('/system-admin/pending-eval', $controller_path . '\SystemAdmin\SystemAdminController@pending')->name('systemadmin.pending-eval');
    // Add other system admin routes here
    Route::post('/pro-submit-add', $controller_path . '\SystemAdmin\SystemAdminController@addPro');
    Route::post('/pro-submit-modify', $controller_path . '\SystemAdmin\SystemAdminController@modifyPro');
    Route::post('/remove-account', $controller_path . '\SystemAdmin\SystemAdminController@removePro');
    Route::post('/pro-submit-assign', $controller_path . '\SystemAdmin\SystemAdminController@assignPro');
    Route::post('/analyze-sentiment', $controller_path . '\SystemAdmin\SystemAdminController@analyzeSentiment');
    Route::post('/pro-search', $controller_path . '\SystemAdmin\SystemAdminController@searchPro');
    Route::get('/acc-fetch-departments', $controller_path . '\SystemAdmin\SystemAdminController@fetchDepartments');
});

// Student Routes
Route::middleware(['userType:Student'])->group(function () use ($controller_path) {
    Route::get('/student/dashboard', $controller_path . '\Student\StudentController@dashboard')->name('student.dashboard');
    // Add other student routes here
    Route::get('/student/evaluate', $controller_path . '\Student\StudentController@evaluate')->name('student.evaluate');
    Route::post('/pro-submit-eval', $controller_path . '\Student\StudentController@evaluationPro');
    Route::get('/fetch-departments', $controller_path . '\Student\StudentController@fetchDepartments');
    Route::get('/fetch-programs', $controller_path . '\Student\StudentController@fetchPrograms');
    Route::get('/fetch-faculties', $controller_path . '\Student\StudentController@fetchFaculties');
    Route::get('/student/history-list', $controller_path . '\Student\StudentController@historyList');
    Route::get('/student/view-history', $controller_path . '\Student\StudentController@viewHistory');

});

// Faculty Routes
Route::middleware(['userType:Faculty'])->group(function () use ($controller_path) {
    Route::get('/faculty/dashboard', $controller_path . '\Faculty\FacultyController@dashboard')->name('faculty.dashboard');
    Route::get('/faculty/results', $controller_path . '\Faculty\FacultyController@results')->name('faculty.results');
    Route::post('/pro-result', $controller_path . '\Faculty\FacultyController@resultPro');
});

// Academic Admin Routes
Route::middleware(['userType:Academic Admin'])->group(function () use ($controller_path) {
    Route::get('/academic-admin/dashboard', $controller_path . '\AcademicAdmin\AcademicAdminController@dashboard')->name('academicadmin.dashboard');
    Route::get('/academic-admin/pending-eval', $controller_path . '\AcademicAdmin\AcademicAdminController@pending')->name('academicadmin.pending-eval');
    Route::get('/academic-admin/summary-eval', $controller_path . '\AcademicAdmin\AcademicAdminController@summary')->name('academicadmin.summary-eval');
    Route::get('/academic-admin/analyzed', $controller_path . '\AcademicAdmin\AcademicAdminController@analyzed')->name('academicadmin.analyzed');
    Route::post('/analyze-sentiment', $controller_path . '\AcademicAdmin\AcademicAdminController@analyzeSentiment');
    Route::post('/pro-summary', $controller_path . '\AcademicAdmin\AcademicAdminController@proSummary');
});

Route::get('/login', $controller_path . '\authentications\LoginBasic@index')->name('login');
Route::post('/pro-login', $controller_path . '\authentications\LoginBasic@login');
Route::get('/', $controller_path . '\authentications\LoginBasic@default')->name('default');
// Logout route
Route::post('/logout', $controller_path . '\authentications\LogoutBasic@logout')->name('logout');

// layout
Route::get('/layouts/without-menu', $controller_path . '\layouts\WithoutMenu@index')->name('layouts-without-menu');
Route::get('/layouts/without-navbar', $controller_path . '\layouts\WithoutNavbar@index')->name('layouts-without-navbar');
Route::get('/layouts/fluid', $controller_path . '\layouts\Fluid@index')->name('layouts-fluid');
Route::get('/layouts/container', $controller_path . '\layouts\Container@index')->name('layouts-container');
Route::get('/layouts/blank', $controller_path . '\layouts\Blank@index')->name('layouts-blank');

// pages
Route::get('/pages/account-settings-account', $controller_path . '\pages\AccountSettingsAccount@index')->name('pages-account-settings-account');
Route::get('/pages/account-settings-notifications', $controller_path . '\pages\AccountSettingsNotifications@index')->name('pages-account-settings-notifications');
Route::get('/pages/account-settings-connections', $controller_path . '\pages\AccountSettingsConnections@index')->name('pages-account-settings-connections');
Route::get('/pages/misc-error', $controller_path . '\pages\MiscError@index')->name('pages-misc-error');
Route::get('/pages/misc-under-maintenance', $controller_path . '\pages\MiscUnderMaintenance@index')->name('pages-misc-under-maintenance');

// authentication
Route::get('/auth/login-basic', $controller_path . '\authentications\LoginBasic@index')->name('auth-login-basic');
Route::get('/auth/register-basic', $controller_path . '\authentications\RegisterBasic@index')->name('auth-register-basic');
Route::get('/auth/forgot-password-basic', $controller_path . '\authentications\ForgotPasswordBasic@index')->name('auth-reset-password-basic');

// cards
Route::get('/cards/basic', $controller_path . '\cards\CardBasic@index')->name('cards-basic');

// User Interface
Route::get('/ui/accordion', $controller_path . '\user_interface\Accordion@index')->name('ui-accordion');
Route::get('/ui/alerts', $controller_path . '\user_interface\Alerts@index')->name('ui-alerts');
Route::get('/ui/badges', $controller_path . '\user_interface\Badges@index')->name('ui-badges');
Route::get('/ui/buttons', $controller_path . '\user_interface\Buttons@index')->name('ui-buttons');
Route::get('/ui/carousel', $controller_path . '\user_interface\Carousel@index')->name('ui-carousel');
Route::get('/ui/collapse', $controller_path . '\user_interface\Collapse@index')->name('ui-collapse');
Route::get('/ui/dropdowns', $controller_path . '\user_interface\Dropdowns@index')->name('ui-dropdowns');
Route::get('/ui/footer', $controller_path . '\user_interface\Footer@index')->name('ui-footer');
Route::get('/ui/list-groups', $controller_path . '\user_interface\ListGroups@index')->name('ui-list-groups');
Route::get('/ui/modals', $controller_path . '\user_interface\Modals@index')->name('ui-modals');
Route::get('/ui/navbar', $controller_path . '\user_interface\Navbar@index')->name('ui-navbar');
Route::get('/ui/offcanvas', $controller_path . '\user_interface\Offcanvas@index')->name('ui-offcanvas');
Route::get('/ui/pagination-breadcrumbs', $controller_path . '\user_interface\PaginationBreadcrumbs@index')->name('ui-pagination-breadcrumbs');
Route::get('/ui/progress', $controller_path . '\user_interface\Progress@index')->name('ui-progress');
Route::get('/ui/spinners', $controller_path . '\user_interface\Spinners@index')->name('ui-spinners');
Route::get('/ui/tabs-pills', $controller_path . '\user_interface\TabsPills@index')->name('ui-tabs-pills');
Route::get('/ui/toasts', $controller_path . '\user_interface\Toasts@index')->name('ui-toasts');
Route::get('/ui/tooltips-popovers', $controller_path . '\user_interface\TooltipsPopovers@index')->name('ui-tooltips-popovers');
Route::get('/ui/typography', $controller_path . '\user_interface\Typography@index')->name('ui-typography');

// extended ui
Route::get('/extended/ui-perfect-scrollbar', $controller_path . '\extended_ui\PerfectScrollbar@index')->name('extended-ui-perfect-scrollbar');
Route::get('/extended/ui-text-divider', $controller_path . '\extended_ui\TextDivider@index')->name('extended-ui-text-divider');

// icons
Route::get('/icons/boxicons', $controller_path . '\icons\Boxicons@index')->name('icons-boxicons');

// form elements
Route::get('/forms/basic-inputs', $controller_path . '\form_elements\BasicInput@index')->name('forms-basic-inputs');
Route::get('/forms/input-groups', $controller_path . '\form_elements\InputGroups@index')->name('forms-input-groups');

// form layouts
Route::get('/form/layouts-vertical', $controller_path . '\form_layouts\VerticalForm@index')->name('form-layouts-vertical');
Route::get('/form/layouts-horizontal', $controller_path . '\form_layouts\HorizontalForm@index')->name('form-layouts-horizontal');

// tables
Route::get('/tables/basic', $controller_path . '\tables\Basic@index')->name('tables-basic');
