@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Perfil</h1>
    
    <!-- Formulario para editar datos del usuario -->
    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Nombre</label>
            <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required />
        </div>

        <div>
            <label for="email">Correo electrónico</label>
            <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required />
        </div>

        <button type="submit">Actualizar Perfil</button>
    </form>

    <!-- Enlace a la página de edición del CV -->
    <a href="{{ route('profile.cv') }}">Editar CV</a>
</div>
@endsection