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
        $habilidades= Habilidades::all();
        return view('perfiles.index', compact('habilidades'));
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
        $validarDatos=validate([
            'usuario_id'=>'required|exists:users,id',
            'habilidad'=>'string|max:225',
            'nivel'=>'string|max:111'
        ]);

        $habilidad=new Habilidad();
        $habilidad->usuario_id=$validarDatos['usuario_id'];
        $habilidad->habilidad=$validarDatos['habilidad'];
        $habilidad->nivel=$validarDatos['nivel'];

        $habilidad->save();

        return;
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
