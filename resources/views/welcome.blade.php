@extends('layouts.app')
@section('content')
    @include('components.header')
    <main class="contenedor w-1/2 my-5 mx-auto py-5 px-10 text-white">
        <h1 class="text-4xl mb-5 font-bold text-center">Consulte su vigencia</h1>
        <hr class="border-t-2 border-green-500 mb-5 w-1/3 mx-auto" />
        <form id="consultaForm" action="{{ url('/consultar-vigencia') }}" method="GET" class="flex flex-col">
        <label for="placa" class="label mb-2 text-center mx-2 font-bold">Ingrese Placa</label>
        <input
            type="text"
            id="placa"
            name="placa"
            placeholder="Ej.(V1V123)"
            class="mb-4 bg-transparent text-white text-center p-3 border-1 border-white-500 font-semibold"
            oninput="this.value = this.value.toUpperCase()"
            required
        />
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