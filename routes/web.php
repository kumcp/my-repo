<?php

use App\Http\Controllers\AccountController;

use App\Http\Controllers\JobsController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\AssigneeListController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\WorkPlanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectTypeController;
use App\Http\Controllers\PriorityController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ProcessMethodController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StaffInfoController;

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



// Project
Route::prefix('project')->group(function () {
    Route::get('/', [ProjectController::class, 'list'])->name('project.list');
    Route::post('/store', [ProjectController::class, 'store'])->name('project.store');
    Route::get('/edit/{id}', [ProjectController::class, 'edit'])->name('project.edit');
    Route::post('/update/{id}', [ProjectController::class, 'update'])->name('project.update');
    Route::get('/delete/{id}', [ProjectController::class, 'destroy'])->name('project.destroy');
});

// Project-Type
Route::prefix('project-type')->group(function () {
    Route::get('/', [ProjectTypeController::class, 'list'])->name('project-type.list');
    Route::post('/store', [ProjectTypeController::class, 'store'])->name('project-type.store');
    Route::get('/edit/{id}', [ProjectTypeController::class, 'edit'])->name('project-type.edit');
    Route::post('/update/{id}', [ProjectTypeController::class, 'update'])->name('project-type.update');
    Route::get('/delete/{id}', [ProjectTypeController::class, 'destroy'])->name('project-type.destroy');
});

// Priorities
Route::prefix('priority')->group(function () {
    Route::get('/', [PriorityController::class, 'list'])->name('priority.list');
    Route::post('/store', [PriorityController::class, 'store'])->name('priority.store');
    Route::get('/edit/{id}', [PriorityController::class, 'edit'])->name('priority.edit');
    Route::post('/update/{id}', [PriorityController::class, 'update'])->name('priority.update');
    Route::get('/delete/{id}', [PriorityController::class, 'destroy'])->name('priority.destroy');
});

//Skills
Route::prefix('skill')->group(function () {
    Route::get('/', [SkillController::class, 'list'])->name('skill.list');
    Route::post('/store', [SkillController::class, 'store'])->name('skill.store');
    Route::get('/edit/{id}', [SkillController::class, 'edit'])->name('skill.edit');
    Route::post('/update/{id}', [SkillController::class, 'update'])->name('skill.update');
    Route::get('/delete/{id}', [SkillController::class, 'destroy'])->name('skill.destroy');
});

// Process Method
Route::prefix('process-method')->group(function () {
    Route::get('/', [ProcessMethodController::class, 'list'])->name('process-method.list');
    Route::post('/store', [ProcessMethodController::class, 'store'])->name('process-method.store');
    Route::get('/edit/{id}', [ProcessMethodController::class, 'edit'])->name('process-method.edit');
    Route::post('/update/{id}', [ProcessMethodController::class, 'update'])->name('process-method.update');
    Route::get('/delete/{id}', [ProcessMethodController::class, 'destroy'])->name('process-method.destroy');
});

// Config
Route::get('config',[ConfigController::class, 'list'])->name('config.list');

Route::get('/register', [RegisterController::class, 'register']);
Route::post('/register', [RegisterController::class, 'store'])->name('register');

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/forget-password', [ForgotPasswordController::class, 'getEmail']);
Route::post('/forget-password', [ForgotPasswordController::class, 'postEmail'])->name('forgotPassword');

Route::get('/reset-password/{token}', [ResetPasswordController::class, 'getPassword']);
Route::post('/reset-password', [ResetPasswordController::class, 'updatePassword'])->name('resetPassword');


Route::get('/accounts/pending', [AccountController::class, 'getPendingAccounts'])->name('accounts.pending');
Route::post('/accounts/activate', [AccountController::class, 'activateAccounts'])->name('accounts.activate');

Route::get('/staff-info/{id}', [StaffInfoController::class, 'show'])->name('staff_info.show');
Route::post('/staff-info/{id}', [StaffInfoController::class, 'update'])->name('staff_info.update');

Route::get('/staff', [StaffController::class, 'index'])->name('staff.index');
Route::post('/staff/{id}', [StaffController::class, 'update'])->name('staff.update');



Route::get('/jobs', [JobsController::class, 'index'])->name('jobs.index');
Route::get('/jobs/create', [JobsController::class, 'create'])->name('jobs.create');
Route::post('/jobs/search', [JobsController::class, 'index'])->name('jobs.search');
Route::post('/jobs', [JobsController::class, 'action'])->name('jobs.action');
Route::post('/jobs/detail', [JobsController::class, 'detailAction'])->name('jobs.detailAction');
Route::post('/jobs/update-status', [JobsController::class, 'updateStatus'])->name('jobs.updateStatus');


Route::get('/workplans/create/', [WorkPlanController::class, 'create'])->name('workplans.create');
Route::post('/workplans', [WorkPlanController::class, 'store'])->name('workplans.store');
Route::post('/workplans/delete', [WorkPlanController::class, 'delete'])->name('workplans.delete');
