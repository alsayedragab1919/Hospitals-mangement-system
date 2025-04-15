<?php

use App\Http\Controllers\Auth\LaboratoriesEmployeeController;
use App\Http\Controllers\Dashboard\Dashboard_Patient\DashboardPatientController;
use App\Http\Controllers\Diagnosis\DiagnosisController;
use App\Http\Controllers\InvoiceController\InvoiceController;
use App\Http\Controllers\Laboratories\LaboratorieController;
use App\Http\Controllers\LaboratoriesEmployee\LaboratoriesEmployeesController;
use App\Http\Controllers\Rays\RayController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){



        Route::get('/dashboard/doctor', function () {
            return view('dashboard.doctor.dashboard');
        })->middleware(['auth:doctor', 'verified'])->name('dashboard.doctor');


        Route::middleware('auth:doctor')->group(function (){

            Route::prefix('doctor')->group(function(){

                ############################# completed_invoices route ##########################################
            Route::get('completed_invoices', [InvoiceController::class,'completedInvoices'])->name('completedInvoices');
            ############################# end invoices route ################################################

             ############################# review_invoices route ##########################################
             Route::get('review_invoices', [InvoiceController::class,'reviewInvoices'])->name('reviewInvoices');
             ############################# end invoices route #############################################

             ############################# invoices route ##########################################
            Route::resource('invoices', InvoiceController::class);
            ############################# end invoices route ######################################

            ############################# review_invoices route ##########################################
            Route::post('add_review', [DiagnosisController::class,'addReview'])->name('add_review');
            ############################# end invoices route #############################################

             ############################# Diagnostics route ##########################################

              Route::resource('Diagnostics', DiagnosisController::class);

              ############################# end Diagnostics route ######################################



               Route::resource('Laboratories',LaboratorieController::class);
                Route::get('show_laboratorie/{id}', [InvoiceController::class,'showLaboratorie'])->name('show.laboratorie');
              ##########################################################################################
              Route::resource('rays', RayController::class);
              ###########################################################################################

              Route::get('patient_details/{id}', [DashboardPatientController::class,'index'])->name('patient_details');
              Route::delete('patient_details/{id}', [DashboardPatientController::class,'destroy'])->name('patient_details.destroy');
              ########################################################################################################


            });
        });




    require __DIR__.'/auth.php';


});


