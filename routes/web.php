<?php

use App\Http\Controllers\Assessment\AssessmentController;
use App\Http\Controllers\System\SkillController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    //Assessment Routes
    Route::get('/assessment/{user}', [AssessmentController::class, 'index'])->name('assessment');
    Route::get('/assessment/{user}/{assessment}', [AssessmentController::class, 'show'])->name('assessment.show');
    Route::post('/assessment/{user}/{assessment}/{jcp}', [AssessmentController::class, 'storeEmployee'])->name('assessment.storeEmployee');

    //Skill Internal API Routes
    Route::resource('/skills', SkillController::class);
});
