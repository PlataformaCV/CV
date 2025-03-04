<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use App\Models\User;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    /**
     * Muestra una lista de los perfiles.
     */
    public function index()
{
    // Obtener todos los perfiles
    $perfiles = Perfil::all(); 
    $usuarios = User::all();

    // Pasar los perfiles a la vista
    return view('perfiles.index', compact('perfiles', 'usuarios'));
}

    public function create()
    {
        // Obtener todos los usuarios
        $usuarios = User::all(); // Todos los usuarios disponibles para elegir
        $perfiles=Perfil::all();

        // Pasar los usuarios a la vista
        return view('perfiles.create', compact('usuarios', 'perfiles'));
    }

    // Método para almacenar un perfil en la base de datos
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required',
            'profesion' => 'required',
            'descripcion' => 'required',
            'telefono' => 'required',
            'email' => 'required|email',
            'web' => 'required|url',
            'linkedin' => 'required|url',
            'github' => 'required|url',
            'usuario_id' => 'required|exists:users,id', // Asegurarse de que el usuario exista
        ]);

        // Crear el perfil
        Perfil::create([
            'nombre_completo' => $request->nombre,
            'profesion' => $request->profesion,
            'descripcion' => $request->descripcion,
            'telefono' => $request->telefono,
            'email' => $request->email,
            'sitio_web' => $request->web,
            'linkedin' => $request->linkedin,
            'github' => $request->github,
            'usuario_id' => $request->usuario_id, // Asignar el usuario seleccionado
        ]);

        // Redirigir al índice de perfiles con mensaje de éxito
        return redirect()->route('perfiles.index')->with('success', 'Perfil creado exitosamente');
    }

    

    /**
     * Muestra un perfil específico.
     */
    public function show(string $id)
    {
        $perfil = Perfil::findOrFail($id);
        return view('perfiles.show', compact('perfil'));
    }

    /**
     * Muestra el formulario para editar un perfil existente.
     */
    public function edit(string $id)
    {
        $perfil = Perfil::findOrFail($id);
        return view('perfiles.edit', compact('perfil'));
    }

    /**
     * Actualiza un perfil en la base de datos.
     */
    public function update(Request $request, string $id)
    {
        $perfil = Perfil::findOrFail($id);

        $validate = $request->validate([
            'nombre_completo' => 'required|string|max:255',
            'profesion' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'telefono' => 'required|string|max:10',
            'email' => 'required|string|max:255',
            'sitio_web' => 'required|string|max:255',
            'linkedin' => 'required|string|max:255',
            'github' => 'required|string|max:255'
        ]);

        $perfil->nombre_completo = $validate['nombre_completo'];
        $perfil->profesion = $validate['profesion'];
        $perfil->descripcion = $validate['descripcion'];
        $perfil->telefono = $validate['telefono'];
        $perfil->email = $validate['email'];
        $perfil->sitio_web = $validate['sitio_web'];
        $perfil->linkedin = $validate['linkedin'];
        $perfil->github = $validate['github'];

        $perfil->save();

        return redirect()->route('perfiles.index');
    }

    /**
     * Elimina un perfil de la base de datos.
     */
    public function destroy(string $id)
    {
        $perfil = Perfil::findOrFail($id);
        $perfil->delete();

        return redirect()->route('perfiles.index');
    }
}
