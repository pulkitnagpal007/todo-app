<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', [TaskController::class, 'index']);
Route::get('/tasks', [TaskController::class, 'allTasks']);
Route::post('/tasks', [TaskController::class, 'store'])->name("store");
Route::patch('/tasks/{task}', [TaskController::class, 'update']);
Route::delete('/tasks/{task}', [TaskController::class, 'destroy']);