<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TwoFactorController;
use App\Http\Controllers\ComercialController;
use App\Http\Controllers\SoporteController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\CrmController;
use App\Http\Controllers\RhController;
use App\Http\Controllers\TecnicoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProveedorController;

// Página principal
Route::get('/', function () {
    return view('welcome');
});

// Comercial → Proveedores (CRUD completo dentro de comercial)
Route::prefix('comercial')->name('comercial.')->group(function () {
    Route::resource('proveedores', ProveedorController::class);
});

// Técnicos (CRUD completo)
Route::resource('tecnicos', TecnicoController::class);

// Soporte (CRUD completo)
Route::resource('soporte', SoporteController::class);

// Inventario (CRUD completo)
Route::resource('inventario', InventarioController::class);

// CRM (CRUD completo)
Route::resource('crm', CrmController::class);

// Recursos Humanos (CRUD completo)
Route::resource('rh', RhController::class);

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Perfil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 2FA
Route::get('/2fa/setup', [TwoFactorController::class, 'setup'])->name('2fa.setup');
Route::post('/2fa/verify', [TwoFactorController::class, 'verify'])->name('2fa.verify');
Route::post('/2fa/disable', [TwoFactorController::class, 'disable'])->name('2fa.disable');

Route::middleware(['auth', '2fa'])->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');
});

require __DIR__.'/auth.php';


