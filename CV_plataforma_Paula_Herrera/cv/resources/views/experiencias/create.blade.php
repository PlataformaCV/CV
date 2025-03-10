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
    <form action="">
        
    </form>
</div>