<?php
use App\Http\Controllers\ContactController;
use App\Mail\ContactedMessage;
use App\Mail\ContactedMessage2;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Skill;
use App\Models\Project;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'skills' => Skill::all(),
        'projects' => Project::all()
    ]);
});

Route::post('contact',[ContactController::class, 'contact'])->name('contact');

Route::get('/test', [ContactController::class, 'contact']);


