@extends('layouts.app')

@section('content')
    @include('components.header')
    <main class="contenedor w-1/2 my-5 mx-auto py-5 px-10 text-white">
        <h1 class="text-4xl mb-5 font-bold text-center">Resultados de la Consulta</h1>
        <hr class="border-t-2 border-green-500 mb-5 w-1/3 mx-auto" />

        @if ($result['eventoInteger'] == 1)
            <!-- Placa encontrada, muestra los detalles -->
            <h2>Detalles del Vehículo</h2>
            <ul>
                <li>Placa: {{ $result['returnObject']['placa'] }}</li>
                <li>CAT: {{ $result['returnObject']['ncat'] }}</li>
                <li>Vigencia desde: {{ $result['returnObject']['vigenciadesde'] }}</li>
                <li>Vigencia hasta: {{ $result['returnObject']['vigenciahasta'] }}</li>
                <li>Estado: {{ $result['returnObject']['control'] }}</li>
                <div class="text-center">
                    <a href="{{ route('home') }}" class="submit px-4 py-2 text-white">Nueva consulta</a>
                    <a href="{{ route('home') }}" class="submit px-4 py-2 text-white">Comprar CAT Virtual</a>
                </div>
                <!-- Agrega más detalles según tu necesidad -->
            </ul>
        @else
            <!-- Placa no encontrada, muestra el mensaje de error -->
            <p class="text-center m-5">{{ $result['eventoString'] }}</p>
            <div class="text-center">
                <a href="{{ route('home') }}" class="submit px-4 py-2 text-white">Nueva consulta</a>
                <a href="{{ route('home') }}" class="submit px-4 py-2 text-white">Comprar CAT Virtual</a>
            </div>
        @endif

    </main>
    @include('components.footer')
@endsection
