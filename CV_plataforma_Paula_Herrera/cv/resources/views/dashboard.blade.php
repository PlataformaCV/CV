<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bienvenida/o') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}

                    <!-- Enlace para ver la lista de perfiles -->
                    <a href="{{ route('perfiles.index') }}" class="text-blue-600 hover:underline">
                        Ver Perfiles
                    </a>
                </div>
            </div>       
        </div>
    </div>
</x-app-layout>
