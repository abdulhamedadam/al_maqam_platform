<?php

use App\Http\Controllers\Site\Auth\AuthController;
use App\Http\Controllers\Site\ContactController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\ReportController;
use App\Http\Controllers\Site\ThankYouMessageController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::get('/admin', function () {
    return view('coming-soon');
})->name('home');

Route::group(['as' => 'user.'], function () {
    Route::middleware(['guest:web'])->group(function () {
        Route::get('/', function () {
            return view('front.index');
        })->name('home');

        Route::get('/our-teachers', function () {
            return view('front.pages.our-teachers');
        })->name('our_teachers');

        Route::get('/our-lectures', function () {
            return view('front.pages.our-lectures');
        })->name('our_lectures');

        Route::get('/contact', function () {
            return view('front.pages.contact');
        })->name('contact');

        Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
        Route::post('login', [AuthController::class, 'login'])->name('store_login');;

        Route::get('/join-us', [AuthController::class, 'showRegistrationForm'])->name('join_us');
        Route::post('register', [AuthController::class, 'register'])->name('register');;


        Route::get('/our-courses', function () {
            return view('front.pages.our-courses');
        })->name('our_courses');

        Route::get('/course-details', function () {
            return view('front.pages.course-details');
        })->name('course_details');
    });

    Route::middleware(['auth:web', 'role:student'])->group(function () {
        Route::get('/student-profile', function () {
            return view('front.pages.student-profile');
        })->name('student_profile');
    });

    Route::middleware(['auth:web', 'role:teacher'])->group(function () {
        Route::get('/teacher-profile', function () {
            return view('front.pages.teacher-profile');
        })->name('teacher_profile');
    });


    Route::middleware(['auth:web'])->group(function () {
        Route::get('/reset-password', function () {
            return view('front.pages.reset-password');
        })->name('reset_password');

        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });
});
