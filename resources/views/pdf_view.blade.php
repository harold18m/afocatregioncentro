<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PERMISO AFOCAT</title>
  <style>
    body {
      font-family: 'Roboto', sans-serif;
      font-size: 15px;
    }

    body p {
      margin: 0;
      padding: 0;
      color: #33373B;
    }

    span {
      font-weight: bold;
      color: #33373B;
    }

    .permiso {
      text-align: center;
      font-size: 20px;
    }
    .respuesta {
      color: #6FAC56;
    }

    .familiares span {
      font-weight: bold;
      color: #000;
    }

    .placa {
      margin-top: 20px;
      margin-bottom: 20px;
    }

    .acompanantes {
      margin-top: 20px;
      margin-bottom: 30px;
    }

    .fecha {
      margin-top: 20px;
      margin-bottom: 10px;
    }

    .fechaActual {
      text-align: right;
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <header>
    <div class="header">
      <img src="{{ asset('img/header.png') }}" alt="logo" style="width: 740px;">
    </div>
  </header>
  <div class="permiso">
      <span>PERMISO FUERA DE RUTA</span>
      <span>N° 751</span>
  </div>
    <main>
      <div class="placa">
        <p>Que, el vehículo con CAT vigente con las siguientes características:</p>
        <p><span>PLACA DE RODAJE:</span><span class="respuesta"> {{ $placa }} </span><span>CAT N°</span><span class="respuesta"> {{ $cat }} </span></p>
      </div>
      <div class="destino">
        <p>Se encuentra registrado en el padrón de afiliados de la AFOCAT REGION CENTRO; por lo
            mismo que se le otorga permiso temporal para que circule fuera de ruta establecida;<span> CON
            DESTINO A LA PROVINCIA DE:<span class="respuesta"> {{ $destino }} y VICEVERSA</span>; el día {{ $diaInicio }} del mes {{ $mesInicio}} del año {{ $anioInicio }}; RETORNO el día, {{ $diaFin }} del mes {{ $mesFin }} del año {{ $anioFin }}</span> por motivos FAMILIARES </p>
      </div>
      <div class="acompanantes">
        <span class="respuesta" style="font-weight: bold;">CONDUCTOR: {{ $conductor }} </span>
        @if(is_array($familiares) || is_object($familiares))
            @foreach($familiares as $fam)
            <p class="familiares"><span>ACOMPAÑANTE:</span> {{ $fam }} </p> 
            @endforeach
        @endif 
      </div>
        <div class="ruler">
          <img src="{{ asset('img/ruler.png') }}" alt="ruler" style="width: 100%; height: 100%;">
      </div>
        <div style="background-image: url('{{ asset('img/ruler.png') }}');">
        </div>
        <span>POR LO QUE LA AFOCAT REGION CENTRO COBERTURA EVENTUALES ACCIDENTES CON
LESIONES PERSONALES EN CUALQUIER PARTE DEL TERRITORIO NACIONAL.</span>

      <div class="fecha">
        <p>Se solicita, a las autoridades de control de Tránsito y Transporte, brindar las facilidades del
caso. Atentamente;</p>
        <div class="fechaActual"><span>Huancayo, 12 de enero del año 2024</span></div>
      </div>
      <div class="firma">
        <img src="{{ asset('img/firma.png') }}" alt="firma" style="width: 100%; height: 100%;">
      </div>
    </main>
    <footer>
      <div class="footer">
        <img src="{{ asset('img/footer.png') }}" alt="logo" style="width: 740px;">
      </div>
    </footer>
</body>
</html>