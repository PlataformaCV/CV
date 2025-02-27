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
</style>
    <form method="POST" action="">
        @csrf
        <h1>RELLENA TU CV</h1>
        <div>
            <x-input-label for="nombre">Nombre completo</x-input-label>
            <input id="nombre" required name="nombre" type="text" class="block mt-1 w-full" />
        </div>
        <div>
            <x-input-label for="profesion">Profesión</x-input-label>
            <input id="profesion" required name="profesion" type="text" class="block mt-1 w-full" />
        </div>
        <div>
            <x-input-label for="descripcion">Descripción</x-input-label>
            <textarea id="descripcion" required name="descripcion" class="block mt-1 w-full" rows="4"></textarea>
        </div>
        <div>
            <x-input-label for="telefono">Teléfono</x-input-label>
            <input id="telefono" required name="telefono" type="number" class="block mt-1 w-full" />
        </div>
        <div>
            <x-input-label for="email">Email</x-input-label>
            <input id="email" required name="email" type="email" class="block mt-1 w-full" />
        </div>
        <div>
            <x-input-label for="web">Sitio web</x-input-label>
            <input id="web" required name="web" type="url" class="block mt-1 w-full" />
        </div>
        <div>
            <x-input-label for="linkedin">Linkedin</x-input-label>
            <input id="linkedin" required name="linkedin" type="url" class="block mt-1 w-full" />
        </div>
        <div>
            <x-input-label for="github">GitHub</x-input-label>
            <input id="github" required name="github" type="url" class="block mt-1 w-full" />
        </div>
        <x-primary-button type="submit">Agregar</x-primary-button>
    </form>


@endsection
