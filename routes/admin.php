<?php

use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\app_setting\DiscountController;
use App\Http\Controllers\Admin\CalendarController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\CompanyController;

use App\Http\Controllers\Admin\CourseController;

use App\Http\Controllers\Admin\EmployeesController;

use App\Http\Controllers\Admin\GeneralSettingsController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\MasrofatController;
use App\Http\Controllers\Admin\NotificationsController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\RevenueController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\TestsController;
use App\Http\Controllers\Admin\UsersController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Define routes for the "languages" prefix outside the group
Route::prefix('languages')->group(function () {
    // Your routes for the "languages" prefix
});
Route::get('/pre_home', function () {
    return view('welcome');
});
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:admin']
    ], function () {


    Route::group(['middleware' => ['auth:admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('/dashboard', function () {
            return view('admin.home');
        })->name('dashboard');

        Route::get('/test', function () {
            return ' test admin ';
        });

        Route::resource('students' , StudentController::class)->except('show');
        Route::get('/students/{id}/details', [StudentController::class, 'courses'])->name('students.details');
        Route::get('/students/{id}/courses', [StudentController::class, 'courses'])->name('students.courses');
        Route::get('/students/course/{courseId}/{moneyId}/teachers', [StudentController::class, 'getTeachers'])->name('students.view_teachers');

        Route::resource('teachers' , TeacherController::class);
        Route::get('/teachers/{id}/approve', [TeacherController::class, 'approve'])->name('teachers.approve');
        Route::get('/teachers/{id}/refuse', [TeacherController::class, 'refuse'])->name('teachers.refuse');
        Route::get('/teachers/{id}/details', [TeacherController::class, 'details'])->name('teachers.details');
        Route::get('/teachers/{id}/courses', [TeacherController::class, 'courses'])->name('teachers.courses');
        Route::get('/teachers/course/{courseId}/{moneyId}/students', [TeacherController::class, 'getStudents'])->name('teachers.view_students');
        Route::get('/teachers/{id}/studetns', [TeacherController::class, 'students'])->name('teachers.students');
        Route::get('/teachers/student/{id}/courses', [TeacherController::class, 'getCourses'])->name('teachers.view_courses');

        Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar.index');
        Route::resource('sections' , SectionController::class)->except('show');

        Route::resource('courses' , CourseController::class);

        Route::resource('services' , ServiceController::class);
        /************************************************************************/
      //  dd('ss');
        Route::resource('sliders',SliderController::class);
        Route::post('sliders/change_status',[SliderController::class,'change_status'])->name('sliders.change_status');
        /************************************************************************/
        Route::resource('about_us',AboutUsController::class);
        Route::post('about_us/change_status',[AboutUsController::class,'change_status'])->name('about_us.change_status');


        Route::get('/site_data', [GeneralSettingsController::class, 'siteData'])->name('siteData');
        Route::get('/site_data/edit/{id}', [GeneralSettingsController::class, 'edit_siteData'])->name('edit_siteData');
        Route::post('/site_data/create', [GeneralSettingsController::class, 'save_siteData'])->name('save_siteData');
        Route::get('/get_ajax_siteData', [GeneralSettingsController::class, 'get_ajax_siteData'])->name('get_ajax_siteData');




        Route::resource('roles',RolesController::class);
        Route::get('role/delete/{id}',[RolesController::class,'destroy'])->name('delete_role');

        Route::resource('users',UsersController::class);
        Route::get('user/delete/{id}',[UsersController::class,'destroy'])->name('delete_user');
        Route::get('users/change_status/{id}/{status}', [UsersController::class, 'change_status'])->name('change_status');



        Route::get('admin/users/{user}/permissions', [UsersController::class, 'permissions'])->name('users.permissions');
        Route::post('admin/users/{user}/permissions', [UsersController::class, 'updatePermissions'])->name('users.update_permissions');



    });


});


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {



    require __DIR__ . '/adminauth.php';
});
