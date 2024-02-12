<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SOAT</title>
    <style>
            @page {
                margin: 10px;
                padding: 10px;
            }
            body {
                font-family: 'Roboto', sans-serif;
                font-size: 14px;
                }
            p {
                margin: 4px;
                color: black;
                font-weight: semi-bold;
            }
            hr{
                border: 1px solid #A3AAB6;
            }
            span {
                color: #4B2775;
                font-weight: bold;
                margin-left: 3px;
                font-size: 16px;
            }
    </style>
</head>
<body>    
    <table style="width: 100%;">
        <tr>
            <td style="width: 50%;">
                <img src="https://afocatregioncentro.pe/power/wp-admin/images/logo_ministerio.png" style="width: 200px;">
                <p> Certificado Electrónico <br>
                Decreto Supremo 015 - 2016 MTC </p>
            </td>
            <td style="width: 50%;">
                <img src="https://afocatregioncentro.pe/power/wp-admin/images/logo_afocat.png" style="width: 300px;">
            </td>
        </tr>
    </table>
    <hr>
    <table style="width: 100%;">
        <tr>
            <td style="width: 50%;">
                <p> COMPAÑÍA DE SEGUROS </p>
                <span> AFOCAT REGIÓN CENTRO</span>
            </td>
            <td style="width: 50%;">
                <p> EN CASO DE EMERGENCIAS </p>
                <span style="font-size: 30px; text-align: center ;"> 999 991 918 </span>
            </td>
        </tr>
    </table>
    <span style="font-size: 20px;"> \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\</span>
    <table style="width: 100%;">
        <tr>
            <td style="width: 50%;">
                <p> VIGENCIA DE CAT </p>
                <p> Nº CAT - Certificado</p>
                <span> {{ $cat }} </span>
            </td>
            <td style="width: 50%;">
                <p> CERTIFICADO CAT DE  
                    CONTROL POLICIAL </p>
            </td>
        </tr>
    </table>
    <table style="width: 100%;">
        <tr>
            <td style="width: 50%;">
                <p> Desde </p>
                <span> {{ $vigenciadesde }} </span>
                <p> Hasta </p>
                <span> {{ $vigenciahasta }} </span>
            </td>
            <td style="width: 25%; border-right: 1px solid black;">
                <p> Desde </p>
                <span> {{ $vigenciadesde }} </span>
                <p> Hasta </p>
                <span> {{ $vigenciahasta }} </span>
            </td>
            <td style="width: 25%; padding: 15px;">
                <p> Vigencia de uso exclusivo para control policial </p>
            </td>
        </tr>
    </table>
    <hr>
    <table style="width: 100%;">
        <tr>
            <td style="width: 50%;">
                <p> VEHÍCULO ASEGURADO </p>
                <p> Placa </p>
                <span> {{ $placa }} </span>
                <p> Categoría / Clase </p>
                <span> {{ $nombresubclase }} </span>
                <p> Uso </p>
                <span> {{ $nombreuso }} </span>
                <p> Vin / Nº de serie </p>
                <span> {{ $motorserie }} </span>
            </td>
            <td style="width: 50%;">
                <p> CONTRATANTE / ASEGURADO </p>
                <span> {{ $cliente }} </span>
                <p> Importe de la prima </p>
                <span> </span>
                <p> Fecha </p>
                <span> {{ $fechasistema }} </span>
                <p> Hora de emisión </p>
                <span> {{ $hora }} </span>
            </td>
        </tr>
    </table>
    <p style="padding:5px;">Los establecimientos de salud públicos y privados están obligados
a prestar atención médico quirúrgica de emergencia en caso de laocurrencia de un accidente de tránsito conforme en la Ley Nº 26842, Ley General de Salud y su Reglamento.
    </p>
    <p style="background-color: #4B2775; color: white; padding:5px; border-radius:10px;">
        La información sobre las obligaciones derechos del
contratante/asegurado, coberturas, exclusiones, las podrás encontraringresando a www.apeseg.org.pe/soat o solicitando tu cartilla
informativa en las oficinas de tu compañía de seguros.
    </p>
</body>
</html>