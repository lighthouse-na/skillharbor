<?php

use App\Http\Controllers\Assessment\AssessmentController;
use App\Http\Controllers\System\AssessmentController as SystemAssessmentController;
use App\Http\Controllers\System\JCPController;
use App\Http\Controllers\System\QualificationController;
use App\Http\Controllers\System\SkillController;
use App\Livewire\System\Org\OrgTable;
use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Rules\Role;

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

    //Completing an Assessment Routes

    Route::get('/user-assessment/{user}', [AssessmentController::class, 'index'])->name('user-assessment');
    Route::get('/user-assessment/{user}/{assessment}', [AssessmentController::class, 'show'])->name('user-assessment.show');
    Route::post('/user-assessment/{user}/{assessment}/{jcp}', [AssessmentController::class, 'storeEmployee'])->name('user-assessment.storeEmployee');

    //Skill Internal API Routes

    Route::resource('/assessments', SystemAssessmentController::class);
    Route::resource('/jcp', JCPController::class);
    Route::resource('/skills', SkillController::class);
    Route::resource('/qualifications', QualificationController::class);
    Route::get('/org', [OrgTable::class, 'index'])->name('org.index');
});
