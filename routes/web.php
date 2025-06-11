<?php

use App\Http\Controllers\Admin\CalendarController;
use App\Http\Controllers\Admin\EvaluationQuestionController;
use App\Http\Controllers\Site\AppointmentCancellationController;
use App\Http\Controllers\Site\AppointmentController;
use App\Http\Controllers\Site\Auth\AuthController;
use App\Http\Controllers\Site\ContactController;
use App\Http\Controllers\Site\CoursesController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\OurTeachersController;
use App\Http\Controllers\Site\StudentNotificationController;
use App\Http\Controllers\Site\StudentsController;
use App\Http\Controllers\Site\NotificationController;
use App\Http\Controllers\Site\TeacherNotificationController;
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
                Route::get('/student/student_schedules', [CalendarController::class, 'siteCalendar'])->name('student.calendar');

                Route::get('/student/today-appointments', [AppointmentController::class, 'todaysAppointments'])->name('student.appointments');

                Route::post('/appointments/{id}/cancel', [AppointmentController::class, 'cancelAppointment'])
                    ->name('student.cancel_appointment');

                // Route::get('student/notifications', [StudentNotificationController::class, 'index'])->name('student.notifications');
                // Route::get('student/notifications/data', [StudentNotificationController::class, 'getNotifications'])->name('student.notifications.data');
                // Route::post('student/notifications/{id}/mark-read', [StudentNotificationController::class, 'markAsRead'])->name('student.notifications.mark_read');
                // Route::post('student/notifications/mark-all-read', [StudentNotificationController::class, 'markAllAsRead'])->name('student.notifications.mark_all_read');

                // Route::get('student/notifications', [NotificationController::class, 'index'])->name('student.notifications');
                // Route::post('student/notifications/{notification}/mark-read', [NotificationController::class, 'markAsRead'])->name('student.notifications.mark_read');
                // Route::post('student/notifications/mark-all-read', [NotificationController::class, 'markAllAsRead'])->name('student.notifications.mark_all_read');
                // Route::get('student/notifications/counts', [NotificationController::class, 'getCounts'])->name('student.notification_counts');
                // Route::delete('student/notifications/{notification}', [NotificationController::class, 'destroy'])->name('student.delete_notification');
                // Route::post('student/notifications/clear-all', [NotificationController::class, 'clearAll'])->name('student.clear_all_notifications');
            });

            Route::middleware(['auth:web', 'role:teacher'])->group(function () {
                Route::get('/teacher-profile', [OurTeachersController::class, 'profile'])->name('teacher_profile');
                Route::get('/teacher-schedule', [OurTeachersController::class, 'schedule'])->name('teacher_schedule');
                Route::post('/teacher/schedule/store', [OurTeachersController::class, 'store_schedule'])->name('store_schedule');
                Route::delete('/teacher/schedule/{id}', [OurTeachersController::class, 'delete_schedule'])->name('delete_schedule');
                Route::get('/teacher/courses-assigned', [CoursesController::class, 'assignedCourses'])->name('teacher.assigned_courses');
                Route::get('/teacher/teacher_schedules', [CalendarController::class, 'siteCalendar'])->name('teacher.calendar');

                Route::get('/teacher/today-appointments', [AppointmentController::class, 'todaysAppointments'])->name('teacher.appointments');
                Route::post('/teacher/start-lecture/{id}', [AppointmentController::class, 'startLecture'])->name('teacher.start_lecture');
                Route::post('/teacher/end-lecture/{id}', [AppointmentController::class, 'endLecture'])->name('teacher.end_lecture');

                Route::get('/evaluation-questions', [EvaluationQuestionController::class, 'getEvaluationQuestions'])->name('teacher.evaluation_questions');

                Route::post('/teacher/appointments/{id}/cancel', [AppointmentController::class, 'cancelAppointment'])
                        ->name('teacher.cancel_appointment');

                // Route::get('teacher/notifications', [NotificationController::class, 'index'])->name('teacher.notifications');
                // Route::post('teacher/notifications/{notification}/mark-read', [NotificationController::class, 'markAsRead'])->name('teacher.notifications.mark_read');
                // Route::post('teacher/notifications/mark-all-read', [NotificationController::class, 'markAllAsRead'])->name('teacher.notifications.mark_all_read');
                // Route::get('teacher/notifications/counts', [NotificationController::class, 'getCounts'])->name('teacher.notification_counts');
                // Route::delete('teacher/notifications/{notification}', [NotificationController::class, 'destroy'])->name('teacher.delete_notification');
                // Route::post('teacher/notifications/clear-all', [NotificationController::class, 'clearAll'])->name('teacher.clear_all_notifications');

                // Route::get('teacher/notifications', [TeacherNotificationController::class, 'index'])->name('teacher.notifications');
                // Route::get('teacher/notifications/data', [TeacherNotificationController::class, 'getNotifications'])->name('teacher.notifications.data');
                // Route::post('teacher/notifications/{id}/mark-read', [TeacherNotificationController::class, 'markAsRead'])->name('teacher.notifications.mark_read');
                // Route::post('teacher/notifications/mark-all-read', [TeacherNotificationController::class, 'markAllAsRead'])->name('teacher.notifications.mark_all_read');

            });


            Route::middleware(['auth:web'])->group(function () {
                Route::get('/reset-password', function () {
                    return view('site.pages.reset-password');
                })->name('reset_password');

                Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

                Route::get('notifications', [NotificationController::class, 'index'])->name('notifications');
                Route::post('notifications/{notification}/mark-read', [NotificationController::class, 'markAsRead'])->name('notifications.mark_read');
                Route::post('notifications/mark-all-read', [NotificationController::class, 'markAllAsRead'])->name('notifications.mark_all_read');
                Route::get('notifications/counts', [NotificationController::class, 'getCounts'])->name('notification_counts');
                Route::delete('notifications/{notification}', [NotificationController::class, 'destroy'])->name('delete_notification');
                Route::post('notifications/clear-all', [NotificationController::class, 'clearAll'])->name('clear_all_notifications');

                Route::get('/my-cancellations', [AppointmentCancellationController::class, 'index'])
                    ->name('cancellations.index');

            });

        });
    }
);
