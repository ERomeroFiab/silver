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
// RESOURCES
Route::get('/models/mission/show/{id_mission}', [App\Http\Controllers\MissionController::class, 'show'])->name('mission.show');
Route::get('/models/contrat/show/{id_contrat}', [App\Http\Controllers\ContratController::class, 'show'])->name('contrat.show');
Route::get('/models/societe_famille/show/{id_societe_famille}', [App\Http\Controllers\SocieteFamilleController::class, 'show'])->name('societe_famille.show');

// AJAX
Route::get('/tablas/datatable/get_tabla_action', [App\Http\Controllers\DatatableController::class, 'get_tabla_action'])->name('get_tabla_action');
Route::get('/tablas/datatable/get_tabla_action_intervenants_fiabilis', [App\Http\Controllers\DatatableController::class, 'get_tabla_action_intervenants_fiabilis'])->name('get_tabla_action_intervenants_fiabilis');
Route::get('/tablas/datatable/get_tabla_affaire', [App\Http\Controllers\DatatableController::class, 'get_tabla_affaire'])->name('get_tabla_affaire');
Route::get('/tablas/datatable/get_tabla_identification', [App\Http\Controllers\DatatableController::class, 'get_tabla_identification'])->name('get_tabla_identification');
Route::get('/tablas/datatable/get_tabla_contrat', [App\Http\Controllers\DatatableController::class, 'get_tabla_contrat'])->name('get_tabla_contrat');
Route::get('/tablas/datatable/get_tabla_documents', [App\Http\Controllers\DatatableController::class, 'get_tabla_documents'])->name('get_tabla_documents');
Route::get('/tablas/datatable/get_tabla_contact', [App\Http\Controllers\DatatableController::class, 'get_tabla_contact'])->name('get_tabla_contact');
Route::get('/tablas/datatable/get_tabla_contrat_detail_produit', [App\Http\Controllers\DatatableController::class, 'get_tabla_contrat_detail_produit'])->name('get_tabla_contrat_detail_produit');
Route::get('/tablas/datatable/get_tabla_identification_note', [App\Http\Controllers\DatatableController::class, 'get_tabla_identification_note'])->name('get_tabla_identification_note');
Route::get('/tablas/datatable/get_tabla_invoice', [App\Http\Controllers\DatatableController::class, 'get_tabla_invoice'])->name('get_tabla_invoice');
Route::get('/tablas/datatable/get_tabla_mission', [App\Http\Controllers\DatatableController::class, 'get_tabla_mission'])->name('get_tabla_mission');
Route::get('/tablas/datatable/get_tabla_mission_team', [App\Http\Controllers\DatatableController::class, 'get_tabla_mission_team'])->name('get_tabla_mission_team');
Route::get('/tablas/datatable/get_tabla_societe_famille', [App\Http\Controllers\DatatableController::class, 'get_tabla_societe_famille'])->name('get_tabla_societe_famille');
Route::get('/tablas/datatable/get_tabla_mission_motive', [App\Http\Controllers\DatatableController::class, 'get_tabla_mission_motive'])->name('get_tabla_mission_motive');
Route::get('/tablas/datatable/get_tabla_mission_motive_historique_maj', [App\Http\Controllers\DatatableController::class, 'get_tabla_mission_motive_historique_maj'])->name('get_tabla_mission_motive_historique_maj');
Route::get('/tablas/datatable/get_tabla_contrat_partiel_condition_fiancieres', [App\Http\Controllers\DatatableController::class, 'get_tabla_contrat_partiel_condition_fiancieres'])->name('get_tabla_contrat_partiel_condition_fiancieres');
