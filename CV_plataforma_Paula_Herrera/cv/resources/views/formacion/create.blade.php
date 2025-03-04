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
    <form method="POST" action="{{ route('perfiles.store') }}">
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
