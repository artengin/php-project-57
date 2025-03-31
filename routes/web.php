<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskStatusController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\LabelController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'dashboard')->name('dashboard');
Route::resource('task_statuses', TaskStatusController::class);
Route::resource('labels', LabelController::class);
Route::resource('tasks', TaskController::class);

require __DIR__ . '/auth.php';
