@extends('layouts.app')

@section('content')
    @include('components.header')
    <main class="contenedor w-11/12 md:w-1/2  my-5 mx-auto py-5 px-10 text-white">
    <?php
        // Leer el contenido del archivo SVG
        $svgContent9 = file_get_contents(public_path('img/cc-map-01-06.svg'));

        // Codificar el contenido del archivo SVG en base64
        $mapa = base64_encode($svgContent9);
        ?>
    <div>
        <img src="data:image/svg+xml;base64,{{ $mapa }}" alt="Consulte su vigencia" class="mx-auto" />
    </div>
    <h1 class="text-4xl mb-3 font-bold text-center">Gestión Permiso</h1>
    <hr class="border-t-2 border-green-500 mb-5 w-1/3 mx-auto" />
        <form action="{{ route('generatePDF') }}" method="post">
            @csrf
            <div class="container mx-auto px-4">
                <div class="flex flex-wrap -mx-2">
                    <div class="w-full md:w-1/2 px-2">
                        <div class="form-group">
                            <label for="placa" class="block text-sm">Placa:</label>
                            <input type="text" id="placa" name="placa" class="inputstatic shadow appearance-none border w-full py-2 px-3 leading-tight" value="{{ session('placa') }}" readonly>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 px-2">
                        <div class="form-group">
                            <label for="cat" class="block  text-sm">CAT:</label>
                            <input type="text" id="cat" name="cat" class="inputstatic shadow appearance-none border w-full py-2 px-3 leading-tight" value="{{ session('cat') }}" readonly>
                        </div>
                    </div>
                </div>
                <div>
                    <label for="destino" class="block text-sm ">Selecciona un Destino:</label>
                    <div class="select-container relative">
                        <select name="destino" id="destino" class="shadow appearance-none border border-solid w-full py-2 px-3 text-white leading-tight focus:outline-none focus:shadow-outline bg-transparent pr-10">
                            <option value="Huancayo">Huancayo</option>
                            <option value="Concepción">Concepción</option>
                            <option value="Chanchamayo">Chanchamayo</option>
                            <option value="Jauja">Jauja</option>
                            <option value="Junín">Junín</option>
                            <option value="Satipo">Satipo</option>
                            <option value="Tarma">Tarma</option>
                            <option value="Yauli">Yauli</option>
                            <option value="Chupaca">Chupaca</option>
                            <option value="Otro">Otro</option>
                        </select>
                        <i class="fas fa-chevron-down absolute right-0 mr-2 cursor-pointer select-icon"></i>
                    </div>
                    <div id="otroDestino" class="mt-4" style="display: none;">
                        <label for="destinoEspecifico" class="block text-sm ">Nuevo destino:</label>
                        <input type="text" id="destinoEspecifico" name="destinoEspecifico" class="shadow appearance-none border   border-solid w-full py-2 px-3 text-white leading-tight focus:outline-none focus:shadow-outline bg-transparent">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-2">
                    <div   div class="w-full md:w-1/2 px-2">
                        <div class="form-group">
                            <label for="fechaInicio" class="block text-sm ">Fecha de inicio:</label>
                            <input type="date" id="fechaInicio" name="fechaInicio" class="shadow appearance-none border w-full py-2 px-3 text-white leading-tight focus:outline-none focus:shadow-outline bg-transparent" value="{{ date('Y-m-d') }}" min="{{ date('Y-m-d') }}"  required>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2 px-2">
                        <div class="form-group">
                            <label for="fechaFin" class="block  text-sm ">Fecha de fin:</label>
                            <input type="date" id="fechaFin" name="fechaFin" class="shadow appearance-none border w-full py-2 px-3 text-white leading-tight focus:outline-none focus:shadow-outline bg-transparent  " value=""  required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="conductor" class="block  text-sm ">Conductor:</label>
                    <input type="text" id="conductor" name="conductor" class="shadow appearance-none border   border-solid w-full py-2 px-3 text-white leading-tight focus:outline-none focus:shadow-outline bg-transparent"  required>
                </div>
                <!-- familiares o acompañantes -->
                <div id="familiares">

                </div>

                <div class="text-center my-4 flex flex-col md:flex-row justify-around">
                    <button id="addFamiliar" class="nosubmit px-4 py-2 mb-2 md:mb-0 md:mr-5 w-full md:w-1/2 text-center">Añadir Acompañante</button>
                    <button type="submit" class="submit-button px-4 py-2 text-white w-full md:w-1/2 text-center">Generar Permiso</button>
                </div>
        </form>
        <script>
            $(document).ready(function() {
                let i = 0;
                $('#addFamiliar').click(function(e) {
                    e.preventDefault();
                    if (i >= 4) {
                        alert('No puedes agregar más de 4 familiares');
                        return;
                    }
                    i++;
                    $('#familiares').append('<div class="form-group relative"><label for=id="familiar' + i + '" class="block text-sm">Familiar / Acompañante:</label><input type="text" id="familiar' + i + '" name="familiar[]" class="shadow appearance-none border border-solid w-full py-2 px-3 text-white leading-tight focus:outline-none focus:shadow-outline bg-transparent pr-10"><span class="removeFamiliar absolute right-2 top-4 mt-3 mr-2 cursor-pointer"><i class="fas fa-times text-red-500"></i></span></input>');
                });

                // Cuando se hace clic en el botón de eliminar
                $('#familiares').on('click', '.removeFamiliar', function(e) {
                    e.preventDefault();
                    $(this).parent().remove();
                    i--;
                });
            });

            document.getElementById('destino').addEventListener('change', function() {
                var otroDestino = document.getElementById('otroDestino');
                if (this.value === 'Otro') {
                    otroDestino.style.display = 'block';
                } else {
                    otroDestino.style.display = 'none';
                }
            });

            document.getElementById('fechaInicio').addEventListener('change', function() {
                document.getElementById('fechaFin').min = this.value;
            });

            document.getElementById('fechaFin').addEventListener('change', function() {
                var fechaInicio = new Date(document.getElementById('fechaInicio').value);
                var fechaFin = new Date(this.value);

                if (fechaFin < fechaInicio) {
                    alert('La fecha de fin no puede ser anterior a la fecha de inicio');
                    this.value = '';
                }
            });

            document.getElementById('formPermiso').addEventListener('submit', function(e) {
                var fechaInicio = new Date(document.getElementById('fechaInicio').value);
                var fechaFin = new Date(document.getElementById('fechaFin').value);
                var conductor = document.getElementById('conductor').value;
                var familiares = document.getElementsByName('familiar[]');

                if (fechaFin < fechaInicio) {
                    alert('La fecha de fin no puede ser anterior a la fecha de inicio');
                    e.preventDefault();
                    return;
                }

                if (conductor.trim() === '') {
                    alert('El campo conductor no puede estar vacío');
                    e.preventDefault();
                    return;
                }
            });
        </script>
    </main>
    <style>
    .submit-button {
        color: white;
        background-color: #00906f;
        border: none;
        border-radius: 2px;
    }

    .custom-button {
        color: white;
        background-color: blue;
        border: none;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
    }
    .select-container {
        position: relative;
    }
    .select-icon {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        transition: transform 0.3s ease;
    }

    .select-icon.rotated {
        transform: translateY(-50%) rotate(180deg);
    }
    </style>
    @include('components.footer')
@endsection