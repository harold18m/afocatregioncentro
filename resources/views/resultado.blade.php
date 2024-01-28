@extends('layouts.app')

@section('content')
    @include('components.header')
    <main class="contenedor w-1/2 my-5 mx-auto py-5 px-10 text-white">

        @if (is_array($result) && $result['eventoInteger'] == 1)

        <h1 class="text-4xl mb-5 font-bold text-center">Seguridad Activada</h1>
        <hr class="border-t-2 border-green-500 mb-5 w-1/3 mx-auto" />
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap -mx-2">
                <div class="w-1/2 px-2">
                    <div class="form-group">
                        <label for="placa" class="block text-sm font-bold mb-2">Placa:</label>
                        <input type="text" id="placa" class="shadow appearance-none border w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-gray-200" value="{{ $result['returnObject']['placa'] }}" readonly>
                    </div>
                </div>
                <div class="w-1/2 px-2">
                    <div class="form-group">
                        <label for="cat" class="block  text-sm font-bold mb-2">CAT:</label>
                        <input type="text" id="cat" class="shadow appearance-none border w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-gray-200" value="{{ $result['returnObject']['ncat'] }}" readonly>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="vigencia_desde" class="block  text-sm font-bold my-2">Vigencia desde:</label>
                <input type="date" id="vigencia_desde" class="shadow appearance-none border border-white border-solid w-full py-2 px-3 text-white leading-tight focus:outline-none focus:shadow-outline bg-transparent" value="{{ DateTime::createFromFormat('d/m/Y', $result['returnObject']['vigenciadesde'])->format('Y-m-d') }}" readonly>
            </div>
            <div class="form-group">
                <label for="vigencia_hasta" class="block  text-sm font-bold my-2">Vigencia hasta:</label>
                <input type="date" id="vigencia_hasta" class="shadow appearance-none border border-white border-solid w-full py-2 px-3 text-white leading-tight focus:outline-none focus:shadow-outline bg-transparent" value="{{ DateTime::createFromFormat('d/m/Y', $result['returnObject']['vigenciahasta'])->format('Y-m-d') }}" readonly>
            </div>
            <div class="form-group">
                <label for="estado" class="block  text-sm font-bold my-2">Estado:</label>
                <input type="text" id="estado" class="shadow appearance-none border border-white border-solid w-full py-2 px-3 text-white leading-tight focus:outline-none focus:shadow-outline bg-transparent" value="Vigente" readonly>
            </div>
            <div class="text-center my-4 flex justify-around">
                <a href="{{ route('home') }}" class="nosubmit px-4 py-2 mr-5 font-semibold text-white w-1/2 text-center">Regresar</a>
                <a href="{{ route('home') }}" class="submit px-4 py-2 ml-5 font-semibold text-white w-1/2 text-center">Generar Permiso</a>
            </div>
        </div>
        @else
            <!-- Placa no encontrada, muestra el mensaje de error -->
            <p class="text-center m-5">{{ $result['eventoString'] }}</p>
            <div class="text-center m-5">
                <a href="{{ route('home') }}" class="submit px-4 py-2 text-white">Nueva consulta</a>
                <a href="{{ route('home') }}" class="submit px-4 py-2 text-white">Comprar CAT Virtual</a>
            </div>
        @endif

    </main>
    <style>
        .nosubmit {
        background-color: transparent;
        border: 1px solid #00906f;
        color : #00906f;
        }
        label {
            font-weight: bold;
            color: #a0aec0;
            margin-left: 5px;
        }
    </style>

    @include('components.footer')
@endsection