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
use App\Livewire\System\Qualifications\QualificationsCreateForm;
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
    route::get('/user-assessment/submission/{user}/{assessment}', [assessmentcontroller::class, 'submission'])->name('user-assessment.submission');
    route::get('/user-assessment/results/{user}/{assessment}', [assessmentcontroller::class, 'results'])->name('user-assessment.results');
    route::get('/user-assessment/{user}', [assessmentcontroller::class, 'index'])->name('user-assessment');
    route::get('/user-assessment/{user}/{assessment}', [assessmentcontroller::class, 'show'])->name('user-assessment.show');
    route::post('/user-assessment/{user}/{assessment}/{jcp}', [assessmentcontroller::class, 'storeemployee'])->name('user-assessment.storeEmployee');
   

    //assessment routes
    route::get('/directories/assessments', [assessmentcontroller::class, 'index'])->name('directories.assessments.index');
    route::put('/directories/assessments/{id}', [assessmentcontroller::class, 'update'])->name('directories.assessments.update');
    route::post('/directories/assessments', [assessmentcontroller::class, 'store'])->name('directories.assessments.store');

    route::delete('/directories/assessments/{id}', [assessmentcontroller::class, 'destroy'])->name('directories.assessments.destroy');

    //audit routes
    route::get('/supervise', [supervisecontroller::class, 'index'])->name('supervise.index');
    route::get('/supervise/{id}', [supervisecontroller::class, 'list'])->name('supervise.list');
    route::get('supervise/{id}/{assessment_id}', [completedassessmentstable::class, 'show'])->name('supervise.show');
    route::post('supervise/{user}/{assessment}/{jcp}', [completedassessmentstable::class, 'store'])->name('supervise.store');

    //skill internal api routes

    route::resource('/assessments', systemassessmentcontroller::class);
    route::resource('/jcp', jcpcontroller::class);
    route::resource('/skills', skillcontroller::class);
    route::resource('/qualifications', qualificationcontroller::class);
    route::get('/org', [orgtable::class, 'index'])->name('org.index');
    route::get('/jcp/create', [JCPController::class, 'create'])->name('jcp.create');
    route::get('/directories/skills', [SkillController::class, 'index'])->name('directories.skills.index');


    // qualifications routes
    route::get('/directories/qualifications', [qualificationcontroller::class, 'index'])->name('directories.qualifications.index');
    route::get('/directories/qualifications/create', [qualificationcontroller::class, 'create'])->name('system.qualifications.create');
    route::post('/directories/qualifications', [qualificationcontroller::class, 'store'])->name('directories.qualifications.store');
    route::get('/directories/qualifications/{id}', [qualificationcontroller::class, 'show'])->name('directories.qualifications.show');
    route::put('/directories/qualifications/{id}', [qualificationcontroller::class, 'update'])->name('directories.qualifications.update');
    route::delete('/directories/qualifications/{id}', [qualificationcontroller::class, 'destroy'])->name('directories.qualifications.destroy');

    // skills routes
    route::get('/directories/skills', [skillcontroller::class, 'index'])->name('directories.skills.index');
    route::get('/directories/skills/create', [skillcontroller::class, 'create'])->name('directories.skills.create');
    route::post('/directories/skills', [skillcontroller::class, 'store'])->name('directories.skills.store');
    route::get('/directories/skills/{encrypted_id}', [skillcontroller::class, 'show'])->name('directories.skills.show');
    route::put('/directories/skills/{encrypted_id}', [skillcontroller::class, 'update'])->name('directories.skills.update');
    route::delete('/directories/skills/{encrypted_id}', [skillcontroller::class, 'destroy'])->name('directories.skills.destroy');

    // organisations routes

    route::get('/directories/org', [orgtable::class, 'index'])->name('directories.org.index');
    route::get('/directories/org/create', [orgtable::class, 'create'])->name('directories.org.create');
    route::post('/users', [usercontroller::class, 'store'])->name('users.store');
    route::get('/directories/org/{id}', [usercontroller::class, 'show'])->name('directories.org.show');
    route::get('/directories/org/{id}/edit', [usercontroller::class, 'edit'])->name('directories.org.edit');
    route::put('/users/{id}', [usercontroller::class, 'update'])->name('users.update');
    route::delete('/users/{id}', [usercontroller::class, 'destroy'])->name('users.destroy');
    // discover routes
    route::get('/discover', [discovercontroller::class, 'index'])->name('discover.index');

    // reports routes
    route::get('/reports', [reportcontroller::class, 'index'])->name('reports.index');
    route::get('/reports/{id}', [systemreports::class, 'show'])->name('reports.show');

    //downloads routes
    route::get('download/{user_id}/{assessment_id}', [assessmentcontroller::class, 'supervisorresults'])->name('supervisor.result');
    route::get('downloadjcp/{user_id}/{assessment_id}', [assessmentcontroller::class, 'jcppdf'])->name('submission.jcp');
    route::get('orgreport/{id}', [systemreports::class, 'orgreport'])->name('organisational.report');

    route::get('/report/employees/export', [reportcontroller::class, 'employee_csv'])->name('reports.employees.export');
    route::get('/report/roles/export', [ReportController::class, 'roles_csv'])->name('reports.roles.export');
});
