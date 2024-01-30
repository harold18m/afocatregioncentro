<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GestionPermisoController extends Controller
{
    public function mostrarGestionPermiso(Request $request)
    {
        
        $placa = session('placa');
        $cat = session('cat');

        // ... Tu lógica para mostrar la vista gestion-permiso con los valores de placa y cat
        return view('gestion-permiso', ['placa' => $placa, 'cat' => $cat]);
    }
}
