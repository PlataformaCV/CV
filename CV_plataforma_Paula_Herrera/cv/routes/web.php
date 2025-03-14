<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\EducacionController;
use App\Http\Controllers\HabilidadesController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\ExperienciaLaboralController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [PerfilController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile', [ProfileController::class, 'create'])->name('profile.create');
});

Route::resource('perfiles', PerfilController::class);
Route::get('/mi-cv', [PerfilController::class, 'show'])->name('perfiles.show');
// Ruta para editar el perfil (mostrar el formulario)
Route::get('perfiles/{id}/edit', [PerfilController::class, 'edit'])->name('perfiles.edit');

// Ruta para actualizar el perfil (guardar los cambios)
Route::put('perfiles/{id}', [PerfilController::class, 'update'])->name('perfiles.update');

Route::resource('formaciones', EducacionController::class);
Route::resource('habilidades', HabilidadesController::class);
Route::resource('experiencias', ExperienciaLaboralController::class);
Route::resource('proyectos', ProyectoController::class);

require __DIR__.'/auth.php';
