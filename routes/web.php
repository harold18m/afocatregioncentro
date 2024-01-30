<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VigenciaController;
use App\Http\Controllers\GestionPermisoController;
use App\Http\Controllers\PDFController;

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
