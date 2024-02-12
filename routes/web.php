<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VigenciaController;
use App\Http\Controllers\GestionPermisoController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ConsultaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/consultar-vigencia', [VigenciaController::class, 'consultarVigencia'])->name('consultar-vigencia') ;
Route::get('/gestion-permiso', [GestionPermisoController::class, 'mostrarGestionPermiso'])->name('gestion-permiso');
Route::post('/generar-permiso', [PDFController::class, 'generatePDF'])->name('generatePDF');
Route::get('/consulta-cat', [ConsultaController::class, 'index'])->name('consultar-cat');
Route::get('/consulta-vigencia', [ConsultaController::class, 'consultarVigencia'])->name('consulta-vigencia');
Route::get('/imprimir-soat', [ConsultaController::class, 'imprimirSoat'])->name('imprimir-soat');
