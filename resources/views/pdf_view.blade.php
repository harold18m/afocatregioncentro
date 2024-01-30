<!DOCTYPE html>
<html>
<head>
    <title>Permiso</title>
    <style>
    </style>
</head>
<body>
    <h1>Permiso</h1>
    <p>Placa: {{ $placa }}</p>
    <p>CAT: {{ $cat }}</p>
    <p>Destino: {{ $destino }}</p>
    <p>Fecha de inicio: {{ $fechaInicio }}</p>
    <p>Fecha de fin: {{ $fechaFin }}</p>
    <p>Conductor: {{ $conductor }}</p>
    <p>Familiar / Acompañante:</p>
    <ul>
        @foreach($familiar as $fam)
            <li>{{ $fam }}</li>
        @endforeach
    </ul>
</body>
</html>