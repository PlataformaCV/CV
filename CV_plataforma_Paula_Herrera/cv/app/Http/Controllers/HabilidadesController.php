<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Habilidades;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HabilidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perfil=Auth::user()->perfil;//si el user esta autenticado filtrar por habilidades
        
        $habilidades= $perfil->habilidades;
        return view('habilidades.index', compact('habilidades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        // //$user = Auth::user();
        // $user = User::find(3);
        // return $user->perfil->profesion;
        $habilidades=Habilidades::all();
        $usuarios= User::all();
        return view('habilidades.create', compact('habilidades', 'usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validarDatos=$request->validate([
            'usuario_id'=>'required|exists:users,id',
            'nombre_habilidad'=>'string|max:225',
            'nivel'=>'in:Basico,Intermedio,Avanzado,Experto'
        ]);

        $habilidad=new Habilidades();
        $habilidad->usuario_id=$validarDatos['usuario_id'];
        $habilidad->nombre_habilidad=$validarDatos['nombre_habilidad'];
        $habilidad->nivel=$validarDatos['nivel'];

        try {
            $habilidad->save();
            return redirect()->route('habilidades.index')->with('success', 'Habilidad creada exitosamente');
        } catch (\Exception $e) {
            // Manejo el error
            return back()->with('error', 'Hubo un problema al crear la habilidad');
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
        $habilidadEliminar=Habilidades::find($id);
        $habilidadEliminar->delete();

        return redirect()->route('habilidades.index');
    }
}
