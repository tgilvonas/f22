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
Route::get('/get-list-of-districts',  [\App\Http\Controllers\OrdersController::class, 'getListOfDistricts'])->name('orders.get_list_of_districts');
Route::post('/after-step-1',  [\App\Http\Controllers\OrdersController::class, 'postAfterStep1'])->name('orders.post_after_step_1');
Route::get('/step2',  [\App\Http\Controllers\OrdersController::class, 'step2'])->name('orders.step2');
Route::post('/after-step-2',  [\App\Http\Controllers\OrdersController::class, 'postAfterStep2'])->name('orders.post_after_step_2');
Route::get('/step2-1', [\App\Http\Controllers\OrdersController::class, 'step2Point1'])->name('orders.step2_point_1');
Route::post('/after-step-2-point-1',  [\App\Http\Controllers\OrdersController::class, 'postAfterStep2Point1'])->name('orders.post_after_step_2_point_1');
Route::get('/step3',  [\App\Http\Controllers\OrdersController::class, 'step3'])->name('orders.step3');
