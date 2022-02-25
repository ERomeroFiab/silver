<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\ViewController::class, 'listado']);
Route::get('/pruebas/{table_name}', [App\Http\Controllers\ViewController::class, 'pruebas'])->name('pruebas');
// VISTAS
Route::get('/tablas/listado', [App\Http\Controllers\ViewController::class, 'listado'])->name('listado');
Route::get('/tablas/vista-buscar', [App\Http\Controllers\ViewController::class, 'vista_buscar'])->name('vista_buscar');
Route::post('/tablas/buscar', [App\Http\Controllers\ViewController::class, 'buscar'])->name('buscar');
Route::get('/tablas/vista/{table_name}', [App\Http\Controllers\ViewController::class, 'vistas'])->name('vistas');
// AJAX
Route::get('/tablas/datatable/get_tabla_action', [App\Http\Controllers\DatatableController::class, 'get_tabla_action'])->name('get_tabla_action');
Route::get('/tablas/datatable/get_tabla_action_intervenants_fiabilis', [App\Http\Controllers\DatatableController::class, 'get_tabla_action_intervenants_fiabilis'])->name('get_tabla_action_intervenants_fiabilis');
Route::get('/tablas/datatable/get_tabla_affaire', [App\Http\Controllers\DatatableController::class, 'get_tabla_affaire'])->name('get_tabla_affaire');
Route::get('/tablas/datatable/get_tabla_identification', [App\Http\Controllers\DatatableController::class, 'get_tabla_identification'])->name('get_tabla_identification');
Route::get('/tablas/datatable/get_tabla_contrat', [App\Http\Controllers\DatatableController::class, 'get_tabla_contrat'])->name('get_tabla_contrat');
Route::get('/tablas/datatable/get_tabla_documents', [App\Http\Controllers\DatatableController::class, 'get_tabla_documents'])->name('get_tabla_documents');
