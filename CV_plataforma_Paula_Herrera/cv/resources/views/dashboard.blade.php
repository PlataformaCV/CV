<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                   <!-- resources/views/profile/create.blade.php -->
                    <div class="alert alert-info">
                        La vista 'create' se ha cargado correctamente.
                    </div>

                    <!-- Ahora tu formulario -->
                    <div class="container">
                        <h1>Editar CV</h1>

                        <!-- Formulario para cargar el archivo CV -->
                        <form method="POST" enctype="multipart/form-data">
                            @csrf

                            <div>
                                <label for="cv">Cargar CV (PDF, Word, etc.)</label>
                                <input type="file" id="cv" name="cv" accept=".pdf,.doc,.docx" />
                            </div>

                            <button type="submit">Subir CV</button>
                        </form>

                        <!-- Formulario para agregar detalles del CV como texto -->
                        <form method="POST" >
                            @csrf
                            @method('PUT')

                            <div>
                                <label for="experience">Experiencia Laboral</label>
                                <textarea id="experience" name="experience" rows="4"></textarea>
                            </div>

                            <div>
                                <label for="education">Educación</label>
                                <textarea id="education" name="education" rows="4"></textarea>
                            </div>

                            <div>
                                <label for="skills">Habilidades</label>
                                <textarea id="skills" name="skills" rows="4"></textarea>
                            </div>

                            <button type="submit">Actualizar CV</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
