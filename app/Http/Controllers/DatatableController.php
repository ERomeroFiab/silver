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
use App\Models\Article;
use App\Models\AideActionCategorie;
use App\Models\AideActionObjet;
use App\Models\AideMissionMotif;
use App\Models\AideMissionStep;
use App\Models\InvoiceLigne;
use App\Models\JournalDeleted;
use App\Models\Setting;
use App\Models\AideActionOrigine;
use App\Models\AideActionResultat;
use App\Models\AideAffaireObjection;
use App\Models\AideAffairePerte;
use App\Models\AideAffairePhase;
use App\Models\AideAffaireStatut;
use App\Models\AideAffaireYear;
use App\Models\AideArticleFamille;
use App\Models\AideArticleProvider;
use App\Models\AideContactCivilite;
use App\Models\AideContactFonction;
use App\Models\AideContactLanguage;
use App\Models\AideContactService;
use App\Models\AideContratEntity;
use App\Models\AideContratModeSignature;
use App\Models\AideContratStatut;
use App\Models\AideContratType;
use App\Models\AideContratTypeReconduction;
use App\Models\AideEventsQualification;
use App\Models\AideEventsStatu;
use App\Models\AideFamilleIndicator;
use App\Models\AideInternationalResponsible;
use App\Models\AideInternationalSector;
use App\Models\AideMissionSousMotif1;
use App\Models\AideMissionSousMotif2;
use App\Models\AideOffreCondition;
use App\Models\AideRemunerationType;
use App\Models\AideSocieteCa;
use App\Models\AideSocieteComune;
use App\Models\AideSocieteCompanyClassification;
use App\Models\AideSocieteEffectif;
use App\Models\AideSocieteFormeJuridique;
use App\Models\AideSocieteNaf;
use App\Models\AideSocieteOrigine;
use App\Models\AideSocietePayrollOutsourcerType;
use App\Models\AideSocietePay;
use App\Models\AideSocieteSecteurGeo;
use App\Models\AideSocieteSegment;
use App\Models\AideSocieteSituationJuridique;
use App\Models\AideSocieteSubSectorGeo;
use App\Models\AideSocieteType;
use App\Models\AideSocieteTypeAdr;

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
                            ->addColumn('action', function ($dato) {
                                return '<a href="'.route('action.show', ['id_action' => $dato->ID_ACTION]).'" class="btn btn-sm btn-info">Ver</a>';
                            })
                            ->toJson();
    }

    public function get_tabla_action_intervenants_fiabilis( Request $request )
    {
        $columns = config('tablas')['action_intervenants_fiabilis'];

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
                            ->addColumn('action', function ($dato) {
                                return '<a href="'.route('action_intervenants_fiabilis.show', ['id_action_intervenants_fiabilis' => $dato->ID_ACTION_INTERVENANTS_FIABILIS]).'" class="btn btn-sm btn-info">Ver</a>';
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
                            ->addColumn('action', function ($dato) {
                                return '<a href="'.route('affaire.show', ['id_affaire' => $dato->ID_AFFAIRE]).'" class="btn btn-sm btn-info">Ver</a>';
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
        // dd( $request->get('SEARCH_BY_VILLE') );
        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {
                                
                                if ( $request->get('SEARCH_BY_ID_IDENTIFICATION') !== null ) {
                                    $query->where('ID_IDENTIFICATION', $request->get('SEARCH_BY_ID_IDENTIFICATION'));
                                }
                                
                                if ( $request->get('SEARCH_BY_SIRET') !== null ) {
                                    $query->where('SIRET', $request->get('SEARCH_BY_SIRET'));
                                }
                                
                                if ( $request->get('SEARCH_BY_ADRESSE1') !== null ) {
                                    $query->where('ADRESSE1', 'like', "%".$request->get('SEARCH_BY_ADRESSE1')."%");
                                }
                                
                                if ( $request->get('SEARCH_BY_AUDITEUR') !== null ) {
                                    $query->where('AUDITEUR', 'like', "%".$request->get('SEARCH_BY_AUDITEUR')."%");
                                }
                                
                                if ( $request->get('SEARCH_BY_EFFECTIF') !== null ) {
                                    $query->where('EFFECTIF', $request->get('SEARCH_BY_EFFECTIF'));
                                }
                                
                                if ( $request->get('SEARCH_BY_GROUP') !== null ) {
                                    $query->where('GROUP', 'like', "%".$request->get('SEARCH_BY_GROUP')."%");
                                }
                                
                                if ( $request->get('SEARCH_BY_RAISON_SOC') !== null ) {
                                    $query->where('RAISON_SOC', 'like', "%".$request->get('SEARCH_BY_RAISON_SOC')."%");
                                }
                                
                                if ( $request->get('SEARCH_BY_TYPE_FICHE') !== null ) {
                                    $query->where('TYPE_FICHE', $request->get('SEARCH_BY_TYPE_FICHE'));
                                }
                                
                                if ( $request->get('SEARCH_BY_VILLE') !== null ) {
                                    $query->where('VILLE', $request->get('SEARCH_BY_VILLE'));
                                }

                            })
                            ->addColumn('action', function ($dato) {
                                return '<a href="'.route('identification.show', ['id_identification' => $dato->ID_IDENTIFICATION]).'" class="btn btn-sm btn-info">Ver</a>';
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
                            ->addColumn('action', function ($dato) {
                                return '<a href="'.route('contrat.show', ['id_contrat' => $dato->ID_CONTRAT]).'" class="btn btn-sm btn-info">Ver</a>';
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
                            ->addColumn('action', function ($dato) {
                                return '<a href="'.route('documents.show', ['id_document' => $dato->ID_DOCUMENTS]).'" class="btn btn-sm btn-info">Ver</a>';
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
                            ->addColumn('action', function ($dato) {
                                return '<a href="'.route('contact.show', ['id_contact' => $dato->ID_CONTACT]).'" class="btn btn-sm btn-info">Ver</a>';
                            })
                            ->toJson();
    }

    public function get_tabla_contrat_detail_produit( Request $request )
    {
        $columns = config('tablas')['contrat_detail_produit'];
        
        $relations = [
            'identification',
            'contrat',
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
                            ->addColumn('identification', function($dato){
                                return $dato->identification->ID_IDENTIFICATION;
                            })
                            ->addColumn('contrat', function($dato){
                                return $dato->contrat->ID_CONTRAT;
                            })
                            ->addColumn('action', function ($dato) {
                                return '<a href="'.route('contrat_detail_produit.show', ['id_contrat_detail_produit' => $dato->ID_CONTRAT_DETAIL_PRODUIT]).'" class="btn btn-sm btn-info">Ver</a>';
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
                            ->addColumn('action', function ($dato) {
                                return '<a href="'.route('identification_note.show', ['id_identification_note' => $dato->ID_IDENTIFICATION_NOTE]).'" class="btn btn-sm btn-info">Ver</a>';
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
                            ->addColumn('action', function ($dato) {
                                return '<a href="'.route('invoice.show', ['id_invoice' => $dato->ID_INVOICE]).'" class="btn btn-sm btn-info">Ver</a>';
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
                            ->addColumn('action', function ($dato) {
                                return '<a href="'.route('mission.show', ['id_mission' => $dato->ID_MISSION]).'" class="btn btn-sm btn-info">Ver</a>';
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
                            ->addColumn('action', function ($dato) {
                                return '<a href="'.route('mission_team.show', ['id_mission_team' => $dato->ID_MISSION_TEAM]).'" class="btn btn-sm btn-info">Ver</a>';
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
                            ->addColumn('action', function ($dato) {
                                return '<a href="'.route('societe_famille.show', ['id_societe_famille' => $dato->ID_SOCIETE_FAMILLE]).'" class="btn btn-sm btn-info">Ver</a>';
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
                            ->addColumn('action', function ($dato) {
                                return '<a href="'.route('mission_motive.show', ['id_mission_motive' => $dato->ID_MISSION_MOTIVE]).'" class="btn btn-sm btn-info">Ver</a>';
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
                            ->addColumn('action', function ($dato) {
                                return '<a href="'.route('mission_motive_historique_maj.show', ['id_mission_motive_historique_maj' => $dato->ID_MISSION_MOTIVE_HISTORIQUE_MAJ]).'" class="btn btn-sm btn-info">Ver</a>';
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
                            ->addColumn('action', function ($dato) {
                                return '<a href="'.route('contrat_partiel_condition_fiancieres.show', ['id_contrat_partiel_condition_fianciere' => $dato->ID_CONTRAT_PARTIEL_CONDITION_FIANCIERES]).'" class="btn btn-sm btn-info">Ver</a>';
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
                            ->addColumn('action', function ($dato) {
                                return '<a href="'.route('affaire_conditions_financieres.show', ['id_affaire_conditions_financiere' => $dato->ID_AFFAIRE_CONDITIONS_FINANCIERES]).'" class="btn btn-sm btn-info">Ver</a>';
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
                            ->addColumn('action', function ($dato) {
                                return '<a href="'.route('affaire_objections.show', ['id_affaire_objection' => $dato->ID_AFFAIRE_OBJECTIONS]).'" class="btn btn-sm btn-info">Ver</a>';
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
                            ->addColumn('action', function ($dato) {
                                return '<a href="'.route('historique_maj_affaire.show', ['id_historique_maj_affaire' => $dato->ID_HISTORIQUE_MAJ_AFFAIRE]).'" class="btn btn-sm btn-info">Ver</a>';
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
                            ->addColumn('action', function ($dato) {
                                return '<a href="'.route('mission_motive_eco.show', ['id_mission_motive_eco' => $dato->ID_MISSION_MOTIVE_ECO]).'" class="btn btn-sm btn-info">Ver</a>';
                            })
                            ->toJson();
    }

    public function get_tabla_article( Request $request )
    {
        $columns = config('tablas')['article'];
        
        $relations = [
            // '',
        ];

        $datos = Article::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {
                                
                                if ( $request->get('SEARCH_BY_PID_MISSION_MOTIVE') !== null ) {
                                    $query->where('PID_MISSION_MOTIVE', $request->get('SEARCH_BY_PID_MISSION_MOTIVE'));
                                }

                            })
                            ->addColumn('action', function ($dato) {
                                return '<a href="'.route('article.show', ['id_article' => $dato->ID_ARTICLE]).'" class="btn btn-sm btn-info">Ver</a>';
                            })
                            ->toJson();
    }

    public function get_tabla_aide_action_categorie( Request $request )
    {
        $columns = config('tablas')['aide_action_categorie'];
        
        $relations = [
            // '',
        ];

        $datos = AideActionCategorie::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {

                            })
                            ->toJson();
    }

    public function get_tabla_aide_action_objet( Request $request )
    {
        $columns = config('tablas')['aide_action_objet'];
        
        $relations = [
            // '',
        ];

        $datos = AideActionObjet::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {

                            })
                            ->toJson();
    }

    public function get_tabla_aide_mission_motif( Request $request )
    {
        $columns = config('tablas')['aide_mission_motif'];
        
        $relations = [
            // '',
        ];

        $datos = AideMissionMotif::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {

                            })
                            ->toJson();
    }

    public function get_tabla_aide_mission_step( Request $request )
    {
        $columns = config('tablas')['aide_mission_step'];
        
        $relations = [
            // '',
        ];

        $datos = AideMissionStep::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {

                            })
                            ->toJson();
    }

    public function get_tabla_invoice_ligne( Request $request )
    {
        $columns = config('tablas')['invoice_ligne'];
        
        $relations = [
            // '',
        ];

        $datos = InvoiceLigne::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {

                            })
                            ->addColumn('action', function ($dato) {
                                return '<a href="'.route('invoice_ligne.show', ['id_invoice_ligne' => $dato->ID_INVOICE_LIGNE]).'" class="btn btn-sm btn-info">Ver</a>';
                            })
                            ->toJson();
    }

    public function get_tabla_journal_deleted( Request $request )
    {
        $columns = config('tablas')['journal_deleted'];
        
        $relations = [
            // '',
        ];

        $datos = JournalDeleted::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {

                            })
                            ->addColumn('action', function ($dato) {
                                return '<a href="'.route('journal_deleted.show', ['id_journal_deleted' => $dato->ID_JOURNAL_DELETED]).'" class="btn btn-sm btn-info">Ver</a>';
                            })
                            ->toJson();
    }

    public function get_tabla_settings( Request $request )
    {
        $columns = config('tablas')['settings'];
        
        $relations = [
            // '',
        ];

        $datos = Setting::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {

                            })
                            ->addColumn('action', function ($dato) {
                                return '<a href="'.route('settings.show', ['id_setting' => $dato->ID_SETTINGS]).'" class="btn btn-sm btn-info">Ver</a>';
                            })
                            ->toJson();
    }

    public function get_tabla_aide_action_origine( Request $request )
    {
        $columns = config('tablas')['aide_action_origine'];
        
        $relations = [
            // '',
        ];

        $datos = AideActionOrigine::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {

                            })
                            ->toJson();
    }

    public function get_tabla_aide_action_resultat( Request $request )
    {
        $columns = config('tablas')['aide_action_resultat'];
        
        $relations = [
            // '',
        ];

        $datos = AideActionResultat::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {

                            })
                            ->toJson();
    }

    public function get_tabla_aide_affaire_objections( Request $request )
    {
        $columns = config('tablas')['aide_affaire_objections'];
        
        $relations = [
            // '',
        ];

        $datos = AideAffaireObjection::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {

                            })
                            ->toJson();
    }

    public function get_tabla_aide_affaire_perte( Request $request )
    {
        $columns = config('tablas')['aide_affaire_perte'];
        
        $relations = [
            // '',
        ];

        $datos = AideAffairePerte::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {

                            })
                            ->toJson();
    }

    public function get_tabla_aide_affaire_phase( Request $request )
    {
        $columns = config('tablas')['aide_affaire_phase'];
        
        $relations = [
            // '',
        ];

        $datos = AideAffairePhase::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {

                            })
                            ->toJson();
    }

    public function get_tabla_aide_affaire_statut( Request $request )
    {
        $columns = config('tablas')['aide_affaire_statut'];
        
        $relations = [
            // '',
        ];

        $datos = AideAffaireStatut::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {

                            })
                            ->toJson();
    }

    public function get_tabla_aide_affaire_year( Request $request )
    {
        $columns = config('tablas')['aide_affaire_year'];
        
        $relations = [
            // '',
        ];

        $datos = AideAffaireYear::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {

                            })
                            ->toJson();
    }

    public function get_tabla_aide_article_famille( Request $request )
    {
        $columns = config('tablas')['aide_article_famille'];
        
        $relations = [
            // '',
        ];

        $datos = AideArticleFamille::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {

                            })
                            ->toJson();
    }

    public function get_tabla_aide_article_provider( Request $request )
    {
        $columns = config('tablas')['aide_article_provider'];
        
        $relations = [
            // '',
        ];

        $datos = AideArticleProvider::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {

                            })
                            ->toJson();
    }

    public function get_tabla_aide_contact_civilite( Request $request )
    {
        $columns = config('tablas')['aide_contact_civilite'];
        
        $relations = [
            // '',
        ];

        $datos = AideContactCivilite::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {

                            })
                            ->toJson();
    }

    public function get_tabla_aide_contact_fonction( Request $request )
    {
        $columns = config('tablas')['aide_contact_fonction'];
        
        $relations = [
            // '',
        ];

        $datos = AideContactFonction::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {

                            })
                            ->toJson();
    }

    public function get_tabla_aide_contact_language( Request $request )
    {
        $columns = config('tablas')['aide_contact_language'];
        
        $relations = [
            // '',
        ];

        $datos = AideContactLanguage::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {

                            })
                            ->toJson();
    }

    public function get_tabla_aide_contact_service( Request $request )
    {
        $columns = config('tablas')['aide_contact_service'];
        
        $relations = [
            // '',
        ];

        $datos = AideContactService::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {

                            })
                            ->toJson();
    }

    public function get_tabla_aide_contrat_entity( Request $request )
    {
        $columns = config('tablas')['aide_contrat_entity'];
        
        $relations = [
            // '',
        ];

        $datos = AideContratEntity::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {

                            })
                            ->toJson();
    }

    public function get_tabla_aide_contrat_mode_signature( Request $request )
    {
        $columns = config('tablas')['aide_contrat_mode_signature'];
        
        $relations = [
            // '',
        ];

        $datos = AideContratModeSignature::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {

                            })
                            ->toJson();
    }

    public function get_tabla_aide_contrat_statut( Request $request )
    {
        $columns = config('tablas')['aide_contrat_statut'];
        
        $relations = [
            // '',
        ];

        $datos = AideContratStatut::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {

                            })
                            ->toJson();
    }

    public function get_tabla_aide_contrat_type( Request $request )
    {
        $columns = config('tablas')['aide_contrat_type'];
        
        $relations = [
            // '',
        ];

        $datos = AideContratType::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {

                            })
                            ->toJson();
    }

    public function get_tabla_aide_contrat_type_reconduction( Request $request )
    {
        $columns = config('tablas')['aide_contrat_type_reconduction'];
        
        $relations = [
            // '',
        ];

        $datos = AideContratTypeReconduction::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {

                            })
                            ->toJson();
    }

    public function get_tabla_aide_events_qualification( Request $request )
    {
        $columns = config('tablas')['aide_events_qualification'];
        
        $relations = [
            // '',
        ];

        $datos = AideEventsQualification::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {

                            })
                            ->toJson();
    }

    public function get_tabla_aide_events_status( Request $request )
    {
        $columns = config('tablas')['aide_events_status'];
        
        $relations = [
            // '',
        ];

        $datos = AideEventsStatu::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {

                            })
                            ->toJson();
    }

    public function get_tabla_aide_famille_indicators( Request $request )
    {
        $columns = config('tablas')['aide_famille_indicators'];
        
        $relations = [
            // '',
        ];

        $datos = AideFamilleIndicator::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {

                            })
                            ->toJson();
    }

    public function get_tabla_aide_international_responsible( Request $request )
    {
        $columns = config('tablas')['aide_international_responsible'];
        
        $relations = [
            // '',
        ];

        $datos = AideInternationalResponsible::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {

                            })
                            ->toJson();
    }

    public function get_tabla_aide_international_sector( Request $request )
    {
        $columns = config('tablas')['aide_international_sector'];
        
        $relations = [
            // '',
        ];

        $datos = AideInternationalSector::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {

                            })
                            ->toJson();
    }

    public function get_tabla_aide_mission_sous_motif1( Request $request )
    {
        $columns = config('tablas')['aide_mission_sous_motif1'];
        
        $relations = [
            // '',
        ];

        $datos = AideMissionSousMotif1::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {

                            })
                            ->toJson();
    }

    public function get_tabla_aide_mission_sous_motif2( Request $request )
    {
        $columns = config('tablas')['aide_mission_sous_motif2'];
        
        $relations = [
            // '',
        ];

        $datos = AideMissionSousMotif2::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {

                            })
                            ->toJson();
    }

    public function get_tabla_aide_offre_condition( Request $request )
    {
        $columns = config('tablas')['aide_offre_condition'];
        
        $relations = [
            // '',
        ];

        $datos = AideOffreCondition::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {

                            })
                            ->toJson();
    }

    public function get_tabla_aide_renumeration_type( Request $request )
    {
        $columns = config('tablas')['aide_renumeration_type'];
        
        $relations = [
            // '',
        ];

        $datos = AideRemunerationType::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {

                            })
                            ->toJson();
    }

    public function get_tabla_aide_societe_ca( Request $request )
    {
        $columns = config('tablas')['aide_societe_ca'];
        
        $relations = [
            // '',
        ];

        $datos = AideSocieteCa::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {

                            })
                            ->toJson();
    }

    public function get_tabla_aide_societe_commune( Request $request )
    {
        $columns = config('tablas')['aide_societe_commune'];
        
        $relations = [
            // '',
        ];

        $datos = AideSocieteComune::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {

                            })
                            ->toJson();
    }

    public function get_tabla_aide_societe_company_classification( Request $request )
    {
        $columns = config('tablas')['aide_societe_company_classification'];
        
        $relations = [
            // '',
        ];

        $datos = AideSocieteCompanyClassification::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {

                            })
                            ->toJson();
    }

    public function get_tabla_aide_societe_effectif( Request $request )
    {
        $columns = config('tablas')['aide_societe_effectif'];
        
        $relations = [
            // '',
        ];

        $datos = AideSocieteEffectif::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {

                            })
                            ->toJson();
    }

    public function get_tabla_aide_societe_forme_juridique( Request $request )
    {
        $columns = config('tablas')['aide_societe_forme_juridique'];
        
        $relations = [
            // '',
        ];

        $datos = AideSocieteFormeJuridique::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {

                            })
                            ->toJson();
    }

    public function get_tabla_aide_societe_naf( Request $request )
    {
        $columns = config('tablas')['aide_societe_naf'];
        
        $relations = [
            // '',
        ];

        $datos = AideSocieteNaf::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {

                            })
                            ->toJson();
    }

    public function get_tabla_aide_societe_origine( Request $request )
    {
        $columns = config('tablas')['aide_societe_origine'];
        
        $relations = [
            // '',
        ];

        $datos = AideSocieteOrigine::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {

                            })
                            ->toJson();
    }

    public function get_tabla_aide_societe_payroll_outsourcer_type( Request $request )
    {
        $columns = config('tablas')['aide_societe_payroll_outsourcer_type'];
        
        $relations = [
            // '',
        ];

        $datos = AideSocietePayrollOutsourcerType::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {

                            })
                            ->toJson();
    }

    public function get_tabla_aide_societe_pays( Request $request )
    {
        $columns = config('tablas')['aide_societe_pays'];
        
        $relations = [
            // '',
        ];

        $datos = AideSocietePay::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {

                            })
                            ->toJson();
    }

    public function get_tabla_aide_societe_secteur_geo( Request $request )
    {
        $columns = config('tablas')['aide_societe_secteur_geo'];
        
        $relations = [
            // '',
        ];

        $datos = AideSocieteSecteurGeo::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {

                            })
                            ->toJson();
    }

    public function get_tabla_aide_societe_segment( Request $request )
    {
        $columns = config('tablas')['aide_societe_segment'];
        
        $relations = [
            // '',
        ];

        $datos = AideSocieteSegment::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {

                            })
                            ->toJson();
    }

    public function get_tabla_aide_societe_situation_juridique( Request $request )
    {
        $columns = config('tablas')['aide_societe_situation_juridique'];
        
        $relations = [
            // '',
        ];

        $datos = AideSocieteSituationJuridique::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {

                            })
                            ->toJson();
    }

    public function get_tabla_aide_societe_sub_sector_geo( Request $request )
    {
        $columns = config('tablas')['aide_societe_sub_sector_geo'];
        
        $relations = [
            // '',
        ];

        $datos = AideSocieteSubSectorGeo::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {

                            })
                            ->toJson();
    }

    public function get_tabla_aide_societe_type( Request $request )
    {
        $columns = config('tablas')['aide_societe_type'];
        
        $relations = [
            // '',
        ];

        $datos = AideSocieteType::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {

                            })
                            ->toJson();
    }

    public function get_tabla_aide_societe_typeadr( Request $request )
    {
        $columns = config('tablas')['aide_societe_typeadr'];
        
        $relations = [
            // '',
        ];

        $datos = AideSocieteTypeAdr::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {

                            })
                            ->toJson();
    }

}
