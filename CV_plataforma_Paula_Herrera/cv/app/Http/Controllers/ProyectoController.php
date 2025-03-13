<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyectos;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $perfil=Auth::user()->perfil;
        $proyectos=$perfil->proyectos;
        return view('proyectos.index', compact('proyectos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $proyectos=Proyectos::all();
        $usuarios= User::all();
        return view('proyectos.create', compact('proyectos', 'usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validarDatos=$request->validate([
            'usuario_id'=>'required|exists:users,id',
            'titulo'=>'required|string|max:223',
            'descripcion'=>'string|max:225',
            'enlace_proyecto'=>'required|string|max:255'
        ]);

        $proyectos=new Proyectos();
        $proyectos->usuario_id=$validarDatos['usuario_id'];
        $proyectos->titulo=$validarDatos['titulo'];
        $proyectos->descripcion=$validarDatos['descripcion'];
        $proyectos->enlace_proyecto=$validarDatos['enlace_proyecto'];

        try {
            $proyectos->save();
            return redirect()->route('proyectos.index')->with('success', 'Proyecto creado exitosamente');
        } catch (\Exception $e) {
            // Manejar el error, por ejemplo, mostrando el mensaje en la vista
            return back()->with('error', 'Hubo un problema al crear el proyecto');
        }
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
        $proyecto = Proyectos::findOrFail($id);
        $proyecto->delete();

        return redirect()->route('proyectos.index');
    }
}
