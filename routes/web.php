<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('/school',SchoolController::class);

Route::resource('/student',StudentController::class);

Route::resource("/teacher",TeacherController::class);

Route::resource("/course",CourseController::class);

Route::get('/course/getTeachers/{school}', [CourseController::class, 'getTeachers']);

Route::resource("/enroll",EnrollController::class); 


