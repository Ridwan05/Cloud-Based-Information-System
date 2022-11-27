<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductionRecordController;
use App\Http\Controllers\RecordsController;
use App\Http\Controllers\SalesRecordController;
use App\Http\Controllers\UserController;
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

Route::view('/', 'home')
    ->name('home')
    ->middleware('guest');

Route::get('/login', [AuthController::class, 'showLoginForm'])
    ->name('login')
    ->middleware('guest');

    Route::post('login', [AuthController::class, 'authenticate'])
    ->name('authenticate')
    ->middleware('guest');

Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/records', RecordsController::class)
    ->name('records')
    ->middleware('auth');

Route::prefix('production-records')
    ->name('production_records.')
    ->middleware('auth')
    ->group(function() {

        Route::get('show/{id}', [ProductionRecordController::class, 'show'])
            ->name('show');

        Route::get('create', [ProductionRecordController::class, 'create'])
            ->name('create');

        Route::post('store', [ProductionRecordController::class, 'store'])
            ->name('store');

        Route::get('edit/{id}', [ProductionRecordController::class, 'edit'])
            ->name('edit')
            ->middleware('admin');

        Route::post('update/{id}', [ProductionRecordController::class, 'update'])
            ->name('update')
            ->middleware('admin');

        Route::delete('delete/{id}', [ProductionRecordController::class, 'destroy'])
            ->name('destroy')
            ->middleware('admin');
    });


Route::prefix('sales-records')
    ->name('sales_records.')
    ->middleware('auth')
    ->group(function() {
        Route::get('show/{id}', [SalesRecordController::class, 'show'])
            ->name('show');

        Route::get('create', [SalesRecordController::class, 'create'])
            ->name('create');

        Route::post('store', [SalesRecordController::class, 'store'])
            ->name('store');

        Route::get('edit/{id}', [SalesRecordController::class, 'edit'])
            ->name('edit')
            ->middleware('admin');

        Route::post('update/{id}', [SalesRecordController::class, 'update'])
            ->name('update')
            ->middleware('admin');

        Route::delete('delete/{id}', [SalesRecordController::class, 'destroy'])
            ->name('destroy')
            ->middleware('admin');
        });
    
    
Route::prefix('users')
    ->name('users.')
    ->middleware(['auth', 'admin'])
    ->group(function() {
        Route::get('index', [UserController::class, 'index'])
            ->name('index');

        Route::get('create', [UserController::class, 'create'])
            ->name('create');

        Route::post('store', [UserController::class, 'store'])
            ->name('store');

        Route::get('edit/{id}', [UserController::class, 'edit'])
            ->name('edit');

        Route::put('update/{id}', [UserController::class, 'update'])
            ->name('update');
    });
