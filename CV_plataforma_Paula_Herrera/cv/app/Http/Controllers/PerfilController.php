<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perfiles=Perfil::All();
        return view($perfiles);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('profile.create');  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate=$request->validate([
        'nombre_completo'=>'required|string|max:255',
        'profesion'=>'required|string|max:255',
        'descripcion'=>'required|string|max:255',
        'telefono'=>'required|string|max:10',
        'email'=>'required|string|max:255',
        'sitio_web'=>'required|string|max:255',
        'sitio_web'=>'required|string|max:255',
        'linkedin'=>'required|string|max:255',
        'github'=>'required|string|max:255'
        ]);
        $perfil=new Perfil();   

        $perfil->nombre_completo = $validated['nombre_completo'];
        $perfil->profesion = $validated['profesion'];
        $perfil->descripcion = $validated['descripcion'];
        $perfil->telefono = $validated['telefono'];
        $perfil->email = $validated['email'];
        $perfil->sitio_web = $validated['sitio_web'];
        $perfil->linkedin = $validated['linkedin'];
        $perfil->github = $validated['github'];

        $perfil->save();

        return redirect()->route('profile.create');
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
