@extends('layouts.app')
@section('content')
<style>
    div{
        margin:auto;
        width: auto;
    }
    h1{
        color:rgb(44, 76, 76);
        font-size:30px;
        font-weight:bolde;
    }
    form{
        width:30%;
       margin:auto;
    }
    button{
        margin-left:405;
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
        <a href="{{route('proyectos.index')}}">Proyectos</a>
    </nav>

    <form method="POST" action="{{ route('formaciones.store') }}">
        @csrf
        <h1>RELLENA TU FORMACIÓN</h1>
        <div>
        <select name="usuario_id" id="usuario_id" class="block mt-1 w-full">
                <option value="">Seleccione un usuario</option>
                @foreach($usuarios as $usuario)
                    <option type="text" value="{{$usuario->id}}">{{$usuario->name}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <x-input-label for="institucion">Institución</x-input-label>
            <input id="institucion" required name="institucion" type="text" class="block mt-1 w-full" />
        </div>
        <div>
            <x-input-label for="titulo">Título</x-input-label>
            <input id="titulo_obtenido" required name="titulo_obtenido" type="text" class="block mt-1 w-full" />
        </div>
        <div>
            <x-input-label for="fecha_inicio">Fecha inicio</x-input-label>
            <input id="fecha_inicio" required name="fecha_inicio" type="date" class="block mt-1 w-full" />
        </div>
        <div>
            <x-input-label for="fecha_fin">Fecha fin</x-input-label>
            <input id="fecha_fin" name="fecha_fin" type="date" class="block mt-1 w-full" />
        </div>
        <x-primary-button type="submit">Agregar</x-primary-button>
    </form>
@endsection
