<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Mail\PermisoFueraRuta;
use Illuminate\Support\Facades\Mail;
class PDFController extends Controller
{
    public function generatePDF(Request $request)
    {
        $options = new \Dompdf\Options();
        $options->set('isRemoteEnabled', true);
        $pdf = new \Dompdf\Dompdf($options);
        $numeroAleatorio = rand(10000, 99999);

        $placa = strtoupper($request->input('placa'));
        $cat = strtoupper($request->input('cat'));
        $destino = strtoupper($request->input('destino'));
        $destinoEspecifico = strtoupper($request->input('destinoEspecifico'));

        if ($destino === 'OTRO') {
            $destino = $destinoEspecifico;
        }

        $destino = mb_strtoupper($destino, 'UTF-8');

        // Obtener la fecha de inicio y procesarla
        $fechaInicio = new \DateTime($request->input('fechaInicio'));
        $diaInicio = $fechaInicio->format('d');
        $mesInicio = $this->getSpanishMonth($fechaInicio->format('n'));
        $mesInicio = strtoupper($mesInicio);
        $anioInicio = $fechaInicio->format('Y');

        // Obtener la fecha de fin y procesarla
        $fechaFin = new \DateTime($request->input('fechaFin'));
        $diaFin = $fechaFin->format('d');
        $mesFin = $this->getSpanishMonth($fechaFin->format('n'));
        $mesFin = strtoupper($mesFin);
        $anioFin = $fechaFin->format('Y');

        setlocale(LC_TIME, 'es_ES.UTF-8');
        $dia = strftime('%d');
        $mes = strftime('%B');
        $anio = strftime('%Y');

        $conductor = mb_strtoupper($request->input('conductor'), 'UTF-8');

        $familiaresInput = $request->input('familiar');

        $familiaresInput = is_array($familiaresInput) ? $familiaresInput : [];

        $familiares = array_map(function($nombre) {
            return mb_strtoupper($nombre, 'UTF-8');
        }, $familiaresInput);

        $data = [
            'placa' => $placa,
            'cat' => $cat,
            'destino' => $destino,
            'diaInicio' => $diaInicio,
            'mesInicio' => $mesInicio,
            'anioInicio' => $anioInicio,
            'diaFin' => $diaFin,
            'mesFin' => $mesFin,
            'anioFin' => $anioFin,
            'conductor' => $conductor,
            'familiares' => $familiares,
            'numeroAleatorio' => $numeroAleatorio,
            'dia' => $dia,
            'mes' => $mes,
            'anio' => $anio
        ];

        // Generar PDF
        $pdf = PDF::loadView('pdf_view', $data);
        Mail::to('tramites@afocatregioncentro.pe')->send(new PermisoFueraRuta($pdf, $numeroAleatorio, $placa, $cat));
        return $pdf->download('PERMISO-AFOCAT.pdf');
    }
    private function getSpanishMonth($monthNumber)
{
    $months = [
        1 => 'enero',
        2 => 'febrero',
        3 => 'marzo',
        4 => 'abril',
        5 => 'mayo',
        6 => 'junio',
        7 => 'julio',
        8 => 'agosto',
        9 => 'septiembre',
        10 => 'octubre',
        11 => 'noviembre',
        12 => 'diciembre',
    ];

    return isset($months[$monthNumber]) ? $months[$monthNumber] : '';
}
}
