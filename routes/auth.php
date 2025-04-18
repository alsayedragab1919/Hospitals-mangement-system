<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Auth\PatientController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\LoginDoctorController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\RayEmployeeController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\RegisterAdminController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\LaboratoriesEmployeeController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use GuzzleHttp\Middleware;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

 Route::post('/user/register', [RegisteredUserController::class, 'store'])->name('register.user');



    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login/user', [AuthenticatedSessionController::class, 'store'])->name('login.user');

Route::post('/Admin/login',[AdminController::class,'store'])->name('login.admin');


//===========================================================================================================
Route::post('/login/doctor', [LoginDoctorController::class, 'store'])->name('login.doctor');

//=========================================================================================================

Route::post('/login/ray_employee', [RayEmployeeController::class, 'store'])->name('login.ray_employee');

Route::post('/login/laboratories_employee',[LaboratoriesEmployeeController::class,'store'])->name('login.laboratories_Employee');

Route::post('/login/patient', [PatientController::class, 'store'])->name('login.patient');

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout.user');
});
Route::post('logout/admin', [AdminController::class, 'destroy'])->middleware('auth:admin')
    ->name('logout.admin');

    Route::post('logout/doctor', [LoginDoctorController::class, 'destroy'])->middleware('auth:doctor')
    ->name('logout.doctor');

    Route::post('/logout/ray_employee', [RayEmployeeController::class, 'destroy'])->middleware('auth:ray_employee')->name('logout.ray_employee');

    Route::post('/logout/laboratories_employee',[LaboratoriesEmployeeController::class,'destroy'])->middleware(['auth:laboratories_Employee'])->name('logout.laboratories_employee');

    Route::post('/logout/patient', [PatientController::class, 'destroy'])->middleware('auth:patient')->name('logout.patient');


    Route::post('/register/admin', [RegisterAdminController::class, 'store'])->middleware('admin')->name('register.admin');
