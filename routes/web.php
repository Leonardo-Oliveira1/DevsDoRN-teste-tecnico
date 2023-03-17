<?php

use App\Http\Controllers\AnnuitiesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssociatesController;
use App\Http\Controllers\CheckoutController;

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


Route::get('/associados', [AssociatesController::class, 'index'])->name('associates');
Route::get('/associate/{id}', [AssociatesController::class, 'AssociateIndex'])->name('associate');
Route::get('/registrarAssociado', [AssociatesController::class, 'registerIndex'])->name('registerAssociate');
Route::post('/salvarAssociado', [AssociatesController::class, 'store'])->name('saveAssociate');

Route::get('/anuidades', [AnnuitiesController::class, 'index'])->name('annuities');
Route::get('/registrarAnuidade', [AnnuitiesController::class, 'registerIndex'])->name('registerAnnuity');
Route::post('/salvarAnuidade', [AnnuitiesController::class, 'store'])->name('saveAnnuity');

Route::get('/alterarValorAnuidade/{id}', [AnnuitiesController::class, 'editIndex'])->name('editAnnuity');
Route::post('/salvarValorAnuidade/{id}', [AnnuitiesController::class, 'edit'])->name('saveEditAnnuity');


