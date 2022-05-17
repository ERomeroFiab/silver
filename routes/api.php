<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckHeaderMiddleware;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});





Route::middleware([CheckHeaderMiddleware::class])->group(function () {

    Route::get('/empresas/get_empresas_name', [App\Http\Controllers\api\EmpresaController::class, 'get_empresas_name']);
    Route::get('/empresas/get_razones_sociales', [App\Http\Controllers\api\RazonSocialController::class, 'get_razones_sociales']);
    Route::get('/empresas/get_razones_sociales_by_group_name', [App\Http\Controllers\api\RazonSocialController::class, 'get_razones_sociales_by_group_name']);
    Route::get('/empresas/get_razon_social_by_rut', [App\Http\Controllers\api\RazonSocialController::class, 'get_razon_social_by_rut']);
    Route::get('/empresas/get_ecos', [App\Http\Controllers\api\RazonSocialController::class, 'get_ecos']);
    Route::get('/empresas/get_ecos_by_razon_social', [App\Http\Controllers\api\RazonSocialController::class, 'get_ecos_by_razon_social']);
    
});