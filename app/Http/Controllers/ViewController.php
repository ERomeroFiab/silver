<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Identification;

class ViewController extends Controller
{
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
        dd( DB::table( $table_name )->paginate('5')->toArray() );
    }

    public function vista_buscar()
    {
        return view('tablas.buscar');
    }

    public function buscar( Request $request )
    {
        $relations = [
            'actions',
            'action_marketings',
            'adresses',
            'affaires',
            'affaire_intervenants',
        ];
        $identification = null;
        try {
            // $identification = Identification::where('SIRET', $request->get('rut'))->with($relations)->first();
        } catch (\Throwable $th) {
            //throw $th;
        }
        return view('tablas.ver_busqueda_por_rut', ['identification' => $identification]);
    }
}
