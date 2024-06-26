<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::resource('projects', ProjectController::class);
Route::resource('projects.tasks', TaskController::class)->shallow();
Route::get('projects/{project}/tasks/{task}/edit', [App\Http\Controllers\TaskController::class, 'edit'])->name('projects.tasks.edit');
Route::patch('projects/{project}/tasks/{task}', [App\Http\Controllers\TaskController::class, 'update'])->name('projects.tasks.update');
Route::get('projects/{project}/tasks', [TaskController::class, 'index'])->name('projects.tasks.index');
Route::get('projects/{project}/tasks/{task}', [TaskController::class, 'show'])->name('projects.tasks.show');
Route::delete('projects/{project}/tasks/{task}', [TaskController::class, 'destroy'])->name('projects.tasks.destroy');
