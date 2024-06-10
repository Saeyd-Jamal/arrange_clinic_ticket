<?php

use App\Http\Controllers\ClinicController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [ClinicController::class, 'doctorView'])->name('doctorView')->middleware(['auth']);

Route::post('doctor/getNumTeckit', [ClinicController::class, 'getNumTeckit']);



Route::get('front_view/', [ClinicController::class, 'clinicView'])->middleware(['auth'])->name('front_view');

Route::post('front_view/getClinicView', [ClinicController::class, 'getClinicView'])->name('getClinicView');

Route::get('front_view/getClinicViewAjax', [ClinicController::class, 'getClinicViewAjax'])->name('getClinicViewAjax');

Route::get('doctorsTable/', [ClinicController::class, 'doctorsTable'])->name('doctorsTable')->middleware(['auth']);

Route::get('clinicsTable/', [ClinicController::class, 'clinicsTable'])->name('clinicsTable')->middleware(['auth']);
Route::get('clinicsTable/create', [ClinicController::class, 'create'])->name('clinic.create')->middleware(['auth']);
Route::post('clinicsTable/store', [ClinicController::class, 'store'])->name('clinic.store')->middleware(['auth']);
Route::get('clinicsTable/{id}/', [ClinicController::class, 'edit'])->name('clinic.edit')->middleware(['auth']);
Route::patch('clinicsTable/{id}/update', [ClinicController::class, 'update'])->name('clinic.update')->middleware(['auth']);
Route::delete('clinicsTable/{id}/destroy', [ClinicController::class, 'destroy'])->name('clinic.destroy')->middleware(['auth']);



Route::get('front/', function () {
    return view('clinics-yafa.clinic1');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('profile',ProfileController::class);
});

require __DIR__.'/auth.php';
