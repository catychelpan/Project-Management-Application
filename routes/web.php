<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::redirect('/', '/dashboard');


//creating a group for routes based on the middleware
Route::middleware(['auth','verified'])->group(function() {

    //any route defined here will only be accessed if user is authenticated and verified
    //user must be authenticated and their email must be verified
    Route::get('/dashboard', fn() => Inertia::render('Dashboard'))->name('dashboard');

    //Resource routes provide a set of default routes for handling typical CRUD operations
    Route::resource('project', ProjectController::class);
    Route::resource('task', TaskController::class);
    Route::resource('user', UserController::class);



});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';