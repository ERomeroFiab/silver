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
use App\Models\Document;
use App\Models\Contact;
use App\Models\ContratDetailProduit;
use App\Models\IdentificationNote;
use App\Models\Invoice;
use App\Models\Mission;
use App\Models\MissionTeam;
use App\Models\SocieteFamille;
use App\Models\MissionMotive;
use App\Models\MissionMotiveHistoriqueMaj;
use App\Models\ContratPartielConditionFianciere;
use App\Models\AffaireConditionsFinanciere;
use App\Models\AffaireObjection;
use App\Models\HistoriqueMajAffaire;
use App\Models\MissionMotiveEco;

class DatatableController extends Controller
{
    public function get_tabla_action( Request $request )
    {
        $columns = config('tablas')['action'];

        $relations = [
            // '',
        ];
        
        $datos = Action::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {

                                if ( $request->get('SEARCH_BY_PID_IDENTIFICATION') !== null ) {
                                    $query->where('PID_IDENTIFICATION', $request->get('SEARCH_BY_PID_IDENTIFICATION'));
                                }

                                if ( $request->get('SEARCH_BY_PID_MISSION') !== null ) {
                                    $query->where('PID_MISSION', $request->get('SEARCH_BY_PID_MISSION'));
                                }

                                if ( $request->get('SEARCH_BY_PID_CONTRAT') !== null ) {
                                    $query->where('PID_CONTRAT', $request->get('SEARCH_BY_PID_CONTRAT'));
                                }

                                if ( $request->get('SEARCH_BY_PID_AFFAIRE') !== null ) {
                                    $query->where('PID_AFFAIRE', $request->get('SEARCH_BY_PID_AFFAIRE'));
                                }

                            })
                            ->toJson();
    }

    public function get_tabla_action_intervenants_fiabilis( Request $request )
    {
        $columns = config('tablas')['intervenants_fiabilis'];

        $relations = [
            // '',
        ];

        $datos = ActionIntervenantsFiabilis::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {
                                
                                if ( $request->get('SEARCH_BY_PID_IDENTIFICATION') !== null ) {
                                    $query->where('PID_IDENTIFICATION', $request->get('SEARCH_BY_PID_IDENTIFICATION'));
                                }

                            })
                            ->toJson();
    }

    public function get_tabla_affaire( Request $request )
    {
        $columns = config('tablas')['affaire'];

        $relations = [
            // '',
        ];

        $datos = Affaire::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {
                                
                                if ( $request->get('SEARCH_BY_PID_IDENTIFICATION') !== null ) {
                                    $query->where('PID_IDENTIFICATION', $request->get('SEARCH_BY_PID_IDENTIFICATION'));
                                }

                                if ( $request->get('SEARCH_BY_PID_CONTRAT') !== null ) {
                                    $query->where('PID_CONTRAT', $request->get('SEARCH_BY_PID_CONTRAT'));
                                }

                            })
                            ->toJson();
    }

    public function get_tabla_identification( Request $request )
    {
        $columns = config('tablas')['identification'];

        $relations = [
            // '',
        ];
        
        $datos = Identification::select( $columns )->with( $relations );
        
        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {
                                
                                if ( $request->get('search_by_id_identification') !== null ) {
                                    $query->where('ID_IDENTIFICATION', intval($request->get('search_by_id_identification')));
                                }
                            })
                            ->toJson();
    }

    public function get_tabla_contrat( Request $request )
    {
        $columns = config('tablas')['contrat'];

        $relations = [
            // '',
        ];

        $datos = Contrat::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {
                                
                                if ( $request->get('SEARCH_BY_PID_IDENTIFICATION') !== null ) {
                                    $query->where('PID_IDENTIFICATION', $request->get('SEARCH_BY_PID_IDENTIFICATION'));
                                }

                            })
                            ->toJson();
    }

    public function get_tabla_documents( Request $request )
    {
        $columns = config('tablas')['documents'];
        
        $relations = [
            // '',
        ];

        $datos = Document::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {
                                
                                if ( $request->get('SEARCH_BY_PID_IDENTIFICATION') !== null ) {
                                    $query->where('PID_IDENTIFICATION', $request->get('SEARCH_BY_PID_IDENTIFICATION'));
                                }

                                if ( $request->get('SEARCH_BY_PID_MISSION') !== null ) {
                                    $query->where('PID_MISSION', $request->get('SEARCH_BY_PID_MISSION'));
                                }

                                if ( $request->get('SEARCH_BY_PID_CONTRAT') !== null ) {
                                    $query->where('PID_CONTRAT', $request->get('SEARCH_BY_PID_CONTRAT'));
                                }

                                if ( $request->get('SEARCH_BY_PID_AFFAIRE') !== null ) {
                                    $query->where('PID_AFFAIRE', $request->get('SEARCH_BY_PID_AFFAIRE'));
                                }

                            })
                            ->toJson();
    }

    public function get_tabla_contact( Request $request )
    {
        $columns = config('tablas')['contact'];
        
        $relations = [
            // '',
        ];

        $datos = Contact::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {
                                
                                if ( $request->get('SEARCH_BY_PID_IDENTIFICATION') !== null ) {
                                    $query->where('PID_IDENTIFICATION', $request->get('SEARCH_BY_PID_IDENTIFICATION'));
                                }

                            })
                            ->toJson();
    }

    public function get_tabla_contrat_detail_produit( Request $request )
    {
        $columns = config('tablas')['contrat_detail_produit'];
        
        $relations = [
            // '',
        ];

        $datos = ContratDetailProduit::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {
                                
                                if ( $request->get('SEARCH_BY_PID_IDENTIFICATION') !== null ) {
                                    $query->where('PID_IDENTIFICATION', $request->get('SEARCH_BY_PID_IDENTIFICATION'));
                                }

                                if ( $request->get('SEARCH_BY_PID_CONTRAT') !== null ) {
                                    $query->where('PID_CONTRAT', $request->get('SEARCH_BY_PID_CONTRAT'));
                                }
                                
                            })
                            ->toJson();
    }

    public function get_tabla_identification_note( Request $request )
    {
        $columns = config('tablas')['identification_note'];
        
        $relations = [
            // '',
        ];

        $datos = IdentificationNote::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {
                                
                                if ( $request->get('SEARCH_BY_PID_IDENTIFICATION') !== null ) {
                                    $query->where('PID_IDENTIFICATION', $request->get('SEARCH_BY_PID_IDENTIFICATION'));
                                }

                            })
                            ->toJson();
    }

    public function get_tabla_invoice( Request $request )
    {
        $columns = config('tablas')['invoice'];
        
        $relations = [
            // '',
        ];

        $datos = Invoice::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {
                                
                                if ( $request->get('SEARCH_BY_PID_IDENTIFICATION') !== null ) {
                                    $query->where('PID_IDENTIFICATION', $request->get('SEARCH_BY_PID_IDENTIFICATION'));
                                }

                                if ( $request->get('SEARCH_BY_PID_CONTRAT') !== null ) {
                                    $query->where('PID_CONTRAT', $request->get('SEARCH_BY_PID_CONTRAT'));
                                }

                            })
                            ->toJson();
    }

    public function get_tabla_mission( Request $request )
    {
        $columns = config('tablas')['mission'];
        
        $relations = [
            // '',
        ];

        $datos = Mission::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {
                                
                                if ( $request->get('SEARCH_BY_PID_IDENTIFICATION') !== null ) {
                                    $query->where('PID_IDENTIFICATION', $request->get('SEARCH_BY_PID_IDENTIFICATION'));
                                }

                                if ( $request->get('SEARCH_BY_PID_CONTRAT') !== null ) {
                                    $query->where('PID_CONTRAT', $request->get('SEARCH_BY_PID_CONTRAT'));
                                }

                            })
                            ->toJson();
    }

    public function get_tabla_mission_team( Request $request )
    {
        $columns = config('tablas')['mission_team'];
        
        $relations = [
            // '',
        ];

        $datos = MissionTeam::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {
                                
                                if ( $request->get('SEARCH_BY_PID_IDENTIFICATION') !== null ) {
                                    $query->where('PID_IDENTIFICATION', $request->get('SEARCH_BY_PID_IDENTIFICATION'));
                                }

                                if ( $request->get('SEARCH_BY_PID_MISSION') !== null ) {
                                    $query->where('PID_MISSION', $request->get('SEARCH_BY_PID_MISSION'));
                                }

                            })
                            ->toJson();
    }

    public function get_tabla_societe_famille( Request $request )
    {
        $columns = config('tablas')['societe_famille'];
        
        $relations = [
            // '',
        ];

        $datos = SocieteFamille::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {
                                
                                if ( $request->get('SEARCH_BY_PID_IDENTIFICATION') !== null ) {
                                    $query->where('PID_IDENTIFICATION', $request->get('SEARCH_BY_PID_IDENTIFICATION'));
                                }

                            })
                            ->toJson();
    }

    public function get_tabla_mission_motive( Request $request )
    {
        $columns = config('tablas')['mission_motive'];
        
        $relations = [
            // '',
        ];

        $datos = MissionMotive::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {
                                
                                if ( $request->get('SEARCH_BY_PID_MISSION') !== null ) {
                                    $query->where('PID_MISSION', $request->get('SEARCH_BY_PID_MISSION'));
                                }

                            })
                            ->toJson();
    }

    public function get_tabla_mission_motive_historique_maj( Request $request )
    {
        $columns = config('tablas')['mission_motive_historique_maj'];
        
        $relations = [
            // '',
        ];

        $datos = MissionMotiveHistoriqueMaj::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {
                                
                                if ( $request->get('SEARCH_BY_PID_MISSION') !== null ) {
                                    $query->where('PID_MISSION', $request->get('SEARCH_BY_PID_MISSION'));
                                }

                                if ( $request->get('SEARCH_BY_PID_MISSION_MOTIVE') !== null ) {
                                    $query->where('PID_MISSION_MOTIVE', $request->get('SEARCH_BY_PID_MISSION_MOTIVE'));
                                }

                            })
                            ->toJson();
    }

    public function get_tabla_contrat_partiel_condition_fiancieres( Request $request )
    {
        $columns = config('tablas')['contrat_partiel_condition_fiancieres'];
        
        $relations = [
            // '',
        ];

        $datos = ContratPartielConditionFianciere::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {
                                
                                if ( $request->get('SEARCH_BY_PID_CONTRAT') !== null ) {
                                    $query->where('PID_CONTRAT', $request->get('SEARCH_BY_PID_CONTRAT'));
                                }

                            })
                            ->toJson();
    }

    public function get_tabla_affaire_conditions_financieres( Request $request )
    {
        $columns = config('tablas')['affaire_conditions_financieres'];
        
        $relations = [
            // '',
        ];

        $datos = AffaireConditionsFinanciere::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {
                                
                                if ( $request->get('SEARCH_BY_PID_AFFAIRE') !== null ) {
                                    $query->where('PID_AFFAIRE', $request->get('SEARCH_BY_PID_AFFAIRE'));
                                }

                            })
                            ->toJson();
    }

    public function get_tabla_affaire_objections( Request $request )
    {
        $columns = config('tablas')['affaire_objections'];
        
        $relations = [
            // '',
        ];

        $datos = AffaireObjection::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {
                                
                                if ( $request->get('SEARCH_BY_PID_AFFAIRE') !== null ) {
                                    $query->where('PID_AFFAIRE', $request->get('SEARCH_BY_PID_AFFAIRE'));
                                }

                            })
                            ->toJson();
    }

    public function get_tabla_historique_maj_affaire( Request $request )
    {
        $columns = config('tablas')['historique_maj_affaire'];
        
        $relations = [
            // '',
        ];

        $datos = HistoriqueMajAffaire::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {
                                
                                if ( $request->get('SEARCH_BY_PID_AFFAIRE') !== null ) {
                                    $query->where('PID_AFFAIRE', $request->get('SEARCH_BY_PID_AFFAIRE'));
                                }

                            })
                            ->toJson();
    }

    public function get_tabla_mission_motive_eco( Request $request )
    {
        $columns = config('tablas')['mission_motive_eco'];
        
        $relations = [
            // '',
        ];

        $datos = MissionMotiveEco::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {
                                
                                if ( $request->get('SEARCH_BY_PID_MISSION_MOTIVE') !== null ) {
                                    $query->where('PID_MISSION_MOTIVE', $request->get('SEARCH_BY_PID_MISSION_MOTIVE'));
                                }

                            })
                            ->toJson();
    }
}
