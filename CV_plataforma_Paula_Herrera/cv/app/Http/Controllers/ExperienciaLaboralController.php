<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExperienciaLaboral;
use App\Models\User;
use App\Models\Perfil;

class ExperienciaLaboralController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $experiencias=ExperienciaLaboral::all();
        return view('experiencias.create', compact('experiencias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $usuarios = User::all(); 
        return view('experiencias.create', compact('usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validaDatos=$request->validate([
            'usuario_id'=>'required|integer|exists:users,id',
            'empresa'=>'string|max:200',
            'puesto'=>'string|max:50',
            'fecha_inicio'=>'date',
            'fecha_fin'=>'date',
            'descripcion_actividades'=>'string|max:300'
           ]);
    
           $experienciaLaboral=new ExperienciaLaboral();
    
           $experienciaLaboral->usuario_id=$validaDatos['usuario_id'];
           $experienciaLaboral->empresa=$validaDatos['empresa'];
           $experienciaLaboral->puesto=$validaDatos['puesto'];
           $experienciaLaboral->fecha_inicio=$validaDatos['fecha_inicio'];
           $experienciaLaboral->fecha_fin=$validaDatos['fecha_fin'];
           $experienciaLaboral->descripcion_actividades=$validaDatos['descripcion_actividades'];
    
            $experienciaLaboral->save();
    
            return redirect()->route('experiencias.create')->with('succes','Se ha insertado una experiencia laboral académica nueva!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
