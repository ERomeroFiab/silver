<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Action;
use App\Models\ActionIntervenantsFiabilis;
use App\Models\Affaire;
use App\Models\Identification;
use App\Models\Contrat;

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

    public function get_tabla_identification( Request $request )
    {
        $columns = [
            'ID_IDENTIFICATION', 
            'ADRESSE1', 
            'AUDITEUR', 
            'CODE_POSTAL', 
            'EFFECTIF', 
            'GROUP', 
            'PAYS', 
            'PERS_MORALE_OU_PERS_PHYSIQUE', 
            'PID_GROUP', 
            'PID_INTERNATIONAL_GROUP', 
            'PID_PARTNER', 
            'PID_REVENDEUR', 
            'PID_SUSPECTS', 
            'RAISON_SOC', 
            'SIRET', 
            'TYPE_FICHE', 
            'VILLE', 
            'TGG_2019_B', 
        ];

        $relations = [
            // '',
        ];

        $datos = Identification::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {
                                
                            })
                            ->toJson();
    }

    public function get_tabla_contrat( Request $request )
    {
        $columns = [
            'ALERTE_FIN_CONTRAT',  
            'ALERTE_POSEE',  
            'CIVILITE',  
            'CIVILITE_FACTURATION',  
            'COMMENTAIRE',  
            'CONTRAT_TYPE',  
            'DATE_DEBUT_ANALYSE',  
            'DATE_DEBUT_CONTRAT',  
            'DATE_FIN_ANALYSE',  
            'DATE_FIN_CONTRAT',  
            'DATE_SIGNATURE_CLIENT',  
            'DATE_SIGNATURE_INTERNE',  
            'DROIT_DE_CITER',  
            'ENGAGEMENT_MOIS',  
            'E_MAIL',  
            'E_MAIL_FACTURATION',  
            'FAMILLE',  
            'FEE_INCLUDES_VAT',  
            'FIABILIS_GROUP_ENTITY',  
            'GROUPE',  
            'ID_CONTRAT',  
            'IT_COMPTEUR',  
            'MODE_SIGNATURE',  
            'MULTI_COMPANY_INVOICING',  
            'MULTI_ENTITY',  
            'MULTI_SALES',  
            'NOM',  
            'NOM_FACTURATION',  
            'NO_CONTRAT',  
            'NO_CONTRAT_ORIGINE',  
            'NO_ENTITY',  
            'NO_SUFFIXE',  
            'PID_AIDE_OFFRE_CONDITION',  
            'PID_CONTACT',  
            'PID_CONTACT_FACTURATION',  
            'PID_IDENTIFICATION',  
            'PID_PARTNER',  
            'PRENOM',  
            'PRENOM_FACTURATION',  
            'RECONDUCTION_TYPE',  
            'STATUT',  
            'SUIVI_PAR',  
            'SYS_DATE_CREATION',  
            'SYS_DATE_MODIFICATION',  
            'SYS_HEURE_CREATION',  
            'SYS_HEURE_MODIFICATION',  
            'SYS_SYNCHRO_CODE_POSTE',  
            'SYS_SYNCHRO_DATE_ENREG',  
            'SYS_USER_CREATION',  
            'SYS_USER_MODIFICATION',  
            'TEMPO_VP',  
            'VALEUR',  
            'VP_NO_CONTRAT',  
            'INTERNATIONAL_SALES',  
        ];

        $relations = [
            // '',
        ];

        $datos = Contrat::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {
                                
                            })
                            ->toJson();
    }
}
