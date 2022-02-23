<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Action;
use App\Models\ActionIntervenantsFiabilis;
use App\Models\Affaire;

class DatatableController extends Controller
{
    public function get_tabla_action( Request $request )
    {
        $columns = [
            'ALARME', 
            'CATEGORIE', 
            'CIVILITE', 
            'DATE_ALARME', 
            'DATE_DEBUT', 
            'DATE_FIN', 
            'EMPLACEMENT', 
            'E_MAIL', 
            'FAIT', 
            'ID_ACTION', 
            'NOM', 
            'NOTE', 
            'PID_CONTACT', 
            'PID_IDENTIFICATION', 
            'RESULTAT', 
            'SUIVI_PAR', 
            'SYS_DATE_CREATION', 
            'SYS_DATE_MODIFICATION', 
            'SYS_HEURE_CREATION', 
            'SYS_HEURE_MODIFICATION', 
        ];

        $relations = [
            // 'tutor',
        ];

        $datos = Action::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {
                                
                            })
                            ->toJson();
    }

    public function get_tabla_action_intervenants_fiabilis( Request $request )
    {
        $columns = [
            'ID_ACTION_INTERVENANTS_FIABILIS', 
            'LOGIN', 
            'PID_ACTION', 
            'SYS_DATE_CREATION', 
            'SYS_DATE_MODIFICATION', 
            'SYS_HEURE_CREATION', 
            'SYS_HEURE_MODIFICATION', 
            'SYS_USER_CREATION', 
            'SYS_USER_MODIFICATION', 
        ];

        $relations = [
            // 'tutor',
        ];

        $datos = ActionIntervenantsFiabilis::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {
                                
                            })
                            ->toJson();
    }

    public function get_tabla_affaire( Request $request )
    {
        $columns = [
            'CIVILITE', 
            'DATE_PREVISIONNEL', 
            'DATE_SIGNATURE', 
            'EMAIL', 
            'FAMILLE', 
            'ID_AFFAIRE', 
            'MONTANT_PONDERE', 
            'NOM', 
            'NO_AFFAIRE', 
            'PHASE', 
            'PID_CONTACT', 
            'PID_IDENTIFICATION', 
            'PRENOM', 
            'PROBABILITE', 
            'PRODUIT', 
            'STATUT', 
            'SUIVI_PAR', 
            'SYS_DATE_CREATION', 
            'SYS_DATE_MODIFICATION', 
            'SYS_USER_CREATION', 
            'TOTAL_PREVISIONNEL', 
        ];

        $relations = [
            // 'tutor',
        ];

        $datos = Affaire::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {
                                
                            })
                            ->toJson();
    }
}
