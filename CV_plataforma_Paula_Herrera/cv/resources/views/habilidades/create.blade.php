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
        <a href="{{ route('perfiles.create') }}">Agregar perfil</a>
        <a href="{{route('experiencias.create')}}">Agregar experiencia laboral</a>
        <a href="{{route('formaciones.create')}}">Agregar formación académica</a>
        <a href="{{route('habilidades.create')}}">Agregar habilidades</a>
        <a href="{{ route('perfiles.index') }}">Perfiles</a>
    </nav>
</div>
<form method="POST" action="{{route('habilidades.store')}}">
    <x-input-label for="usuario">Usuario</x-input-label>
    <select name="usuario_id" id="usuario_id" class="block mt-1 w-full">
        @foreach($usuarios as $user)
            <option value="{{$user->usuario_id}}">{{$user->name}}</option>
        @endforeach
    </select>
    <x-input-label for="">Habilidad</x-input-label>
    <input type="text" id="habilidad" class="block mt-1 w-full">
    <x-input-label for="">Nivel</x-input-label>
    <input type="text" id="nivel" class="block mt-1 w-full">
    <x-primary-button type="submit">Agregar</x-primary-button>
</form>
