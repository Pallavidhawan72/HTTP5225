<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProfessorController;

Route::resource('courses', CourseController::class);
Route::resource('students', StudentController::class);
Route::resource('professors', ProfessorController::class);

Route::get('/', function () {
    return view('welcome');
});
