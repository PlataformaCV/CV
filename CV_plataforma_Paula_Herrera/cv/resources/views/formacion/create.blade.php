@extends('layouts.app')
@section('content')
<style>
    div{
        margin:auto;
        width: auto;
    }
    h1{
        color:purple;
        font-size:40px;
        font-weight:bolde;
    }
    .block{
        font-size:17px;
        font-weight:bold;
        width:auto;
    }
    form{
        width:40%;
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
        <a href="{{ route('perfiles.index') }}">Lista de Perfiles</a>
    </nav>
    <form method="POST" action="{{ route('formaciones.store') }}">
        @csrf
        <h1>RELLENA TU FORMACIóN</h1>
        <div>
            <x-input-label for="nombre">Institución</x-input-label>
            <input id="nombre" required name="nombre" type="text" class="block mt-1 w-full" />
        </div>
        <div>
            <x-input-label for="profesion">Título</x-input-label>
            <input id="profesion" required name="profesion" type="text" class="block mt-1 w-full" />
        </div>
        <div>
            <x-input-label for="telefono">Fecha inicio</x-input-label>
            <input id="telefono" required name="telefono" type="number" class="block mt-1 w-full" />
        </div>
        <div>
            <x-input-label for="email">Fecha fin</x-input-label>
            <input id="email" name="email" type="email" class="block mt-1 w-full" />
        </div>
        <x-primary-button type="submit">Agregar</x-primary-button>
    </form>
@endsection
