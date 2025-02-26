<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ExperienciaLaboralController;
use App\Http\Controllers\HabilidadesController;
use App\Http\Controllers\ProyectoController;

Route::apiResource('/perfiles', PerfilController::class);
Route::apiResource('/experiencia', ExperienciaLaboralController::class);
Route::apiResource('/formacionController', HabilidadesController::class);
Route::apiResource('/Habilidades', ProyectoController::class);

