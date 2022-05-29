<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\PatientController as AdminPatientController;
use App\Http\Controllers\admin\PatientRegisterController as AdminPatientRegisterController;
use App\Http\Controllers\admin\TestResultController as AdminTestResultControler;
use App\Http\Controllers\front\PatientController;
use App\Http\Controllers\front\PatientRegisterCheckController;
use App\Http\Controllers\front\PatientRegisterController;
use App\Http\Controllers\front\TestResultController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/patient-register');

//Patient
Route::resource('patient', PatientController::class);
Route::post('patient', [PatientController::class, 'check'])->name('patient.check');
Route::get('patient/register/{nik}', [PatientController::class, 'register'])->name('patient.register');
Route::post('patient/register', [PatientController::class, 'register_store'])->name('patient.register.store');

//Patient Register
Route::resource('patient-register', PatientRegisterController::class);
Route::get('patient-register/success/{register_number}', [PatientRegisterController::class, 'success'])->name('patient-register.success');

//Check Patient Register
Route::get('check-patient-register', [PatientRegisterCheckController::class, 'index'])
    ->name('check-patient-register.index');
Route::post('check-patient-register', [PatientRegisterCheckController::class, 'check'])
    ->name('check-patient-register.check');
Route::get('check-patient-register/{registerNumber}', [PatientRegisterCheckController::class, 'show'])
    ->name('check-patient-register.show');

//Test Result
Route::get('test-result', [TestResultController::class, 'index'])->name('test-result.index');
Route::post('test-result', [TestResultController::class, 'check'])->name('test-result.check');
Route::get('test-result/{registerNumber}', [TestResultController::class, 'show'])->name('test-result.show');
Route::get('test-result/{test_result}/export/', [TestResultController::class, 'export'])->name('test-result.export');

Route::group(['middleware' => ['auth', 'checkRole:admin']], function(){
    Route::prefix('admin')->name('admin.')->group(function(){
        //Dashboard
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // json for datatable
        Route::get('data/register-patient', [AdminPatientRegisterController::class, 'getdata'])->name('data.admin-register-patient');
        Route::get('data/test-result', [AdminTestResultControler::class, 'getdata'])->name('data.admin-test-result');

        //Route resources
        Route::resources([
            //Patient
            'patient' => AdminPatientController::class,

            //Patient Register
            'register-patient' => AdminPatientRegisterController::class,

            //Test result
            'test-result' => AdminTestResultControler::class,
        ]);

        //Test result
        Route::get('test-result/{test_result}/export/', [AdminTestResultControler::class, 'export'])->name('test-result.export');
    });
});
