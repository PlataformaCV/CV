@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Lista de Perfiles</h1>

    {{-- Mensajes de éxito --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Botón para agregar nuevo perfil --}}
    <a href="{{ route('perfiles.create') }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Agregar nuevo CV
    </a>

    {{-- Tabla de Perfiles --}}
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Nombre Completo</th>
                <th>Profesión</th>
                <th>Descripción</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Sitio web</th>
                <th>Linkedin</th>
                <th>Git Hub</th>
                <th>Usuario</th> <!-- Nueva columna para el usuario -->
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($perfiles as $perfil)
                <tr>
                    <td>{{ $perfil->nombre_completo }}</td>
                    <td>{{ $perfil->profesion }}</td>
                    <td>{{ $perfil->descripcion }}</td>
                    <td>{{ $perfil->telefono }}</td>
                    <td>{{ $perfil->email }}</td>
                    <td>{{ $perfil->sitio_web }}</td>
                    <td>{{ $perfil->linkedin }}</td>
                    <td>{{ $perfil->github }}</td>
                    <select name="usuario_id" id="usuario_id" class="form-control">
                        @foreach ($usuarios as $usuario)
                            <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                        @endforeach
                    </select>
                    <td>
                        <!-- Botones para ver, actualizar y eliminar -->
                        <a href="{{ route('perfiles.show', $perfil->id) }}" class="btn btn-info btn-sm mr-2">
                            <i class="fas fa-eye"></i> Ver
                        </a>
                        <a href="{{ route('perfiles.edit', $perfil->id) }}" class="btn btn-warning btn-sm mr-2">
                            <i class="fas fa-edit"></i> Actualizar
                        </a>
                        <form action="{{ route('perfiles.destroy', $perfil->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">
                                <i class="fas fa-trash-alt"></i> Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Si no hay perfiles --}}
    @if ($perfiles->isEmpty())
        <p class="text-center text-muted">No hay perfiles creados aún.</p>
    @endif
</div>
@endsection
