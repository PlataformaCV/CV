<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\FormacionController;
use App\Http\Controllers\HabilidadesController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\ExperienciaLaboralController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile', [ProfileController::class, 'create'])->name('profile.create');
});

Route::resource('perfiles', PerfilController::class);
Route::resource('formaciones', FormacionController::class);
Route::resource('habilidades', HabilidadesController::class);
Route::resource('experiencias', ExperienciaLaboralController::class);
Route::resource('proyectos', ProyectoController::class);

require __DIR__.'/auth.php';
