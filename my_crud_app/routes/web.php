<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Models\Task;

// Default welcome page
Route::get('/', function () {
    return view('welcome');
});

// Dashboard route, protected by 'auth' and 'verified' middlewares
Route::get('/dashboard', function () {
    $tasks = Task::all(); // Fetch all tasks
    return view('dashboard', compact('tasks'));
})->middleware(['auth', 'verified'])->name('dashboard');

// Routes that require authentication
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Task CRUD routes, protected by 'auth'
    Route::resource('tasks', TaskController::class);
});

// Authentication routes (login, register, etc.)
require __DIR__.'/auth.php';
