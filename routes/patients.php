<?php

use App\Http\Livewire\Chat\Main;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Chat\CreateChat;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Dashboard\Dashboard_Patient\DashboardPatientController;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){


    Route::get('/dashboard/patient', function () {
        return view('Dashboard.dashboard_patient.dashboard');
    })->middleware(['auth:patient', 'verified'])->name('dashboard.patient');

         Route::middleware('auth:patient')->group(function (){


            Route::get('invoices', [DashboardPatientController::class,'invoices'])->name('invoices.patient');
            Route::get('laboratories', [DashboardPatientController::class,'laboratories'])->name('laboratories.patient');
            Route::get('view_laboratories/{id}', [DashboardPatientController::class,'viewLaboratories'])->name('laboratories.view');
            Route::get('rays', [DashboardPatientController::class,'rays'])->name('rays.patient');
            Route::get('view_rays/{id}', [DashboardPatientController::class,'viewRays'])->name('rays.view');
            Route::get('payments', [DashboardPatientController::class,'payments'])->name('payments.patient');

            //##########################################################################################################

        ################################################################################################################

        });


        require __DIR__.'/auth.php';


    });



