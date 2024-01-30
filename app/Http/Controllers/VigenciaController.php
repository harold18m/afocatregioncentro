<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VigenciaController extends Controller
{
    public function consultarVigencia(Request $request)
    {
        $opcion = $request->input('opcion');
        $placa = $request->input('placa');
        

        if (empty($placa)) {
            return redirect()->route('home');
        }

        if ($opcion == "1") {
            $placa = str_replace('-', '', $placa);
            $response = Http::get("https://intranet.afocatregioncentro.pe:843/SistemaPrimeAfocat.WService/afiliacion/getplaca/{$placa}");
        } elseif ($opcion == "2") {
            $placa = str_replace(' ', '-', $placa);
            $response = Http::get("https://intranet.afocatregioncentro.pe:843/SistemaPrimeAfocat.WService/afiliacion/getcatcomplete/{$placa}");
        } else {
            return redirect()->route('home')->with('error', 'Opción inválida seleccionada');
        }

        $result = $response->json();
        if (isset($result['returnObject'])) {
            if ($result['returnObject']['placa'] == 'ANULADO') {
                return redirect()->route('home')->with('error', 'La placa está anulada');
            }
        
            session(['placa' => $result['returnObject']['placa']]);
            session(['cat' => $result['returnObject']['ncat'] . '-' . $result['returnObject']['acat']]);
        }

        return view('resultado', ['result' => $result]);
    }
}