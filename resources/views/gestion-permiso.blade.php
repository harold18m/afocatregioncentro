@extends('layouts.app')

@section('content')
    @include('components.header')
    <main class="contenedor w-1/2 my-5 mx-auto py-5 px-10 text-white">
    <div>
        <img src="{{ asset('img/cc-map-01-06.svg') }}" alt="Consulte su vigencia" class="mx-auto mb-2" />
    </div>
    <h1 class="text-4xl mb-5 font-bold text-center">Gestión Permiso</h1>
        <hr class="border-t-2 border-green-500 mb-5 w-1/3 mx-auto" />
        <form action="{{ route('generatePDF') }}" method="post">
            @csrf
            <div class="container mx-auto px-4">
                <div class="flex flex-wrap -mx-2">
                    <div class="w-1/2 px-2">
                        <div class="form-group">
                            <label for="placa" class="block text-sm font-bold mb-2">Placa:</label>
                            <input type="text" id="placa" name="placa" class="inputstatic shadow appearance-none border w-full py-2 px-3 leading-tight" value="{{ session('placa') }}" readonly>
                        </div>
                    </div>
                    <div class="w-1/2 px-2">
                        <div class="form-group">
                            <label for="cat" class="block  text-sm font-bold mb-2">CAT:</label>
                            <input type="text" id="cat" name="cat" class="inputstatic shadow appearance-none border w-full py-2 px-3 leading-tight" value="{{ session('cat') }}" readonly>
                        </div>
                    </div>
                </div>
                <div>
                    <label for="destino" class="block text-sm font-bold my-2">Selecciona un Destino:</label>
                    <select name="destino" id="destino" name="destino" class="shadow appearance-none border border-white border-solid w-full py-2 px-3 text-white leading-tight focus:outline-none focus:shadow-outline bg-transparent">
                        <option value="1">Huancayo</option>
                        <option value="2">Chupaca</option>
                        <option value="3">Chilca</option>
                        <option value="4">El Tambo</option>
                        <option value="5">San Agustín de Cajas</option>
                        <option value="6">San Jerónimo de Tunán</option>
                        <option value="7">San Pedro de Saño</option>
                        <option value="8">Santo Domingo de Acobamba</option>
                        <option value="9">Sapallanga</option>
                        <option value="10">Sicaya</option>
                        <option value="11">Viques</option>
                        <option value="12">Otro</option>
                    </select>
                </div>
                <div class="flex flex-wrap -mx-2">
                    <div class="w-1/2 px-2">
                        <div class="form-group">
                            <label for="fechaInicio" class="block text-sm font-bold mb-2">Fecha de inicio:</label>
                            <input type="date" id="fechaInicio" name="fechaInicio" class="inputstatic shadow appearance-none border w-full py-2 px-3 text-white leading-tight focus:outline-none focus:shadow-outline bg-transparent border-white" value="{{ date('Y-m-d') }}">
                        </div>
                    </div>
                    <div class="w-1/2 px-2">
                        <div class="form-group">
                            <label for="fechaFin" class="block  text-sm font-bold mb-2">Fecha de fin:</label>
                            <input type="date" id="fechaFin" name="fechaFin" class="inputstatic shadow appearance-none border w-full py-2 px-3 text-white leading-tight focus:outline-none focus:shadow-outline bg-transparent border-white" value="{{ date('Y-m-d', strtotime('+1 month')) }}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="conductor" class="block  text-sm font-bold my-2">Conductor:</label>
                    <input type="text" id="conductor" name="conductor" class="shadow appearance-none border border-white border-solid w-full py-2 px-3 text-white leading-tight focus:outline-none focus:shadow-outline bg-transparent">
                </div>
                <div id="familiares">
                </div>
                <div class="text-center my-4 flex justify-around">
                    <button id="addFamiliar" class="nosubmit px-4 py-2 mr-5 font-semibold w-1/2 text-center">Añadir Acompañante</button>
                    <button type="submit" class="submit px-4 py-2 ml-5 font-semibold text-white w-1/2 text-center">Generar Permiso</button>
                </div>

        </form>
        <script>
            $(document).ready(function() {
                let i = 0;
                $('#addFamiliar').click(function(e) {
                    e.preventDefault();
                    $('#familiares').append('<div class="form-group"><label for="conductor" class="block  text-sm font-bold my-2">Familiar / Acompañante:</label><input type="text" id="familiar' + i + '" name="familiar[]" class="shadow appearance-none border border-white border-solid w-full py-2 px-3 text-white leading-tight focus:outline-none focus:shadow-outline bg-transparent"></div>');
                    i++;
                });
            });
        </script>
    </main>
    <style>
       

       </style>
    @include('components.footer')
@endsection