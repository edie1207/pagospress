<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SumUpController;
use App\Http\Controllers\PaymentController;

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
    return view('welcome');
});

Route::get('/test-api-key', [SumUpController::class, 'testApiKey']);
Route::get('/pago', [PaymentController::class, 'showForm'])->name('showPaymentForm');
Route::post('/procesar-pago', [PaymentController::class, 'processPayment'])->name('processPayment');