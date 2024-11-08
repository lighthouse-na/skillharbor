<?php

use App\Http\Controllers\Assessment\AssessmentController;
use App\Http\Controllers\Audit\DiscoverController;
use App\Http\Controllers\Audit\ReportController;
use App\Http\Controllers\Audit\SuperviseController;
use App\Http\Controllers\System\AssessmentController as SystemAssessmentController;
use App\Http\Controllers\System\JCPController;
use App\Http\Controllers\System\QualificationController;
use App\Http\Controllers\System\SkillController;
use App\Http\Controllers\UserController;
use App\Livewire\Reports\SystemReports;
use App\Livewire\Supervise\CompletedAssessmentsTable;
use App\Livewire\System\Org\OrgTable;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    //completing an assessment routes
    route::get('/user-assessment/submission/{user}/{assessment}', [AssessmentController::class, 'submission'])->name('user.assessment.submission');
    route::get('/user-assessment/results/{user}/{assessment}', [AssessmentController::class, 'results'])->name('user.assessment.results');
    route::get('/user-assessment/{user}', [AssessmentController::class, 'index'])->name('user.assessment');
    route::get('/user-assessment/{user}/{assessment}', [AssessmentController::class, 'show'])->name('user.assessment.show');
    route::post('/user-assessment/{user}/{assessment}/{jcp}', [AssessmentController::class, 'storeEmployee'])->name('user.assessment.storeEmployee');

    //audit routes
    route::get('/supervise', [SuperviseController::class, 'index'])->name('supervise.index');
    route::get('/supervise/{id}', [SuperviseController::class, 'list'])->name('supervise.list');
    route::get('supervise/{id}/{assessment_id}', [CompletedAssessmentsTable::class, 'show'])->name('supervise.show');
    route::post('supervise/{user}/{assessment}/{jcp}', [CompletedAssessmentsTable::class, 'store'])->name('supervise.store');

    //skill internal api routes

    route::resource('/assessments', SystemAssessmentController::class);
    route::resource('/jcp', JCPController::class);
    route::resource('/skills', SkillController::class);
    route::resource('/qualifications', QualificationController::class);
    route::get('/org', [OrgTable::class, 'index'])->name('org.index');
    route::get('/jcp/create', [JCPController::class, 'create'])->name('jcp.create');
    route::get('/directories/skills', [SkillController::class, 'index'])->name('directories.skills.index');

    // qualifications routes
    route::get('/directories/qualifications', [QualificationController::class, 'index'])->name('directories.qualifications.index');
    route::get('/directories/qualifications/create', [QualificationController::class, 'create'])->name('system.qualifications.create');
    route::post('/directories/qualifications', [QualificationController::class, 'store'])->name('directories.qualifications.store');
    route::get('/directories/qualifications/{id}', [QualificationController::class, 'show'])->name('directories.qualifications.show');
    route::put('/directories/qualifications/{id}', [QualificationController::class, 'update'])->name('directories.qualifications.update');
    route::delete('/directories/qualifications/{id}', [QualificationController::class, 'destroy'])->name('directories.qualifications.destroy');

    // skills routes
    route::get('/directories/skills', [SkillController::class, 'index'])->name('directories.skills.index');
    route::get('/directories/skills/create', [SkillController::class, 'create'])->name('directories.skills.create');
    route::post('/directories/skills', [SkillController::class, 'store'])->name('directories.skills.store');
    route::get('/directories/skills/{encrypted_id}', [SkillController::class, 'show'])->name('directories.skills.show');
    route::put('/directories/skills/{encrypted_id}', [SkillController::class, 'update'])->name('directories.skills.update');
    route::delete('/directories/skills/{encrypted_id}', [SkillController::class, 'destroy'])->name('directories.skills.destroy');

    // organisations routes

    route::get('/directories/org', [OrgTable::class, 'index'])->name('directories.org.index');
    route::get('/directories/org/create', [OrgTable::class, 'create'])->name('directories.org.create');
    route::post('/users', [UserController::class, 'store'])->name('users.store');
    route::get('/directories/org/{id}', [UserController::class, 'show'])->name('directories.org.show');
    route::get('/directories/org/{id}/edit', [UserController::class, 'edit'])->name('directories.org.edit');
    route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    // discover routes
    route::get('/discover', [DiscoverController::class, 'index'])->name('discover.index');

    // reports routes
    route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    route::get('/reports/{id}', [SystemReports::class, 'show'])->name('reports.show');

    //downloads routes
    route::get('download/{user_id}/{assessment_id}', [AssessmentController::class, 'supervisorResults'])->name('supervisor.result');
    route::get('downloadjcp/{user_id}/{assessment_id}', [AssessmentController::class, 'jcpPDF'])->name('submission.jcp');
    route::get('orgreport/{id}', [SystemReports::class, 'orgReport'])->name('organisational.report');

    route::get('/report/employees/export', [ReportController::class, 'employee_csv'])->name('reports.employees.export');
    route::get('/report/roles/export', [ReportController::class, 'roles_csv'])->name('reports.roles.export');

    Route::get('/report/qualifications/export', [ReportController::class, 'exportQualifications'])->name('reports.qualifications.export');
    Route::get('/report/skills/export', [ReportController::class, 'exportSkills'])->name('reports.skills.export');

    //Divisional Exports
    Route::get('/report/employees-division/export', [ReportController::class, 'exportDivisionEmployees'])->name('reports.employees.export-division');
    Route::get('/report/qualifications-division/export', [ReportController::class, 'exportDivisionQualifications'])->name('reports.qualifications.export-division');

});
