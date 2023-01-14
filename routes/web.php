<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\LearningController;

Route::get(
    '/',
    function () {
        return Inertia::render('Home', ['title' => 'Главная']);
    })->name('homepage');

Route::get('/users', [UserController::class, 'index'])->name('users');
Route::get('/progress', [UserController::class, 'progress'])->name('progress');
Route::get('/lessons', [LessonController::class, 'index'])->name('lessons');
Route::get('/learnings', [LearningController::class, 'index'])->name('learnings');