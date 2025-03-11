<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use App\Models\User;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    /**
     * Función que devuelve todos los cv
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
        $usuarios = User::all(); 

        return view('perfiles.create', compact('usuarios'));
    }

    // Método para almacenar un perfil en la base de datos
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'usuario_id' => 'required|exists:users,id', 
            'nombre' => 'required',
            'profesion' => 'required',
            'sobre_mi' => 'required',
            'telefono' => 'required',
            'correo_electronico' => 'required|email',
            'web' => 'required|url',
            'linkedin' => 'required|url',
            'github' => 'required|url'
        ]);

        // Crear el perfil
        Perfil::create([
            'usuario_id' => $request->usuario_id, 
            'nombre_completo' => $request->nombre,
            'profesion' => $request->profesion,
            'sobre_mi' => $request->sobre_mi,
            'telefono' => $request->telefono,
            'correo_electronico' => $request->correo_electronico,
            'sitio_web' => $request->web,
            'linkedin' => $request->linkedin,
            'github' => $request->github
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
            'sobre_mi' => 'required|string|max:255',
            'telefono' => 'required|string|max:10',
            'correo_electronico' => 'required|string|max:255',
            'sitio_web' => 'required|string|max:255',
            'linkedin' => 'required|string|max:255',
            'github' => 'required|string|max:255'
        ]);

        $perfil->nombre_completo = $validate['nombre_completo'];
        $perfil->profesion = $validate['profesion'];
        $perfil->sobre_mi = $validate['sobre_mi'];
        $perfil->telefono = $validate['telefono'];
        $perfil->correo_electronico = $validate['correo_electronico'];
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
