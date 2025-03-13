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

.divperfiles{
    width: 70%;
    margin:auto;

}

.centro{
    text-align:center;
}

</style>

<div class="container mx-auto px-4">
    <!-- Menú de navegación -->
    <nav class="menu">
        <a href="{{ route('perfiles.show') }}">Mi CV</a>
        <a href="{{route('experiencias.index')}}">Experiencia laboral</a>
        <a href="{{route('formaciones.index')}}">Formación académica</a>
        <a href="{{route('habilidades.index')}}">Habilidades</a>
        <a href="{{route('proyectos.index')}}">Proyectos</a>
        <a href="{{ route('perfiles.index') }}">Perfiles públicos</a>
    </nav>
    <br>
    <h1 class="text-3xl font-semibold mb-6 centro text-center">Lista de Perfiles</h1>

    {{-- Mensajes de éxito --}}
    @if (session('success'))
        <div class="alert alert-success bg-green-200 text-green-800 p-4 mb-4 rounded-md">
            {{ session('success') }}
        </div>
    @endif

    {{-- Visualización de perfiles --}}
    <div class="divperfiles grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($perfiles as $perfil)
            <div class="bg-white shadow-lg rounded-lg p-4">
                <div class="flex justify-between items-center border-b pb-4 mb-4">
                    <h3 class="text-xl font-semibold centro">{{ $perfil->nombre_completo }}</h3>
                    <span class="text-sm text-gray-500">{{ $perfil->profesion }}</span>
                </div>
                <!-- propiedades del perfil -->
                <div class="mb-4">
                    <strong class="text-gray-700">Profesión:</strong>
                    <p>{{ $perfil->profesion  }}</p>
                </div>
                <div class="mb-4">
                    <strong class="text-gray-700">Descripción:</strong>
                    <p>{{ $perfil->sobre_mi }}</p>
                </div>

                <div class="mb-4">
                    <strong class="text-gray-700">Teléfono:</strong>
                    <p>{{ $perfil->telefono }}</p>
                </div>

                <div class="mb-4">
                    <strong class="text-gray-700">Email:</strong>
                    <p>{{ $perfil->correo_electronico }}</p>
                </div>

                <div class="mb-4">
                    <strong class="text-gray-700">Sitio web:</strong>
                    <p>{{ $perfil->sitio_web }}</p>
                </div>

                <div class="mb-4">
                    <strong class="text-gray-700">Linkedin:</strong>
                    <p>{{ $perfil->linkedin }}</p>
                </div>

                <div class="mb-4">
                    <strong class="text-gray-700">GitHub:</strong>
                    <p>{{ $perfil->github }}</p>
                </div>
                <div class="mb-4">
                    <strong class="text-gray-700">Usuario:</strong>
                    <p>{{ $perfil->usuario ? $perfil->usuario->name : 'No asignado' }}</p>
                </div>
                <hr>
                <br>
                <hr>
                <!-- Formaciones -->
                <div class="bg-white shadow-lg rounded-lg p-4">
                    <div class="mb-4">
                    <!-- <pre>{{ var_dump($perfil->formaciones) }}</pre> -->
                        <strong class="text-gray-700">Formaciones</strong>
                        <br>
                        <br>
                        @forelse($perfil->formaciones as $formacion)
                            <div class="mb-2">
                                <strong class="text-gray-700">Institución:</strong>
                                <p>{{ $formacion->institucion ?? 'No especificado' }}</p>
                                <strong class="text-gray-700">Título:</strong>
                                <p>{{ $formacion->titulo_obtenido ?? 'No especificado' }}</p>
                            </div>
                        @empty
                            <p>No hay formaciones registradas.</p>
                        @endforelse
                    </div>
                </div>
               <br>
               <!-- Habilidades -->
                <div class="bg-white shadow-lg rounded-lg p-4">
                    <div class="mb-4">
                        <strong class="text-gray-700">Habilidades</strong>
                        <br>
                        <br>
                        @forelse($perfil->habilidades as $habilidad)
                            <div class="mb-2">
                                <p>{{ $habilidad->nombre_habilidad ?? 'No especificado' }} - {{ $habilidad->nivel ?? 'No especificado' }}</p>
                            </div>
                        @empty
                            <p>No hay habilidades registradas.</p>
                        @endforelse
                    </div>
                </div>
                <br>
                <!-- Experiencia laboral -->
                <div class="bg-white shadow-lg rounded-lg p-4">
                    <div class="mb-4">
                        <strong class="text-gray-700">Experiencia Laboral</strong>
                        <br>
                        <br>
                        @forelse($perfil->experiencias as $experiencia)
                            <div class="mb-2">
                                <strong class="text-gray-700">Empresa:</strong>
                                <p>{{ $experiencia->empresa ?? 'No especificado' }} ({{ $experiencia->fecha_inicio }} hasta {{ $experiencia->fecha_fin }})</p>
                                <strong class="text-gray-700">Puesto:</strong>
                                <p>{{ $experiencia->puesto }}</p>
                            </div>
                        @empty
                            <p>No hay experiencia laboral registrada.</p>
                        @endforelse
                    </div>
                </div>
                <br>
                <!-- Proyectos -->
                <div class="bg-white shadow-lg rounded-lg p-4">
                    <div class="mb-4">
                        <strong class="text-gray-700">Proyectos</strong>
                        <br>
                        <br>
                        @forelse($perfil->proyectos as $proyecto)
                            <div class="mb-2">
                                <strong class="text-gray-700">Enlace del Proyecto:</strong>
                                <p>{{ $proyecto->enlace_proyecto }}</p>
                            </div>
                        @empty
                            <p>No hay proyectos registrados.</p>
                        @endforelse
                    </div>
                </div>
            </div>
            <br><br>
        @endforeach
    </div>

    {{-- Si no hay perfiles --}}
    @if ($perfiles->isEmpty())
        <p class="text-center text-gray-500">No hay perfiles creados aún.</p>
    @endif
</div>

@endsection
