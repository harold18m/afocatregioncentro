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
      margin-bottom: 0px;
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
    .destino {
      margin-top: 0px;
      margin-bottom: 0px;
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
      margin-top: 0px;
      margin-bottom: 0px;
    }
    .ruler {
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
          <img src="https://afocatregioncentro.pe/power/wp-admin/images/ruler3.png" style="width: 710px;">
        </div>

        <span style="margin-left: 55px;">POR LO QUE LA AFOCAT REGION CENTRO COBERTURA EVENTUALES ACCIDENTES CON
</span><span style="margin-left: 55px;">LESIONES PERSONALES EN CUALQUIER PARTE DEL TERRITORIO NACIONAL.</span>

      <div class="fecha">
        <p>Se solicita, a las autoridades de control de Tránsito y Transporte, brindar las facilidades del
caso. Atentamente;</p>
        <div class="fechaActual"><span>Huancayo, 12 de enero del año 2024</span></div>
      </div>
    </main>
    <footer>
      <div class="footer">
        <img width="200" height="140" src="https://afocatregioncentro.pe/power/wp-admin/images/firma.png">
        <img src="https://afocatregioncentro.pe/power/wp-admin/images/footer.png" alt="footer" style="width: 793px;">
      </div>
    </footer>
</body>
</html>