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

                            })
                            ->toJson();
    }
}
