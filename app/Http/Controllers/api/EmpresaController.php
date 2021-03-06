<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Identification;

class EmpresaController extends Controller
{
    public function get_empresas_name()
    {
        $response = [];
        $empresas = Identification::select( "GROUP" )->distinct('GROUP')->where('TYPE_FICHE', 'Client')->get();

        $relations = [
            'missions',
            'missions.mission_motives',
            'missions.mission_motives.mission_motive_ecos',
            'missions.mission_motives.mission_motive_ecos.invoice_ligne',
            'missions.mission_motives.mission_motive_ecos.invoice_ligne.invoice',
        ];

        foreach ($empresas as $key => $empresa) {
            $response[$key] = [];
            $response[$key]['name'] = $empresa['GROUP'];
            $response[$key]['razones_sociales'] = Identification::where( 'GROUP', $empresa['GROUP'] )->with( $relations )->get();
        }
        return response()->json($response);
    }
}
