@extends('layouts.app')
@section('content')

<style>
    h1 {
        color: rgb(44, 76, 76);
        font-size: 30px;
        font-weight: bold;
    }
    form {
        width: 50%;
        margin: auto;
    }

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
</style>


<div class="container mx-auto px-4">
<nav class="menu">
        <a href="{{ route('perfiles.index') }}">Perfil</a>
        <a href="{{route('experiencias.index')}}">Experiencia laboral</a>
        <a href="{{route('formaciones.index')}}">Formación académica</a>
        <a href="{{route('habilidades.index')}}">Habilidades</a>
    </nav>
    <form method="POST" action="{{ route('experiencias.store') }}">
        @csrf
        <h1>RELLENA TU EXPERIENCIA</h1>
        <div>
        <select name="usuario_id" id="usuario_id" class="block mt-1 w-full">
                <option value="">Seleccione un usuario</option>
                @foreach($usuarios as $usuario)
                    <option type="text" value="{{$usuario->id}}">{{$usuario->name}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <x-input-label for="empresa">Empresa</x-input-label>
            <input id="empresa" required name="empresa" type="text" class="block mt-1 w-full" />
        </div>
        <div>
            <x-input-label for="tipuestotulo">Puesto</x-input-label>
            <input id="puesto" required name="puesto" type="text" class="block mt-1 w-full" />
        </div>
        <div>
            <x-input-label for="fecha_inicio">Fecha inicio</x-input-label>
            <input id="fecha_inicio" required name="fecha_inicio" type="date" class="block mt-1 w-full" />
        </div>
        <div>
            <x-input-label for="fecha_fin">Fecha fin</x-input-label>
            <input id="fecha_fin" name="fecha_fin" type="date" class="block mt-1 w-full" />
        </div>
        <div>
            <x-input-label for="descripcion">Describe tu actividad</x-input-label>
            <textarea id="descripcion" name="descripcion" type="date" class="block mt-1 w-full"></textarea>
        </div>
        <x-primary-button type="submit">Agregar</x-primary-button>
    </form>
</div>
@endsection
