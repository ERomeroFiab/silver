<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class ViewController extends Controller
{
    public function listado()
    {
        return view('listado', ['tablas' => collect(config('tablas'))]);
    }

    public function vistas( $table_name )
    {
        if ( $table_name ) {
            return view('tablas/'.$table_name, ['tablas' => collect(config('tablas'))]);
        }
    }

    public function pruebas( $table_name )
    {
        dd( DB::table( $table_name )->paginate('5')->toArray() );
    }
}
