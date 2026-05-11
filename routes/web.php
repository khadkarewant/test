<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy']);

Route::middleware('auth')->group(function(){
    Route::get('/tasks/trashed', [TaskController::class, 'trashed']);
    Route::post('/tasks/{id}/restore', [TaskController::class, 'restore']);
    Route::resource('tasks', TaskController::class);
});