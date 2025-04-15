<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\ClassController;
use App\Http\Controllers\Admin\Admin_ScheduleController;

use App\Http\Controllers\AccountController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\StudySessionController;
use App\Http\Controllers\AttendanceController;
use App\Models\Subject;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/abouus', function () {
    return view('errors.404');
});
Route::post('/update-attendance', [AttendanceController::class, 'update'])->name('attendance.update');


Route::prefix('/auth')->group(function () {
    Route::get('/register', function () {
        return view('register');
    });
    Route::get('/login', [AccountController::class,'showLoginForm'])->name('login');
    Route::post('/login', [AccountController::class, 'login']);
    Route::get('/logout', [AccountController::class,'logout'])->name('logout');
});

Route::prefix('/schedule')->name('schedule.')->group(function () {
    Route::get('/', [ScheduleController::class, 'getAll']);

    Route::get('/{schedule_id}', [ScheduleController::class,'getScheduleByID']);
    // Route::get('/study-session/', [ScheduleController::class,'getScheduleByID']);

    Route::get('/{schedule_id}/{study_session_id}', [StudySessionController::class,'getStudySessionByID']);
});


Route::prefix('/admin')->name('admin.')->group(function () {
    Route::get('/', [SubjectController::class,'getAll'])->name('dashboard');
    Route::get('/subjectform', [SubjectController::class,'subjectform'])->name('subjectform');
    Route::post('/addsubject', [SubjectController::class,'addsubject'])->name('addsubject');
    Route::get('/updatesubject/{schedule_id}', [SubjectController::class,'getSubjectByID'])->name('updatesubject');
    Route::post('/updatesubject', [SubjectController::class,'updatesubject'])->name('updatesubject');
    Route::get('/deletesubject/{schedule_id}', [SubjectController::class,'deletesubject'])->name('deletesubject');
    
    Route::get('/class', [ClassController::class, 'getAll'])->name('class');
    Route::get('/classform', [ClassController::class, 'classform'])->name('classform');
    Route::post('/addclass', [ClassController::class,'addclass'])->name('addclass');
    Route::get('/deleteclass/{schedule_id}', [ClassController::class,'deleteclass'])->name('deleteclass');
    Route::get('/updateclass/{schedule_id}', [ClassController::class,'getClassByID'])->name('updateclass');
    Route::post('/updateclass', [ClassController::class,'updateclass'])->name('updateclass');

    Route::get('/schedule', [Admin_ScheduleController::class, 'getAll'])->name('schedule');
    Route::post('/addschedule', [Admin_ScheduleController::class, 'addschedule'])->name('addschedule');
});