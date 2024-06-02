<?php

use App\Livewire\System\Org\OrgTable;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\System\JCPController;
use App\Http\Controllers\Audit\ReportController;
use App\Http\Controllers\System\SkillController;
use App\Http\Controllers\Audit\DiscoverController;
use App\Http\Controllers\Audit\SuperviseController;
use App\Livewire\Supervise\CompletedAssessmentsTable;
use App\Http\Controllers\System\QualificationController;
use App\Http\Controllers\Assessment\AssessmentController;
use App\Http\Controllers\System\AssessmentController as SystemAssessmentController;
use App\Livewire\Reports\SystemReports;

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
    Route::get('/user-assessment/submission/{user}/{assessment}', [AssessmentController::class, 'submission'])->name('user-assessment.submission');
    Route::get('/user-assessment/results/{user}/{assessment}', [AssessmentController::class, 'results'])->name('user-assessment.results');
    Route::get('/user-assessment/{user}', [AssessmentController::class, 'index'])->name('user-assessment');
    Route::get('/user-assessment/{user}/{assessment}', [AssessmentController::class, 'show'])->name('user-assessment.show');
    Route::post('/user-assessment/{user}/{assessment}/{jcp}', [AssessmentController::class, 'storeEmployee'])->name('user-assessment.storeEmployee');



    //Assessment Routes
    Route::get('/directories/assessments', [AssessmentController::class, 'index'])->name('directories.assessments.index');
    Route::put('/directories/assessments/{id}', [AssessmentController::class, 'update'])->name('directories.assessments.update');

    Route ::delete('/directories/assessments/{id}', [AssessmentController::class, 'destroy'])-> name('directories.assessments.destroy');


    //Audit Routes
    Route::get('/supervise', [SuperviseController::class, 'index'])->name('supervise.index');
    Route::get('/supervise/{id}', [SuperviseController::class, 'list'])->name('supervise.list');
    Route::get('supervise/{id}/{assessment_id}', [CompletedAssessmentsTable::class, 'show'])->name('supervise.show');
    Route::post('supervise/{user}/{assessment}/{jcp}', [CompletedAssessmentsTable::class, 'store'])->name('supervise.store');


    //Skill Internal API Routes

    Route::resource('/assessments', SystemAssessmentController::class);
    Route::resource('/jcp', JCPController::class);
    Route::resource('/skills', SkillController::class);
    Route::resource('/qualifications', QualificationController::class);
    Route::get('/org', [OrgTable::class, 'index'])->name('org.index');

        // Qualifications Routes
    Route::get('/directories/qualifications', [QualificationController::class, 'index'])->name('directories.qualifications.index');
    Route::get('/directories/qualifications/create', [QualificationController::class, 'create'])->name('directories.qualifications.create');
    Route::post('/directories/qualifications', [QualificationController::class, 'store'])->name('directories.qualifications.store');
    Route::get('/directories/qualifications/{id}', [QualificationController::class, 'show'])->name('directories.qualifications.show');
    Route::put('/directories/qualifications/{id}', [QualificationController::class, 'update'])->name('directories.qualifications.update');
    Route::delete('/directories/qualifications/{id}', [QualificationController::class, 'destroy'])->name('directories.qualifications.destroy');

    // skills Routes
    Route::get('/directories/skills', [SkillController::class, 'index'])->name('directories.skills.index');
    Route::get('/directories/skills/create', [SkillController::class, 'create'])->name('directories.skills.create');
    Route::post('/directories/skills', [SkillController::class, 'store'])->name('directories.skills.store');
    Route::get('/directories/skills/{encrypted_id}', [SkillController::class, 'show'])->name('directories.skills.show');
    Route::put('/directories/skills/{encrypted_id}', [SkillController::class, 'update'])->name('directories.skills.update');
    Route::delete('/directories/skills/{encrypted_id}', [SkillController::class, 'destroy'])->name('directories.skills.destroy');


    // Organisations routes

    Route::get('/directories/org', [OrgTable::class, 'index'])->name('directories.org.index');
    Route::get('/directories/org/create', [OrgTable::class, 'create'])->name('directories.org.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');


    // Discover Routes
    Route::get('/discover', [DiscoverController::class, 'index'])->name('discover.index');

    // Reports Routes
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/{id}', [SystemReports::class, 'show'])->name('reports.show');





});
