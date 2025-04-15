<?php


use App\Http\Controllers\Dashboard_Laboratorie_Invoices\LaboratorieInvoicesController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){




        Route::get('/dashboard/laboratories_employee', function () {
            return view('Dashboard.dashboard_LaboratorieEmployee.dashboard');
        })->middleware(['auth:laboratories_Employee','verified'])->name('dashboard.laboratories_employee');







        Route::middleware(['auth:laboratories_Employee'])->group(function () {

            //############################# invoices route ##########################################
             Route::resource('invoices_laboratories_employee', LaboratorieInvoicesController::class);
             Route::get('completed_invoices', [LaboratorieInvoicesController::class,'completed_invoices'])->name('completed_invoices');
             Route::get('view_laboratorie/{id}', [LaboratorieInvoicesController::class,'view_laboratorie'])->name('view_laboratorie');
            //############################# end invoices route ######################################

            });


            require __DIR__ . '/auth.php';

});






