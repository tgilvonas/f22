<?php

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

Route::get('/',  [\App\Http\Controllers\OrdersController::class, 'step1'])->name('orders.step1');
Route::post('/step2',  [\App\Http\Controllers\OrdersController::class, 'postToStep2'])->name('orders.post_to_step2');
Route::get('/step2',  [\App\Http\Controllers\OrdersController::class, 'step2'])->name('orders.step2');
Route::post('/step3',  [\App\Http\Controllers\OrdersController::class, 'postToStep3'])->name('orders.post_to_step3');
Route::get('/step3',  [\App\Http\Controllers\OrdersController::class, 'step3'])->name('orders.step3');
