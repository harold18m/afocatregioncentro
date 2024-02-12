@extends('layouts.app')

@section('content')
    @include('components.header')
    <main class="contenedor w-11/12 md:w-1/2  my-5 mx-auto py-5 px-10 text-white">
        <?php
        // Leer el contenido del archivo SVG
        $svgContent = file_get_contents(public_path('img/cc-cloud-06.svg'));

        // Codificar el contenido del archivo SVG en base64
        $svgBase64 = base64_encode($svgContent);
        ?>

        <div>
            <img src="data:image/svg+xml;base64,{{ $svgBase64 }}" alt="Consulte su vigencia" class="mx-auto mb-2" />
        </div>
        <h1 class="text-4xl mb-3 font-semibold text-center">Consulte su vigencia</h1>
        <hr class="border-t-2 border-green-500 mb-5 w-1/3 mx-auto" />
        <form id="consultaForm" action="{{ url('/consulta-vigencia') }}" method="GET" class="flex flex-col">
            @csrf
            <!-- <label for="opcion" class="label mb-2 text-center mx-2  ">Seleccione Opción</label> -->
            <select
                name="opcion"
                id="opcion"
                class="mb-4 bg-transparent text-white text-center p-3 border-1 border-white font-semibold"
                required
                hidden
            >
                <option value="1" >Placa</option>
                <option value="2" >Número de CAT</option>
            </select>    
            <label for="placa" class="label mb-2 text-center mx-2">Ingrese Placa</label>
            <input
                type="text"
                id="placa"
                name="placa"
                placeholder="Ej. Placa (V1V123)"  
                class="mb-4 bg-transparent text-white text-center p-3 border-1 border-white-500 font-semibold"
                oninput="this.value = this.value.toUpperCase()"
                required
            />
            @if (session('error'))
                <div class="text-center mb-3 text-red-500 ">
                    {{ session('error') }}
                </div>
            @endif
            <input type="submit" value="Verificar Vigencia" class="submit px-4 py-2 text-white" />
        </form>
    </main>
    <style>
        .submit {
        background-color: #00906f;
        border: 1px solid #00906f;
        border-radius: 5px;
        }
        .submit:hover {
        background-color: #00906f;
        border: 1px solid #00906f;
        }
    </style>
    @include('components.footer')
@endsection