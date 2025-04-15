<?php

use App\Events\MyEvents;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Rays\RayControllerEmployee;
use App\Http\Controllers\Appointment\AppointmentController;
use App\Http\Controllers\Dashboard\Doctor\DoctorController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Dashboard\Section\sectionController;
use App\Http\Controllers\InvoiceController\InvoiceController;
use App\Http\Controllers\PatinetController\PatinetController;
use App\Http\Controllers\paymentController\paymentController;
use App\Http\Controllers\AmbulanceController\AmbulanceController;
use App\Http\Controllers\InsuranceController\InsuranceController;
use App\Http\Controllers\SingleServiceController\SingleServiceController;
use App\Http\Controllers\ReceiptAccountController\ReceiptAccountController;

use App\Http\Controllers\LaboratoriesEmployee\LaboratoriesEmployeeController;
use App\Http\Controllers\Dashboard\DashboardAdminController\DashboardAdminController;

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

Route::get('dashboard/Admin',[DashboardAdminController::class,'index']);
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){



    Route::get('/Admin/dashboard', function () {
        return view('Dashboard.Admin.dashboard');
    })->middleware(['auth:admin', 'verified'])->name('dashboard.admin');


    Route::get('/dashboard/user', function () {

        return view('Dashboard.Users.dashboard');
    })->middleware(['auth:web','verified'])->name('dashboard.user');




    Route::middleware('auth:admin')->group(function (){

        Route::resource('Sections',sectionController::class);

        ######################################end sections ###############################################
        Route::resource('Doctors',DoctorController::class);
        Route::post('update_password',[DoctorController::class,'update_password'])->name('update_password');
        Route::post('update_status', [DoctorController::class, 'update_status'])->name('update_status');
        ###################################### end Doctors###############################################
        Route::resource('Services',SingleServiceController::class);
     ######################################################################################################
     Route::view('Add_GroupServices','livewire.GroupServices.include_create')->name('Add_GroupServices');
     #######################################################################################################
        Route::resource('insurance',InsuranceController::class);
       #######################################################################################################
        Route::resource('Ambulance',AmbulanceController::class);
       #########################################################################################################
        Route::resource('Patients',PatinetController::class);
       ###########################################################################################################

       Route::view('single_invoices','livewire.single_invoices.index')->name('single_invoices');

       Route::view('Print_single_invoices','livewire.single_invoices.print')->name('Print_single_invoices');
       ###################################################################################################
        Route::resource('Receipt',ReceiptAccountController::class);
       ####################################################################################################
        Route::resource('Payment',paymentController::class);
        ####################################################################################################
        Route::resource('ray_employee',RayControllerEmployee::class);
        Route::resource('Laboratorie_Employee',LaboratoriesEmployeeController::class);
        Route::resource('Invoices_ray', InvoiceController::class);


        Route::view('group-invoices','livewire.group_invoices.index')->name('group-invoices');

        Route::view('group_Print_single_invoices','livewire.group_invoices.print')->name('group_Print_single_invoices');
       // ======================================================================================================
       ##############################################################################################
       Route::get('appointments',[AppointmentController::class,'index'])->name('appointments.index');
       Route::put('appointments/approval/{id}',[AppointmentController::class,'approval'])->name('appointments.approval');
       Route::get('appointments/approval',[AppointmentController::class,'index2'])->name('appointments.index2');
       Route::get('appointments/Expire',[AppointmentController::class,'index3'])->name('appointments.index3');
     Route::delete('appointments/destroy/{id}',[AppointmentController::class,'destroy'])->name('appointments.destroy');

    });


});

Route::get('/',function (){
    return view('welcome');
});
