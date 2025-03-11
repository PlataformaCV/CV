<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Educacion;
use App\Models\User;
use App\Models\Perfil;

class EducacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $formaciones=Educacion::all();
        return view('formaciones.index', compact('formaciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $usuarios = User::all(); 
        return view('formaciones.create', compact('usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validaDatos=$request->validate([
        'usuario_id'=>'required|integer|exists:users,id',
        'institucion'=>'string|max:200',
        'titulo_obtenido'=>'string|max:50',
        'fecha_inicio'=>'date',
        'fecha_fin'=>'date'
       ]);

       $formacionAcademica=new Educacion();

       $formacionAcademica->usuario_id=$validaDatos['usuario_id'];
       $formacionAcademica->institucion=$validaDatos['institucion'];
       $formacionAcademica->titulo_obtenido=$validaDatos['titulo_obtenido'];
       $formacionAcademica->fecha_inicio=$validaDatos['fecha_inicio'];
       $formacionAcademica->fecha_fin=$validaDatos['fecha_fin'];

        $formacionAcademica->save();

        return redirect()->route('formaciones.index')->with('succes','Se ha creado una fomación académica nueva!');

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
       
        $formacion = Educacion::find($id);
        $formacion->delete();

        return redirect()->route('formaciones.index');
    }
}
