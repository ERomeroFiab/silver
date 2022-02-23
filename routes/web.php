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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tablas/listado', [App\Http\Controllers\ViewController::class, 'listado'])->name('listado');
Route::get('/tablas/vista/{table_name}', [App\Http\Controllers\ViewController::class, 'vistas'])->name('vistas');
