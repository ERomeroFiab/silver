<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Identification;
use App\Models\ContratDetailProduit;

class ViewController extends Controller
{
    public function home()
    {
        return "working";
    }

    public function listado()
    {
        return view('listado');
    }

    public function vistas( $table_name )
    {
        if ( $table_name ) {
            return view('tablas/'.$table_name);
        }
    }

    public function pruebas( $table_name )
    {
        dd( DB::table( $table_name )
        // ->where('PID_IDENTIFICATION', '0063880abef9210e66b4eb9ee9046fdd')
        ->paginate('5')->toArray() );
    }

    public function vista_buscar()
    {
        return view('tablas.buscar');
    }

    public function buscar( Request $request )
    {
        $relations = [
            'actions',
            'affaires',
            'contacts',
            'contrats',
            'contrat_detail_produits',
            'documents',
            'identification_notes',
            'invoices',
            'missions',
            'mission_teams',
            'societe_familles',
        ];
        $identification = null;
        $identification = Identification::where('SIRET', $request->get('rut'))->with($relations)->first();
        return view('tablas.ver_busqueda_por_rut', ['identification' => $identification]);
    }
}
