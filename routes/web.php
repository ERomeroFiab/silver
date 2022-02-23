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
Route::get('/tablas/vista/{table_name}', [App\Http\Controllers\ViewController::class, 'vistas'])->name('vistas');
// AJAX
Route::get('/tablas/datatable/get_tabla_action', [App\Http\Controllers\DatatableController::class, 'get_tabla_action'])->name('get_tabla_action');
Route::get('/tablas/datatable/get_tabla_action_intervenants_fiabilis', [App\Http\Controllers\DatatableController::class, 'get_tabla_action_intervenants_fiabilis'])->name('get_tabla_action_intervenants_fiabilis');
