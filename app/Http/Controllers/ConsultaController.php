<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PDF;


class ConsultaController extends Controller
{
    public function index()
    {
        return view('consulta.index');
    }

    public function consultarVigencia(Request $request)
    {
        // $opcion = $request->input('opcion');
        $placa = $request->input('placa');
        $opcion = "1"; // "1" para "Consultar por placa" y "2" para "Consultar por CAT

        if (empty($placa)) {
            return redirect()->route('home');
        }

        try {
            if ($opcion == "1") {
                $placa = str_replace('-', '', $placa);
                $response = Http::get("https://intranet.afocatregioncentro.pe:843/SistemaPrimeAfocat.WService/afiliacion/getplaca/{$placa}");
            } elseif ($opcion == "2") {
                $placa = str_replace(' ', '-', $placa);
                $response = Http::get("https://intranet.afocatregioncentro.pe:843/SistemaPrimeAfocat.WService/afiliacion/getcatcomplete/{$placa}");
            } else {
                return redirect()->route('home')->with('error', 'Opción inválida seleccionada');
            }
        } catch (\Exception $e) {
            return redirect()->route('home')->with('error', 'Hubo un problema al intentar conectar con el servidor. Por favor, inténtalo de nuevo más tarde.');
        }

        $result = $response->json();
        if (isset($result['returnObject'])) {
            if ($result['returnObject']['placa'] == 'ANULADO') {
                return redirect()->route('home')->with('error', 'La placa está anulada');
            }
        
            session(['placa' => $result['returnObject']['placa']]);
            session(['cat' => $result['returnObject']['ncat'] . '-' . $result['returnObject']['acat']]);
        }

        return view('consulta.resultado', ['result' => $result]);
    }

    public function imprimirSoat()
    {
        $options = new \Dompdf\Options();
        $options->set('isRemoteEnabled', true);
        $pdf = new \Dompdf\Dompdf($options);

        $placa = session('placa');
        $cat = session('cat');

        if ($placa == null || $cat == null) {
            return redirect()->route('consulta.index');
        }

        try {
            $placa = str_replace('-', '', $placa);
            $response = Http::get("https://intranet.afocatregioncentro.pe:843/SistemaPrimeAfocat.WService/afiliacion/getplaca/{$placa}");
        } catch (\Exception $e) {
            return redirect()->route('consulta.index')->with('error', 'Hubo un problema al intentar conectar con el servidor. Por favor, inténtalo de nuevo más tarde.');
        }
    
        $result = $response->json();
        $data = $result['returnObject'];
        $placa = $data['placa'];
        $cliente = $data['razon'];
        $direccion = $data['direccion'];
        $categoria = $data['nombreClase'];
        $numeroDeSerie = $data['motorserie'];
        $vigenciadesde = $data['vigenciadesde'];
        $vigenciahasta = $data['vigenciahasta'];
        $fechasistema = $data['fechasistema'];
        $nombresubclase = $data['nombreSubclase'];
        $motorserie = $data['motorserie'];
        $nombreuso = $data['nombreUso'];
        $hora = date('H:i');
        $data = [
            'placa' => $placa,
            'cat' => $cat,
            'cliente' => $cliente,
            'direccion' => $direccion,
            'categoria' => $categoria,
            'numeroDeSerie' => $numeroDeSerie,
            'vigenciadesde' => $vigenciadesde,
            'vigenciahasta' => $vigenciahasta,
            'fechasistema' => $fechasistema,
            'nombresubclase' => $nombresubclase,
            'motorserie' => $motorserie,
            'nombreuso' => $nombreuso,
            'hora' => $hora
        ];

        // Generar PDF
        $pdf = PDF::loadView('consulta.pdf_view', $data);
        $pdf->setPaper('A5', 'portrait'); // o 'landscape' para orientación horizontal
        return $pdf->download('EMISION-SOAT.pdf');
    }
}
