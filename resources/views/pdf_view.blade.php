<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PERMISO AFOCAT</title>
  <style>
    @page {
                margin: 0px;
                padding: 0px;
            }
    .footer {
        position: fixed;
        bottom: 0px;
        left: 0px;
        right: 0px;
        text-align: center;
    }
      
    body {
      font-family: 'Roboto', sans-serif;
      font-size: 14px;
    }

    body p {
      margin-left: 55px;
      margin-right: 55px;
      padding: 0;
      color: #33373B;
    }
|   img {
      margin-horizontal: auto;
    }
    span {
      font-weight: bold;
      color: #33373B;
    }

    .permiso {
      text-align: center;
      font-size: 16px;
    }
    .respuesta {
      color: #539E61;
    }
    .familiares {
      margin: 0px 0px 0px 55px;
    }
    .familiares span {
      font-weight: bold;
      color: #000;
    }

    .placa {
      margin-top: 10px;
      margin-bottom: 5px;
    }

    .acompanantes {
      margin-top: 20px;
      margin-bottom: 15px;
    }

    .fecha {
      margin-top: 20px;
      margin-bottom: 10px;
      
    }

    .fechaActual {
      text-align: right;
      margin-right: 55px;
    }
    .firma, .ruler {
      text-align : center;
    }
  </style>
</head>
<body>
  <header>
    <div class="header">
      <img src="https://afocatregioncentro.pe/power/wp-admin/images/header2.png" style="width: 793px;">
    </div>
  </header>
  <div class="permiso">
      <span>PERMISO FUERA DE RUTA</span>
      <span>N° 751</span>
  </div>
    <main>
      <div class="placa">
        <p style="margin-bottom: 0px;">Que, el vehículo con CAT vigente con las siguientes características:</p>
        <p style="margin-top: 0px;"><span>PLACA DE RODAJE:</span><span class="respuesta"> {{ $placa }} </span><span>CAT N°</span><span class="respuesta"> {{ $cat }} </span></p>
      </div>
      <div class="destino">
        <p>Se encuentra registrado en el padrón de afiliados de la AFOCAT REGION CENTRO; por lo
            mismo que se le otorga permiso temporal para que circule fuera de ruta establecida;<span> CON
            DESTINO A LA PROVINCIA DE:<span class="respuesta"> {{ $destino }} y VICEVERSA</span>; el día {{ $diaInicio }} del mes {{ $mesInicio}} del año {{ $anioInicio }}; RETORNO el día, {{ $diaFin }} del mes {{ $mesFin }} del año {{ $anioFin }}</span> por motivos FAMILIARES </p>
      </div>
      <div class="acompanantes">
        <span class="respuesta" style="font-weight: bold; margin-left: 55px;">CONDUCTOR: {{ $conductor }} </span>
        @if(is_array($familiares) || is_object($familiares))
            @foreach($familiares as $fam)
            <p class="familiares"><span>ACOMPAÑANTE:</span> {{ $fam }} </p> 
            @endforeach
        @endif 
      </div>

        <div class="ruler">
          <img src="https://afocatregioncentro.pe/power/wp-admin/images/ruler3.png" style="width: 700px;">
        </div>

        <span style="margin-left: 55px;">POR LO QUE LA AFOCAT REGION CENTRO COBERTURA EVENTUALES ACCIDENTES CON
</span><span style="margin-left: 55px;">LESIONES PERSONALES EN CUALQUIER PARTE DEL TERRITORIO NACIONAL.</span>

      <div class="fecha">
        <p>Se solicita, a las autoridades de control de Tránsito y Transporte, brindar las facilidades del
caso. Atentamente;</p>
        <div class="fechaActual"><span>Huancayo, 12 de enero del año 2024</span></div>
      </div>
      <div class="firma">
        <img width="160" height="99" src="data:image/jpg;base64,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">
      </div>
    </main>
    <footer>
      <div class="footer">
        <img src="{{ asset('img/footer.png') }}" alt="footer" style="width: 793px;">
      </div>
    </footer>
</body>
</html>