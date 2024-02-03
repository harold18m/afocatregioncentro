<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    public function generatePDF(Request $request)
    {
        $options = new \Dompdf\Options();
        $options->set('isRemoteEnabled', true);
        $pdf = new \Dompdf\Dompdf($options);


        $placa = strtoupper($request->input('placa'));
        $cat = strtoupper($request->input('cat'));
        $destino = strtoupper($request->input('destino'));
        $destinoEspecifico = strtoupper($request->input('destinoEspecifico'));

        if ($destino === 'Otro') {
            $destino = $destinoEspecifico;
        }
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

        $conductor = strtoupper($request->input('conductor'));

        // Obtener familiares y convertirlos a mayúsculas
        $familiaresInput = $request->input('familiar');
        $familiares = is_array($familiaresInput) ? array_map('strtoupper', $familiaresInput) : strtoupper($familiaresInput);
        $familiares = isset($_POST['familiares']) ? $_POST['familiares'] : array();
        $familiares = array_pad($familiares, 4, "....................................................");
        // Pasar datos a la vista
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
            'familiares' => $familiares
        ];

        // Generar PDF
        $pdf = PDF::loadView('pdf_view', $data);
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
