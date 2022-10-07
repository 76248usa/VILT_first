<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SkillController;


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::resource('/skills', SkillController::class)
->except(['create', 'show', 'edit']);

Route::resource('/projects', ProjectController::class)
->except(['create', 'show', 'edit']);;




