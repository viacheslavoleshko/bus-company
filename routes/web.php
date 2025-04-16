<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BusController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CarBrandController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->middleware(['role:manager|admin|driver'])->name('dashboard');

    Route::get('/drivers', [UserController::class, 'index'])->middleware(['role:manager|admin|driver'])->name('drivers.index');
    Route::get('/drivers/create', [UserController::class, 'create'])->middleware(['role:admin'])->name('drivers.create');
    Route::get('/drivers/{driver}/edit', [UserController::class, 'edit'])->middleware(['role:admin'])->name('drivers.edit');
    Route::post('/drivers', [UserController::class, 'store'])->middleware(['role:admin'])->name('drivers.store');
    Route::put('/drivers/{driver}', [UserController::class, 'update'])->middleware(['role:admin'])->name('drivers.update');
    Route::delete('/drivers/{driver}', [UserController::class, 'destroy'])->middleware(['role:admin'])->name('drivers.destroy');

    Route::get('/brands', [CarBrandController::class, 'index'])->middleware(['role:admin'])->name('brands.index');
    Route::get('/brands/create', [CarBrandController::class, 'create'])->middleware(['role:admin'])->name('brands.create');
    Route::get('/brands/{brand}/edit', [CarBrandController::class, 'edit'])->middleware(['role:admin'])->name('brands.edit');
    Route::post('/brands', [CarBrandController::class, 'store'])->middleware(['role:admin'])->name('brands.store');
    Route::put('/brands/{brand}', [CarBrandController::class, 'update'])->middleware(['role:admin'])->name('brands.update');
    Route::delete('/brands/{brand}', [CarBrandController::class, 'destroy'])->middleware(['role:admin'])->name('brands.destroy');

    Route::get('/buses', [BusController::class, 'index'])->middleware(['role:manager|admin'])->name('buses.index');
    Route::get('/buses/create', [BusController::class, 'create'])->middleware(['role:admin'])->name('buses.create');
    Route::get('/buses/{bus}/edit', [BusController::class, 'edit'])->middleware(['role:admin'])->name('buses.edit');
    Route::post('/buses', [BusController::class, 'store'])->middleware(['role:admin'])->name('buses.store');
    Route::put('/buses/{bus}', [BusController::class, 'update'])->middleware(['role:admin'])->name('buses.update');
    Route::delete('/buses/{bus}', [BusController::class, 'destroy'])->middleware(['role:admin'])->name('buses.destroy');
});

