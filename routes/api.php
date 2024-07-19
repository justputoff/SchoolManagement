<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\PackageController; 
use App\Http\Controllers\API\ClassRoomController;
use App\Http\Controllers\API\SubjectController;
use App\Http\Controllers\API\ScheduleController;
use App\Http\Controllers\API\BillingController;
use App\Http\Controllers\API\StudentController;

Route::post('/login', [UserController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [UserController::class, 'logout']);
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/user', [UserController::class, 'show']);
    Route::post('/user/fetch', [UserController::class, 'fetch']);
    Route::get('/user/detail', [UserController::class, 'detail']);
    Route::put('/user/{id}', [UserController::class, 'update']);

    Route::get('/packages', [PackageController::class, 'index']);
    Route::get('/classrooms', [ClassRoomController::class, 'index']);
    Route::get('/subjects', [SubjectController::class, 'index']);
    Route::get('/schedules', [ScheduleController::class, 'index']);
    Route::get('/billings', [BillingController::class, 'index']);
    Route::get('/students', [StudentController::class, 'index']);
    Route::put('/student/{id}', [StudentController::class, 'update']);
});