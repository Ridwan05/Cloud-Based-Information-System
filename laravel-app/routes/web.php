<?php

use App\Http\Controllers\ProductionRecordController;
use App\Http\Controllers\RecordsController;
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

Route::get('/', RecordsController::class)->name('home');

Route::prefix('production-records')->name('production_records.')->group(function() {
    Route::get('create', [ProductionRecordController::class, 'create'])
        ->name('create');

    Route::post('store', [ProductionRecordController::class, 'store'])
        ->name('store');
});
