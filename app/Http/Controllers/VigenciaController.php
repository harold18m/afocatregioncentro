<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VigenciaController extends Controller
{
    public function consultarVigencia(Request $request)
{
    $placa = $request->input('placa');
    $placa = str_replace('-','',$placa);
    if (empty($placa)) {
        return redirect()->route('home'); 
    }

    $response = Http::get("https://intranet.afocatregioncentro.pe:843/SistemaPrimeAfocat.WService/afiliacion/getplaca/{$placa}");
    $result = $response->json();
    return view('resultado', ['result' => $result]);
}

}