<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    public function generatePDF(Request $request)
    {
        $data = [
            'placa' => $request->input('placa'),
            'cat' => $request->input('cat'),
            'destino' => $request->input('destino'),
            'fechaInicio' => $request->input('fechaInicio'),
            'fechaFin' => $request->input('fechaFin'),
            'conductor' => $request->input('conductor'),
            'familiar' => $request->input('familiar')
        ];

        $pdf = PDF::loadView('pdf_view', $data);

        return $pdf->download('permiso-afocat.pdf');
    }
}