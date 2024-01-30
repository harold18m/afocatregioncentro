@extends('layouts.app')

@section('content')
    @include('components.header')
    <main class="contenedor w-1/2 my-5 mx-auto py-5 px-10 text-white">

        @if (is_array($result) && $result['eventoInteger'] == 1)
        <div>
            <img src="{{ asset('img/cc-nike-01-06.svg') }}" alt="" class="mx-auto mb-2" />
        </div>
        <h1 class="text-4xl mb-5 font-bold text-center">Seguridad Activada</h1>
        <hr class="border-t-2 border-green-500 mb-5 w-1/3 mx-auto" />
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap -mx-2">
                <div class="w-1/2 px-2">
                    <div class="form-group">
                        <label for="placa" class="block text-sm font-bold mb-2">Placa:</label>
                        <input type="text" id="placa" class="inputstatic shadow appearance-none border w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline " value="{{ $result['returnObject']['placa'] }}" readonly>
                    </div>
                </div>
                <div class="w-1/2 px-2">
                    <div class="form-group">
                        <label for="cat" class="block  text-sm font-bold mb-2">CAT:</label>
                        <input type="text" id="cat" class="inputstatic shadow appearance-none border w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline " value="{{ $result['returnObject']['ncat'] . '-' . $result['returnObject']['acat']  }}" readonly>
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
                <a href="{{ route('home') }}" class="nosubmit px-4 py-2 mr-5 font-semibold w-1/2 text-center">Regresar</a>
                <button onclick="location.href='{{ route('gestion-permiso') }}'" class="submit px-4 py-2 ml-5 font-semibold text-white w-1/2 text-center" disabled >Generar Permiso</button>
            </div>
           <p> * No se puede generar permisos hasta nuevo aviso. </p>
        @else
            <!-- Placa no encontrada, muestra el mensaje de error -->
            <div>
                <img src="{{ asset('img/cc-whastapp-01-06.svg') }}" alt="Consulte su vigencia" class="mx-auto mb-2" />
            </div>
            <h1 class="text-4xl mb-5 font-bold text-center">Activa tu Seguridad</h1>
            <hr class="border-t-2 border-green-500 mb-5 w-1/3 mx-auto" />
            <p class="text-center m-5">{{ $result['eventoString'] }}</p>
            <div class="text-center my-4 flex justify-around">
                <a href="{{ route('home') }}" class="nosubmit px-4 py-2 mr-5 font-semibold w-1/2 text-center">Nueva Consulta</a>
                <a href="{{ route('home') }}" class="submit px-4 py-2 ml-5 font-semibold text-white w-1/2 text-center">
                    <!-- <span>
                        <img src="{{ asset('img/cc-happy-01-05.svg') }}" alt="" class="" />
                    </span>  -->
                    Comprar CAT Virtual
                </a>
            </div>
        @endif

    </main>
    @include('components.footer')
@endsection