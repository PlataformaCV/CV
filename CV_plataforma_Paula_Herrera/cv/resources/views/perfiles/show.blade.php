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
    <a href="{{ route('perfiles.index') }}">Mi CV</a>
        <a href="{{route('experiencias.index')}}">Experiencia laboral</a>
        <a href="{{route('formaciones.index')}}">Formación académica</a>
        <a href="{{route('habilidades.index')}}">Habilidades</a>
        <a href="{{route('proyectos.index')}}">Proyectos</a>
        <a href="{{ route('perfiles.index') }}">Perfiles públicos</a>
    </nav>
    <br>
    <h1 class="text-3xl font-semibold mb-6 centro text-center">MI CV</h1>

    {{-- Mensajes de éxito --}}
    @if (session('success'))
        <div class="alert alert-success bg-green-200 text-green-800 p-4 mb-4 rounded-md">
            {{ session('success') }}
        </div>
    @endif

    <!-- Botón para agregar un perfil -->
    <div class="text-center centro mb-6">
        <a href="{{ route('perfiles.create') }}">
            <x-primary-button class="bg-blue-500 hover:bg-blue-600">Agregar un nuevo CV</x-primary-button>
        </a>
    </div>
<!-- perfil -->
    <div class="divperfiles grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
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
                <!-- buscar fiormaciones a partir de la tabla perfiles, usando forelse, con esto no se usa if , seusa empty, cosa que en el foreach si -->
                <div class="bg-white shadow-lg rounded-lg p-4">
                    <div class="mb-4">
                        <strong class="text-gray-700">FORMACIONES</strong>
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
               <!-- Usando for each  -->
                <div class="bg-white shadow-lg rounded-lg p-4">
                    <div class="mb-4">
                        <strong class="text-gray-700">HABILIDADES</strong>
                        <br>
                        <br>
                        @foreach($perfil->habilidades as $habilidad)
                                <div class="mb-2">
                                    <p>{{ $habilidad->nombre_habilidad ?? 'No especificado' }} - {{ $habilidad->nivel ?? 'No especificado' }}</p>
                                </div>
                            @if($perfil->habilidades->isEmpty())
                                <p>No hay habilidades registradas.</p>
                            @endif
                        @endforeach
                    </div>
                </div>
                <br>
                <div class="bg-white shadow-lg rounded-lg p-4">
                    <div class="mb-4">
                        <strong class="text-gray-700">EXPERIENCIA LABORAL</strong>
                        <br>
                        <br>
                        @foreach($perfil->experiencias as $experiencia)
                                <div class="mb-2">
                                    <strong class="text-gray-700">Empresa:</strong>
                                    <p>{{ $experiencia->empresa ?? 'No especificado' }}      ({{$experiencia->fecha_inicio}} hasta {{$experiencia->fecha_fin}})</p>
                                    <strong class="text-gray-700">Puesto:</strong>
                                    <p>{{$experiencia->puesto }}</p>
                                </div>
                            @if($perfil->experiencias->isEmpty())
                                <p>No hay experiencia laboral aún.</p>
                            @endif
                        @endforeach
                    </div>
                </div>
                <br>
                <div class="bg-white shadow-lg rounded-lg p-4">
                    <div class="mb-4">
                        <strong class="text-gray-700">PROYECTOS</strong>
                        <br>
                        <br>
                        @foreach($perfil->proyectos as $proyecto)
                                <div class="mb-2">
                                    <strong class="text-gray-700">{{$proyecto->enlace_proyecto}}</strong>
                                    <br>
                                </div>
                            @if($perfil->proyectos->isEmpty())
                                <p>No hay proyectos aún.</p>
                            @endif
                        @endforeach
                    </div>
                </div>

                <!-- Acciones -->
                <div class="flex justify-between items-center mt-4">
                    <a href="{{ route('perfiles.edit', $perfil->id) }}" class="bg-blue-500 hover:bg-blue-600"><x-primary-button >Actualizar</x-primary-button ></a>
                    <form action="{{ route('perfiles.destroy', $perfil->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este perfil?')" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline"><x-primary-button >Eliminar</x-primary-button ></button>
                    </form>
                </div>
            </div>
            <br><br>
    </div>
    {{-- Si no hay perfiles --}}
    @if ($perfiles->isEmpty())
        <p class="text-center text-gray-500">No hay perfil creados aún.</p>
    @endif
</div>

@endsection
