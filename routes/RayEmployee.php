<?php

use App\Http\Controllers\Dashboard\Dashboard_Rays\InvoiceRayController;
use App\Http\Controllers\Dashboard\DiagnosticController;
use App\Http\Controllers\Dashboard\InvoiceController;
use App\Http\Controllers\Dashboard\LaboratorieController;
use App\Http\Controllers\Dashboard\RayController;
use App\Http\Controllers\Dashboard\PatientDetailsController;

use App\Models\Invoice;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {





        Route::get('/dashboard/ray_employee', function () {
            return view('Dashboard.dashboard-rays.dashboard');

        })->middleware(['auth:ray_employee'])->name('dashboard.ray_employee');

        Route::middleware(['auth:ray_employee'])->group(function (){

        Route::resource('invoices_ray_employee', InvoiceRayController::class);

        Route::get('completed_Invoices', [InvoiceRayController::class,'completed_Invoices'])->name('completed_Invoices');

        Route::get('View_Rays/{id}', [InvoiceRayController::class,'ViewRays'])->name('View_Rays');


    });


        require __DIR__.'/auth.php';

});




