<?php

use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DJMController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\TMController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\KehadiranController;
use App\Http\Controllers\RecruitmentController;
use App\Http\Controllers\WorkforceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TalentClusterController;
use App\Models\TalentCluster;
use App\Http\Controllers\CareerActivityController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* LOGIN */

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');


/* HOME */

Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');


/* ROLE */

Route::middleware(['auth', 'role:admin,hcm'])->group(function () {
    Route::get('/recruitment', [CheckRole::class, 'index']);
});


/* LOGIN */

Route::get('/', [LoginController::class, 'login'])->middleware('guest')->name('login');
Route::post('/actionlogin', [LoginController::class, 'actionLogin'])->name('actionlogin');
Route::post('/logout', [LoginController::class, 'actionLogout'])->name('logout');



Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
Route::post('/kehadiran', [KehadiranController::class, 'store'])->name('kehadiran.store');


/* TALENT MANAGEMENT */

Route::get('/employees', [TMController::class, 'index'])->name('employees.index');
Route::get('/employees/{employee}', [TMController::class, 'show'])->name('employees.show');
Route::get('/employees/{employee}/edit', [TMController::class, 'edit'])->name('employees.edit');
Route::put('/employees/{id}', [TMController::class, 'update'])->name('employees.update');
Route::get('/employees/payslip/download/{filename}', [TMController::class, 'downloadPayslip'])->name('employees.payslip.download');

Route::get('/employee/{id}/career', [TMController::class, 'getCareerActivities'])->name('employee.career');
Route::post('/employee/{id}/career', [TMController::class, 'storeCareerActivity'])->name('employee.career.store');
Route::put('/career/{id}', [TMController::class, 'updateCareerActivity'])->name('career.update');
Route::delete('/career/{id}', [TMController::class, 'deleteCareerActivity'])->name('career.delete');
Route::post('/employee/{id}/documents', [TMController::class, 'updateDocuments'])->name('employee.updateDocuments');
Route::put('/employees/{id}/documents', [TMController::class, 'updateDocuments'])->name('employee.updateDocuments');
Route::delete('/employees/documents/{id}', [TMController::class, 'deleteDocument'])->name('employee.deleteDocument');



/* TRAINING MANAGEMENT */

Route::get('/training', [TrainingController::class, 'index'])->name('training.index');
Route::get('/training/create', [TrainingController::class, 'create'])->name('training.create');
Route::post('/training', [TrainingController::class, 'store'])->name('training.store');
Route::get('training/{id}', [TrainingController::class, 'show'])->name('training.show');
Route::get('/training/{id}/edit', [TrainingController::class, 'edit'])->name('training.edit');
Route::delete('/training/{id}/destroy', [TrainingController::class, 'destroy'])->name('training.destroy');


/* DJM MANAGEMENT */

Route::get('/djm', [DJMController::class, 'index'])->name('djm.index');
Route::get('/djm/create', [DJMController::class, 'create'])->name('djm.create');
Route::post('/djm', [DJMController::class, 'store'])->name('djm.store');
Route::get('/djm/{id}', [DJMController::class, 'show'])->name('djm.show');
Route::get('/djm/{id}/edit', [DJMController::class, 'edit'])->name('djm.edit');
Route::delete('/djm/{id}/destroy', [DJMController::class, 'destroy'])->name('djm.destroy');
Route::post('/djm/upload', [DJMController::class, 'upload'])->name('djm.upload');
Route::put('/djm/{id}', [DJMController::class, 'update'])->name('djm.update');


/* RECRUITMENT MANAGEMENT */

Route::get('/recruitment', [RecruitmentController::class, 'index'])->name('recruitment.index');
Route::get('/recruitment/create', [RecruitmentController::class, 'create'])->name('recruitment.create');
Route::get('/recruitment/{id}', [RecruitmentController::class, 'show'])->name('recruitment.show');
Route::post('/recruitment', [RecruitmentController::class, 'store'])->name('recruitment.store');
Route::post('/recruitment/save-step', [RecruitmentController::class, 'saveStep'])->name('recruitment.saveStep');
Route::post('/recruitment/submit', [RecruitmentController::class, 'submit'])->name('recruitment.submit');
Route::post('/recruitment/next-step', [RecruitmentController::class, 'nextStep'])->name('recruitment.nextStep');
Route::post('/recruitment/previous-step', [RecruitmentController::class, 'previousStep'])->name('recruitment.previousStep');


/* DASHBOARD OUTSOURCE */

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');


/* WORKFORCE PERFORMANCE */

Route::get('/workforce', [WorkforceController::class, 'index'])->name('workforce.index');

/* TALENT CLUSTER */
Route::prefix('employees/{employee}')->group(function () {
    Route::get('clusters', [TalentClusterController::class, 'index'])->name('clusters.index');
    Route::post('clusters', [TalentClusterController::class, 'store'])->name('clusters.store');
    Route::get('clusters/{cluster}/edit', [TalentClusterController::class, 'edit'])->name('clusters.edit');
    Route::put('clusters/{cluster}', [TalentClusterController::class, 'update'])->name('clusters.update');
    Route::delete('clusters/{cluster}/delete', [TalentClusterController::class, 'delete'])->name('clusters.delete');
});


/* INFOMRASI ANAK */

Route::prefix('employees/{employee}')->group(function () {
    Route::get('families', [FamilyController::class, 'index'])->name('families.index');
    Route::get('families/create', [FamilyController::class, 'create'])->name('families.create');
    Route::post('families', [FamilyController::class, 'store'])->name('families.store');
    Route::post('families/finalize', [FamilyController::class, 'finalize'])->name('families.finalize');
    Route::post('families/cancel', [FamilyController::class, 'cancel'])->name('families.cancel');
    Route::get('families/{family}/edit', [FamilyController::class, 'edit'])->name('families.edit');
    Route::put('families/{family}', [FamilyController::class, 'update'])->name('families.update');
    Route::delete('families/{family}', [FamilyController::class, 'delete'])->name('families.delete');
});

/* CAREER ACTIVITIES */
Route::prefix('employees/{employee}')->group(function () {
    Route::get('careers', [CareerActivityController::class, 'index'])->name('career_activities.index');
    Route::get('careers/create', [CareerActivityController::class, 'create'])->name('career_activities.create');
    Route::post('careers', [CareerActivityController::class, 'store'])->name('career_activities.store');
    Route::get('careers/{career}/edit', [CareerActivityController::class, 'edit'])->name('career_activities.edit');
    Route::put('careers/{career}', [CareerActivityController::class, 'update'])->name('career_activities.update');
    Route::delete('careers/{career}', [CareerActivityController::class, 'destroy'])->name('career_activities.destroy');
});

