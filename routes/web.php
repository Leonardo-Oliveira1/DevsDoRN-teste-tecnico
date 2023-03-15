<?php

use App\Http\Controllers\AnnuitiesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssociatesController;

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


Route::get('/', function () {
    return view('home');
});

Route::get('/anuidades', function () {
    return view('annuities');
})->name('annuities');

Route::get('/associados', function () {
    return view('associates');
})->name('associates');

Route::get('/registrarAssociado', [AssociatesController::class, 'index'])->name('register_associate');
Route::post('/registrarAssociado', [AssociatesController::class, 'store'])->name('saveAssociate');

Route::get('/registrarAnuidade', [AnnuitiesController::class, 'index'])->name('register_annuity');
Route::post('/registrarAnuidade', [AnnuitiesController::class, 'store'])->name('saveAnnuity');
