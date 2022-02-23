<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Action;

class DatatableController extends Controller
{
    public function get_tabla_action( Request $request )
    {
        $columns = [
            'ALARME', 
            'BITRIX_CONTACT', 
            'BITRIX_KEY'
        ];

        $relations = [
            // 'tutor',
        ];

        // $datos = DB::table( 'action' )->select( $columns );
        $datos = Action::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {
                                
                            })
                            ->toJson();
    }
}
