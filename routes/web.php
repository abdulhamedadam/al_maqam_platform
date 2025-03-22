<?php

use App\Http\Controllers\Site\Auth\AuthController;
use App\Http\Controllers\Site\ContactController;
use App\Http\Controllers\Site\CoursesController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\OurTeachersController;
use App\Http\Controllers\Site\StudentsController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::get('/admin', function () {
    return view('coming-soon');
})->name('home');

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::group(['as' => 'user.'], function () {
            // Route::middleware(['guest:web'])->group(function () {
            Route::middleware('guest:web')->group(function () {
                Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
                Route::post('/login', [AuthController::class, 'login'])->name('store_login');
            });

            Route::get('/', [HomeController::class, 'index'])->name('home');

            Route::controller(ContactController::class)->prefix('contact')->as('contact.')->group(function () {
                Route::get('/', 'index')->name('show');
                Route::post('/', 'store')->name('store');
            });

            Route::get('/our-teachers', [OurTeachersController::class, 'index'])->name('our_teachers');
            Route::get('/our-lectures', function () {
                return view('site.pages.our-lectures');
            })->name('our_lectures');
            // Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
            // Route::post('login', [AuthController::class, 'login'])->name('store_login');;

            Route::get('/join-us', [AuthController::class, 'showRegistrationForm'])->name('join_us');
            Route::post('register', [AuthController::class, 'register'])->name('register');;
            Route::get('/course/course-details/{id}/{money_id}', [CoursesController::class, 'get_course_details'])->name('get_course_details');;
            Route::post('/teachers/available', [CoursesController::class, 'getAvailableTeachers'])->name('available_schedule');


            Route::get('/our-courses', function () {
                return view('site.pages.our-courses');
            })->name('our_courses');

            Route::get('/course-details', function () {
                return view('site.pages.course-details');
            })->name('course_details');
            // });

            Route::middleware(['auth:web', 'role:student'])->group(function () {
                Route::get('/student-profile', [StudentsController::class, 'profile'])->name('student_profile');
                Route::post('/student/store-pay-course', [CoursesController::class, 'store_pay_course'])->name('store_pay_course');
                Route::get('/student/enrolled-courses', [CoursesController::class, 'enrolledCourses'])->name('enrolled_courses');
            });

            Route::middleware(['auth:web', 'role:teacher'])->group(function () {
                Route::get('/teacher-profile', [OurTeachersController::class, 'profile'])->name('teacher_profile');
                Route::get('/teacher-schedule', [OurTeachersController::class, 'schedule'])->name('teacher_schedule');
                Route::post('/teacher/schedule/store', [OurTeachersController::class, 'store_schedule'])->name('store_schedule');
                Route::delete('/teacher/schedule/{id}', [OurTeachersController::class, 'delete_schedule'])->name('delete_schedule');
                Route::get('/teacher/courses-assigned', [CoursesController::class, 'assignedCourses'])->name('teacher.assigned_courses');
            });


            Route::middleware(['auth:web'])->group(function () {
                Route::get('/reset-password', function () {
                    return view('site.pages.reset-password');
                })->name('reset_password');

                Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
            });
        });
    }
);
