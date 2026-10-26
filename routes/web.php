<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ClassroomController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/layout', function () {
    return view('layout');
});

Route::get('/admin/dashboard', [DashboardController::class, "index"]);

Route::get('/admin/about', [AboutController::class,"index"]);

Route::get('/admin/student',  [StudentController::class,"index"]);
Route::get('/admin/classroom', [ClassroomController::class, 'index']);


