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
    $perfiles = Perfil::all();
    $usuarios = User::all();

    // Pasar los perfiles a la vista
    return view('perfiles.index', compact('perfiles', 'usuarios'));
}

    public function create()
    {
        $usuarios = User::all();
        $usuario = auth()->user();

        // Verificar si el usuario ya tiene un perfil, ya que solo se puede crear un cv por usuario
        $perfil = Perfil::where('usuario_id', $usuario->id)->first();
        if($perfil){
            return redirect()->route('perfiles.index')->with('success', 'Ya tiene un CV creado, actualicelo!');
        }else{
            return view('perfiles.create', compact('usuarios'));
        }
    }

    // Método para almacenar un perfil en la base de datos
    public function store(Request $request)
    {
       // Validar los datos del formulario
            $request->validate([
                'usuario_id' => 'required|exists:users,id',
                'nombre_completo' => 'required|string|max:255',
                'profesion' => 'required|string|max:255',
                'sobre_mi' => 'required|string|max:255',
                'telefono' => 'required|string|max:10',
                'correo_electronico' => 'required|email',
                'web' => 'required|url',
                'linkedin' => 'required|url',
                'github' => 'required|url'
            ]);
            Perfil::create([
                'usuario_id' => $request->usuario_id,
                'nombre_completo' => $request->nombre_completo,
                'profesion' => $request->profesion,
                'sobre_mi' => $request->sobre_mi,
                'telefono' => $request->telefono,
                'correo_electronico' => $request->correo_electronico,
                'sitio_web' => $request->web,
                'linkedin' => $request->linkedin,
                'github' => $request->github
            ]);

            return redirect()->route('perfiles.index')->with('success', 'Perfil creado exitosamente!');

    }



    /**
     * Mostrar un perfil específico.
     */
    public function show()
    {
        // Obtener el perfil del usuario autenticado
        $perfil = auth()->user()->perfil;
    
        // Si no existe un perfil, redirigir o manejar el error de alguna manera
        if (!$perfil) {
            return redirect()->route('perfiles.create')->with('error', 'No tienes un perfil creado aún');
        }
    
        // Si existe el perfil, pasar a la vista
        return view('perfiles.show', compact('perfil'));
    }
    
    /**
     * Muestra el formulario para editar un perfil existente.
     */
    public function edit(string $id)
    {
        $perfil = Perfil::find($id);
        return view('perfiles.edit', compact('perfil'));
    }

    /**
     * Actualiza un perfil en la base de datos.
     */
    public function update(Request $request, string $id)
    {
        $perfil = Perfil::findOrFail($id);

        $validate = $request->validate([
            'usuario_id' =>'required|exists:users,id',
            'nombre_completo' => 'required|string|max:255',
            'profesion' => 'required|string|max:255',
            'sobre_mi' => 'required|string|max:255',
            'telefono' => 'required|string|max:10',
            'correo_electronico' => 'required|string|max:255',
            'sitio_web' => 'required|string|max:255',
            'linkedin' => 'required|string|max:255',
            'github' => 'required|string|max:255'
        ]);

        $perfil->usuario_id=$validate['usuario_id'];
        $perfil->nombre_completo = $validate['nombre_completo'];
        $perfil->profesion = $validate['profesion'];
        $perfil->sobre_mi = $validate['sobre_mi'];
        $perfil->telefono = $validate['telefono'];
        $perfil->correo_electronico = $validate['correo_electronico'];
        $perfil->sitio_web = $validate['sitio_web'];
        $perfil->linkedin = $validate['linkedin'];
        $perfil->github = $validate['github'];

        $perfil->save();

        return redirect()->route('perfiles.index')->with('success', 'Perfil actualizado correctamente');
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
