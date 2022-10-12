<?php

use App\Http\Controllers\AssesmentController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
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

Route::view('/', 'welcome');
Route::get('pendaftaran', [StudentController::class, 'register'])->name('register.student');
Route::post('pendaftaran', [StudentController::class, 'store'])->name('regist');

Route::middleware('guest')->group(function() {
    Route::get('login', [LoginController::class, 'show'])->name('login');
    Route::post('login', [LoginController::class, 'store'])->name('login');
});

Route::middleware('auth')->group(function() {
    Route::get('dashboard', [DashboardController::class, 'show'])->name('dashboard');
    Route::get('santri/list', [StudentController::class, 'show'])->name('show.santri');
    Route::get('santri/tambah', [StudentController::class, 'create'])->name('create.santri');
    Route::get('santri/{student:id}/ubah', [StudentController::class, 'edit'])->name('edit.santri');
    Route::put('santri/{student:id}/ubah', [StudentController::class, 'update'])->name('update.santri');
    Route::delete('santri/{student:id}/delete', [StudentController::class, 'destroy'])->name('delete.santri');
    Route::get('kriteria/list', [CriteriaController::class, 'show'])->name('show.criteria');
    Route::get('kriteria/tambah', [CriteriaController::class, 'create'])->name('create.criteria');
    Route::post('kriteria/tambah', [CriteriaController::class, 'store'])->name('store.criteria');
    Route::get('kriteria/{criteria:id}/ubah', [CriteriaController::class, 'edit'])->name('edit.criteria');
    Route::put('kriteria/{criteria:id}/ubah', [CriteriaController::class, 'update'])->name('update.criteria');
    Route::delete('kriteria/{criteria:id}/delete', [CriteriaController::class, 'destroy'])->name('delete.criteria');
    Route::get('kriteria/fuzzy/tambah', [CriteriaController::class, 'createFuzzy'])->name('create.fuzzy');
    Route::post('kriteria/fuzzy/tambah', [CriteriaController::class, 'storeFuzzy'])->name('store.fuzzy');
    Route::get('kriteria/fuzzy/{parameter:id}/ubah', [CriteriaController::class, 'editFuzzy'])->name('edit.fuzzy');
    Route::put('kriteria/fuzzy/{parameter:id}/ubah', [CriteriaController::class, 'updateFuzzy'])->name('update.fuzzy');
    Route::delete('kriteria/fuzzy/{parameter:id}/delete', [CriteriaController::class, 'destroyFuzzy'])->name('delete.fuzzy');
    Route::get('penilaian/tambah', [AssesmentController::class, 'create'])->name('create.assesment');
    Route::post('penilaian', [AssesmentController::class, 'store'])->name('store.assesment');
    Route::get('penilaian/list', [AssesmentController::class, 'show'])->name('show.assesment');
    Route::get('penilaian/{assesment:student_id}/ubah', [AssesmentController::class, 'edit'])->name('edit.assesment');
    Route::put('penilaian/{assesment:student_id}/ubah', [AssesmentController::class, 'update'])->name('update.assesment');
    Route::delete('penilaian/{assesment:student_id}/delete', [AssesmentController::class, 'destroy'])->name('delete.assesment');
    Route::post('penilaian/list/store', [AssesmentController::class, 'storeResults'])->name('store.results');
    Route::get('penilaian/hasil', [ResultController::class, 'show'])->name('choose.results');
    Route::get('penilaian/hasil/{result:id}', [ResultController::class, 'results'])->name('show.results');
    Route::post('logout', LogoutController::class)->name('logout');
});


