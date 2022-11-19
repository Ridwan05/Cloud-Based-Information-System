<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductionRecordController;
use App\Http\Controllers\RecordsController;
use App\Http\Controllers\SalesRecordController;
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

Route::get('/', [AuthController::class, 'showLoginForm'])
    ->name('login')
    ->middleware('guest');

    Route::post('login', [AuthController::class, 'authenticate'])
    ->name('authenticate')
    ->middleware('guest');

Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/records', RecordsController::class)
    ->name('home')
    ->middleware('auth');

Route::prefix('production-records')
    ->name('production_records.')
    ->middleware('auth')
    ->group(function() {
        Route::get('create', [ProductionRecordController::class, 'create'])
            ->name('create');

        Route::post('store', [ProductionRecordController::class, 'store'])
            ->name('store');

        Route::get('show/{id}', [ProductionRecordController::class, 'show'])
            ->name('show');
    });


Route::prefix('sales-records')
    ->name('sales_records.')
    ->middleware('auth')
    ->group(function() {
        Route::get('create', [SalesRecordController::class, 'create'])
            ->name('create');

        Route::post('store', [SalesRecordController::class, 'store'])
            ->name('store');

        Route::get('show/{id}', [SalesRecordController::class, 'show'])
            ->name('show');
    });
