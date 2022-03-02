<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Identification;

class EmpresaController extends Controller
{
    public function get_empresas_name()
    {
        $empresas = Identification::select( "GROUP" )->distinct('GROUP')->where('TYPE_FICHE', 'Client')->get();
        return response()->json($empresas);
    }
}
