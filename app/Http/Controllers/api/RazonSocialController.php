<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Identification;

class RazonSocialController extends Controller
{
    public function get_razones_sociales()
    {
        $columns = [
            "SIRET",
            "ADRESSE1",
            "GROUP",
            "RAISON_SOC",
            "TYPE_FICHE",
            "CODE_POSTAL",
        ];
        $razones_sociales = Identification::select( $columns )->get();
        return $razones_sociales;
    }
}
