@extends('layouts.app')
@section('content')

<style>
    .menu{
    background-color: rgb(44, 76, 76);
    color: white;
    text-align:center;
    width: auto;
    padding:20px;
}

.menu a{
    padding:20px;
}
.menu a:hover{
    color: rgb(44, 76, 76);
    background-color: white;
}

table{
    margin:auto;
}
</style>


<div class="container mx-auto px-4">
    <nav class="menu">
        <a href="{{ route('perfiles.show') }}">Mi CV</a>
        <a href="{{route('experiencias.index')}}">Experiencia laboral</a>
        <a href="{{route('formaciones.index')}}">Formación académica</a>
        <a href="{{route('habilidades.index')}}">Habilidades</a>
        <a href="{{route('proyectos.index')}}">Proyectos</a>
        <a href="{{ route('perfiles.index') }}">Perfiles públicos</a>
    </nav>
    <br>  
    <h1 class="text-3xl font-semibold mb-6">Habilidades</h1>

    {{-- Mensajes de éxito --}}
    @if (session('success'))
        <div class="alert alert-success bg-green-200 text-green-800 p-4 mb-4 rounded-md">
            {{ session('success') }}
        </div>
    @endif

<!-- Para agregar un perfil -->
    <a href="{{route('habilidades.create')}}"><x-primary-button>Agregar habilidad</x-primary-button></a>

    {{-- Tabla de experiencia --}}
    <div class="">
        <table class="min-w-full table-auto">
            <thead>
                <tr class="bg-gray-100 text-gray-700">
                    <th class="px-4 py-2 text-left">Nombre</th>
                    <th class="px-4 py-2 text-left">Habilidad</th>
                    <th class="px-4 py-2 text-left">Nivel</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($habilidades as $habilidad)
                    <tr class="border-t">
                            <td class="px-4 py-2">{{$habilidad->usuario->name}}</td>
                        <td class="px-4 py-2">{{ $habilidad->nombre_habilidad }}</td>
                        <td class="px-4 py-2">{{ $habilidad->nivel }}</td>
                        <td class="px-4 py-2">
                            <form action="{{ route('habilidades.destroy', $habilidad->id) }}" method="POST" class="inline" onsubmit="return confirm('¿Estás seguro de eliminar esta habilidad laboral?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Si no hay usuarios --}}
    @if ($habilidades->isEmpty())
        <p class="text-center text-muted">No hay experiencias laborales creados aún en nigún usuario.</p>
    @endif
</div>
@endsection
