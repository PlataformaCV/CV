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
        <a href="{{ route('perfiles.show') }}">Mi CV</a>
        <a href="{{route('experiencias.index')}}">Experiencia laboral</a>
        <a href="{{route('formaciones.index')}}">Formación académica</a>
        <a href="{{route('habilidades.index')}}">Habilidades</a>
        <a href="{{route('proyectos.index')}}">Proyectos</a>
        <a href="{{ route('perfiles.index') }}">Perfiles públicos</a>
    </nav>
</div>
<form method="POST" action="{{route('proyectos.store')}}">
    @csrf
    <x-input-label for="usuario">Usuario</x-input-label>
    <select name="usuario_id" id="usuario_id" class="block mt-1 w-full">
        @foreach($usuarios as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
    </select>
    <x-input-label for="titulo">Titulo</x-input-label>
    <input id="titulo" required name="titulo" type="text" class="block mt-1 w-full" />
    <div>
    <x-input-label for="descripcion">Descripción</x-input-label>
    <input id="descripcion" required name="descripcion" type="text" class="block mt-1 w-full" />
    </div>
    <div>
    <x-input-label for="enlace_proyecto">Enlace de tu proyecto</x-input-label>
    <input id="enlace_proyecto" required name="enlace_proyecto" type="url" class="block mt-1 w-full" />
    </div>
    <x-primary-button type="submit">Agregar</x-primary-button>
</form>

@endsection