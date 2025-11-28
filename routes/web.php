<?php

use App\Http\Controllers\ObraController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\ReporteDiarioController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Rutas para Obras
Route::resource('obras', ObraController::class);

// Rutas para Personal
Route::resource('personal', PersonalController::class);

// Rutas para Proveedores
Route::resource('proveedores', ProveedorController::class);

// Rutas para Materiales
Route::resource('materiales', MaterialController::class);

// Rutas para Tareas
Route::resource('tareas', TareaController::class);

// Rutas para Reportes Diarios
Route::resource('reporte-diarios', ReporteDiarioController::class);

// Rutas de autenticación (si usas Laravel UI)
Auth::routes();