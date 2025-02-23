<?php

use App\Http\Controllers\Site\Auth\AuthController;
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
            Route::middleware(['guest:web'])->group(function () {
                Route::get('/', function () {
                    return view('site.index');
                })->name('home');

                Route::get('/our-teachers', function () {
                    return view('site.pages.our-teachers');
                })->name('our_teachers');

                Route::get('/our-lectures', function () {
                    return view('site.pages.our-lectures');
                })->name('our_lectures');

                Route::get('/contact', function () {
                    return view('site.pages.contact');
                })->name('contact');

                Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
                Route::post('login', [AuthController::class, 'login'])->name('store_login');;

                Route::get('/join-us', [AuthController::class, 'showRegistrationForm'])->name('join_us');
                Route::post('register', [AuthController::class, 'register'])->name('register');;


                Route::get('/our-courses', function () {
                    return view('site.pages.our-courses');
                })->name('our_courses');

                Route::get('/course-details', function () {
                    return view('site.pages.course-details');
                })->name('course_details');
            });

            Route::middleware(['auth:web', 'role:student'])->group(function () {
                Route::get('/student-profile', function () {
                    return view('site.pages.student-profile');
                })->name('student_profile');
            });

            Route::middleware(['auth:web', 'role:teacher'])->group(function () {
                Route::get('/teacher-profile', function () {
                    return view('site.pages.teacher-profile');
                })->name('teacher_profile');
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
