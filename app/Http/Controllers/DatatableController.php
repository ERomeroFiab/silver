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
            'identification',
            'contrat',
            'affaire',
            'contact',
            'mission',
            'action_intervenants_fiabilis',
            'documents',
        ];
        
        return DataTables::eloquent( Action::query()->withCount( $relations ) )
                            ->filter(function ($query) use ($request, $columns) {

                                foreach ($columns as $column) { // filtro por llaves foráneas
                            
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

                                //filtros Tabla: action
                                if ($request->get("SEARCH_BY_CATEGORIE") !== null){
                                    $query->where("CATEGORIE","like","%" . $request->get('SEARCH_BY_CAEGORIE') . "%");
                                }

                                if ($request->get("SEARCH_BY_EMPLACEMENT") !== null){
                                    $query->where("EMPLACEMENT","like","%" . $request->get('SEARCH_BY_EMPLACEMENT') . "%");
                                }

                                if ($request->get("SEARCH_BY_E_MAIL") !== null){
                                    $query->where("E_MAIL","like","%" . $request->get('SEARCH_BY_E_MAIL') . "%");
                                }

                                if ($request->get("SEARCH_BY_NOM") !== null){
                                    $query->where("NOM","like","%" . $request->get('SEARCH_BY_NOM') . "%");
                                }

                                if ($request->get("SEARCH_BY_NOTE") !== null){
                                    $query->where("NOTE","like","%" . $request->get('SEARCH_BY_NOTE') . "%");
                                }

                                if ($request->get("SEARCH_BY_RESULTAT") !== null){
                                    $query->where("RESULTAT","like","%" . $request->get('SEARCH_BY_RESULTAT') . "%");
                                }

                                if ($request->get("SEARCH_BY_SUIVI_PAR") !== null){
                                    $query->where("SUIVI_PAR","like","%" . $request->get('SEARCH_BY_SUIVI_PAR') . "%");
                                }

                                if ($request->get("SEARCH_BY_TYPE_EVENEMENT") !== null){
                                    $query->where("TYPE_EVENEMENT","like","%" . $request->get('SEARCH_BY_TYPE_EVENEMENT') . "%");
                                }

                                if ($request->get("SEARCH_BY_SYS_DATE_MODIFICATION") !== null){
                                    $query->where("SYS_DATE_MODIFICATION","like","%" . $request->get('SEARCH_BY_SYS_DATE_MODIFICATION') . "%");
                                }

                                if ($request->get("SEARCH_BY_RUT") !== null){

                                    $palabra = "%".$request->get("SEARCH_BY_RUT")."%";

                                    $query->whereHas('identification', function($q) use ($palabra){
                                        $q->where('SIRET', 'like', $palabra);
                                    });

                                }

                                if ($request->get("SEARCH_BY_RAZON_SOCIAL") !== null){
                                    $query->where("RAZON_SOCIAL","like","%" . $request->get('SEARCH_BY_RAZON_SOCIAL') . "%");
                                }


                            })
                            ->addColumn('rut', function ($dato) {
                                if ( $dato->identification ) {
                                    return $dato->identification->SIRET;
                                }
                                return "-"; 
                            })
                            ->addColumn('razon_social', function ($dato) {
                                if ( $dato->identification ) {
                                    return $dato->identification->RAISON_SOC;
                                }
                                return "-";
                            })
                            ->addColumn('action', function ($dato) {
                                return '<a href="'.route('action.show', ['id_action' => $dato->ID_ACTION]).'" class="btn btn-sm btn-info"><i class="fa-solid fa-eye"></i></a>';
                            })
                            ->toJson();
    }

    public function get_tabla_action_intervenants_fiabilis( Request $request)
    {
        $columns = config('tablas')['action_intervenants_fiabilis'];

        $relations = [
            // 'action',
        ];
        
        $starts = $request->get('SEARCH_BY_SYS_DATE_MODIFICATION_DESDE') ? Carbon::parse( $request->get('SEARCH_BY_SYS_DATE_MODIFICATION_DESDE') ) : Carbon::now('America/Santiago')->setTimeZone('America/Santiago')->subYears(100);
        
        $ends = $request->get('SEARCH_BY_SYS_DATE_MODIFICATION_HASTA') ? Carbon::parse( $request->get('SEARCH_BY_SYS_DATE_MODIFICATION_HASTA') ) : Carbon::now('America/Santiago')->setTimeZone('America/Santiago')->addYears(100);

        return DataTables::eloquent( ActionIntervenantsFiabilis::query() )
                            ->filter(function ($query) use ($request, $columns, $starts, $ends){
                                
                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

                                if($request->get("SEARCH_BY_ID_ACTION_INTERVENANTS_FIABILIS")!==null){
                                    $query->where("ID_ACTION_INTERVENANTS_FIABILIS","like","%".$request->get("SEARCH_BY_ID_ACTION_INTERVENANTS_FIABILIS")."%");
                                }

                                if($request->get("SEARCH_BY_LOGIN")!==null){
                                    $query->where("LOGIN","like","%".$request->get("SEARCH_BY_LOGIN")."%");
                                }

                                if($request->get("SEARCH_BY_PID_ACTION")!==null){
                                    $query->where("PID_ACTION","like","%".$request->get("SEARCH_BY_PID_ACTION")."%");
                                }

                                if($request->get("SEARCH_BY_SYS_DATE_CREATION")!==null){
                                    $query->where("SYS_DATE_CREATION","like","%".$request->get("SEARCH_BY_SYS_DATE_CREATION")."%");
                                }

                                $query->whereBetween('SYS_DATE_MODIFICATION', [$starts, $ends]);

                                if($request->get("SEARCH_BY_SYS_HEURE_CREATION")!==null){
                                    $query->where("SYS_HEURE_CREATION","like","%".$request->get("SEARCH_BY_SYS_HEURE_CREATION")."%");
                                }

                                if($request->get("SEARCH_BY_SYS_HEURE_MODIFICATION")!==null){
                                    $query->where("SYS_HEURE_MODIFICATION","like","%".$request->get("SEARCH_BY_SYS_HEURE_MODIFICATION")."%");
                                }

                                if($request->get("SEARCH_BY_SYS_USER_CREATION")!==null){
                                    $query->where("SYS_USER_CREATION","like","%".$request->get("SEARCH_BY_SYS_USER_CREATION")."%");
                                }

                                if($request->get("SEARCH_BY_SYS_USER_MODIFICATION")!==null){
                                    $query->where("SYS_USER_MODIFICATION","like","%".$request->get("SEARCH_BY_SYS_USER_MODIFICATION")."%");
                                }

                                

                            })
                            ->addColumn('action', function ($dato) {
                                return '<a href="'.route('action_intervenants_fiabilis.show', ['id_action_intervenants_fiabilis' => $dato->ID_ACTION_INTERVENANTS_FIABILIS]).'" class="btn btn-sm btn-info"><i class="fa-solid fa-eye"></i></a>';
                            })
                            ->toJson();
    }

    public function get_tabla_affaire( Request $request )
    {
        $columns = config('tablas')['affaire'];

        $relations = [
            'identification',
            'contrat',
            'contact',
            'actions',
            'affaire_conditions_financieres',
            'affaire_objections',
            'documents',
            'historique_maj_affaire',
        ];

        $datos = Affaire::select( $columns )->with( $relations )->withCount( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request, $columns) {
                                
                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }
                                //filtros Tabla: affaire
                                if ($request->get("SEARCH_BY_ID_AFFAIRE") !== null){
                                    $query->where("ID_AFFAIRE","like","%" . $request->get('SEARCH_BY_ID_AFFAIRE') . "%");
                                }

                                if ($request->get("SEARCH_BY_CIVILITE") !== null){
                                    $query->where("CIVILITE","like","%" . $request->get('SEARCH_BY_CIVILITE') . "%");
                                }

                                if ($request->get("SEARCH_BY_DATE_PREVISIONNEL") !== null){
                                    $query->where("DATE_PREVISIONNEL","like","%" . $request->get('SEARCH_BY_DATE_PREVISIONNEL') . "%");
                                }

                                if ($request->get("SEARCH_BY_DATE_SIGNATURE") !== null){
                                    $query->where("DATE_SIGNATURE","like","%" . $request->get('SEARCH_BY_DATE_SIGNATURE') . "%");
                                }

                                if ($request->get("SEARCH_BY_FAMILLE") !== null){
                                    $query->where("FAMILLE","like","%" . $request->get('SEARCH_BY_FAMILLE') . "%");
                                }

                                if ($request->get("SEARCH_BY_PRENOM") !== null){
                                    $query->where("PRENOM","like","%" . $request->get('SEARCH_BY_PRENOM') . "%");
                                }

                                if ($request->get("SEARCH_BY_NOM") !== null){
                                    $query->where("NOM","like","%" . $request->get('SEARCH_BY_NOM') . "%");
                                }

                                if ($request->get("SEARCH_BY_NO_AFFAIRE") !== null){
                                    $query->where("NO_AFFAIRE","like","%" . $request->get('SEARCH_BY_NO_AFFAIRE') . "%");
                                }

                                if ($request->get("SEARCH_BY_PHASE") !== null){
                                    $query->where("PHASE","like","%" . $request->get('SEARCH_BY_PHASE') . "%");
                                }

                                
                                if ($request->get("SEARCH_BY_PROBABILITE") !== null){
                                    $query->where("PROBABILITE","like","%" . $request->get('SEARCH_BY_PROBABILITE') . "%");
                                }

                                if ($request->get("SEARCH_BY_PRODUIT") !== null){
                                    $query->where("PRODUIT","like","%" . $request->get('SEARCH_BY_PRODUIT') . "%");
                                }

                                if ($request->get("SEARCH_BY_STATUT") !== null){
                                    $query->where("STATUT","like","%" . $request->get('SEARCH_BY_STATUT') . "%");
                                }

                                if ($request->get("SEARCH_BY_SUIVI_PAR") !== null){
                                    $query->where("SUIVI_PAR","like","%" . $request->get('SEARCH_BY_SUIVI_PAR') . "%");
                                }

                                if ($request->get("SEARCH_BY_TOTAL_PREVISIONNEL") !== null){
                                    $query->where("TOTAL_PREVISIONNEL","like","%" . $request->get('SEARCH_BY_TOTAL_PREVISIONNEL') . "%");
                                }

                                if ( $request->get('SEARCH_BY_ACTIONS_COUNT') !== null ) {
                                    $query->having('ACTIONS_COUNT', strval($request->get('SEARCH_BY_ACTIONS_COUNT')));
                                }



                                if ($request->get("SEARCH_BY_RUT") !== null){
                                    $palabra = "%".$request->get("SEARCH_BY_RUT")."%";
                                    $query->whereHas('identification', function($q) use ($palabra){
                                        $q->where('SIRET', 'like', $palabra);
                                    });
                                }

                                if ($request->get("SEARCH_BY_RAZON_SOCIAL") !== null){
                                    $palabra = "%".$request->get("SEARCH_BY_RAZON_SOCIAL")."%";
                                    $query->whereHas('identification', function($q) use ($palabra){
                                        $q->where('RAISON_SOC', 'like', $palabra);
                                    });
                                }

                                if ($request->get("SEARCH_BY_SYS_DATE_MODIFICATION") !== null){
                                    $query->where("SYS_DATE_MODIFICATION","like","%" . $request->get('SEARCH_BY_SYS_DATE_MODIFICATION') . "%");
                                }

                            })
                            ->addColumn('rut', function ($dato) {
                                if ( $dato->identification ) {
                                    return $dato->identification->SIRET;
                                }
                                return "-";
                            })
                            ->addColumn('razon_social', function ($dato) {
                                if ( $dato->identification ) {
                                    return $dato->identification->RAISON_SOC;
                                }
                                return "-";
                            })
                            ->addColumn('action', function ($dato) {
                                return '<a href="'.route('affaire.show', ['id_affaire' => $dato->ID_AFFAIRE]).'" class="btn btn-sm btn-info"><i class="fa-solid fa-eye"></i></a>';
                            })
                            ->toJson();
    }

    public function get_tabla_identification( Request $request )
    {
        $columns = config('tablas')['identification'];

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
        
        return DataTables::eloquent( Identification::query()->withCount($relations) )
                            ->filter(function ($query) use ($request, $columns) {

                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }
                                
                                if ( $request->get('SEARCH_BY_ID_IDENTIFICATION') !== null ) {
                                    $query->where('ID_IDENTIFICATION',"like","%".$request->get('SEARCH_BY_ID_IDENTIFICATION')."%");
                                }
                                
                                if ( $request->get('SEARCH_BY_SIRET') !== null ) {
                                    $query->where('SIRET',"like","%".$request->get('SEARCH_BY_SIRET')."%");
                                }
                                
                                if ( $request->get('SEARCH_BY_ADRESSE1') !== null ) {
                                    $query->where('ADRESSE1', 'like', "%".$request->get('SEARCH_BY_ADRESSE1')."%");
                                }
                                
                                if ( $request->get('SEARCH_BY_AUDITEUR') !== null ) {
                                    $query->where('AUDITEUR', 'like', "%".$request->get('SEARCH_BY_AUDITEUR')."%");
                                }
                                
                                if ( $request->get('SEARCH_BY_EFFECTIF') !== null ) {
                                    $query->where('EFFECTIF','like', "%".$request->get('SEARCH_BY_EFFECTIF')."%");
                                }
                                
                                if ( $request->get('SEARCH_BY_GROUP') !== null ) {
                                    $query->where('GROUP', 'like', "%".$request->get('SEARCH_BY_GROUP')."%");
                                }
                                
                                if ( $request->get('SEARCH_BY_RAISON_SOC') !== null ) {
                                    $query->where('RAISON_SOC', 'like', "%".$request->get('SEARCH_BY_RAISON_SOC')."%");
                                }
                                
                                if ( $request->get('SEARCH_BY_TYPE_FICHE') !== null ) {
                                    $query->where('TYPE_FICHE',"like","%".$request->get('SEARCH_BY_TYPE_FICHE')."%");
                                }
                                
                                if ( $request->get('SEARCH_BY_VILLE') !== null ) {
                                    $query->where('VILLE',"like","%".$request->get('SEARCH_BY_VILLE')."%");
                                }

                            })
                            ->addColumn('action', function ($dato) {
                                return '<a href="'.route('identification.show', ['id_identification' => $dato->ID_IDENTIFICATION]).'" class="btn btn-sm btn-info"><i class="fa-solid fa-eye"></i></a>';
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
                            ->filter(function ($query) use ($request, $columns) {
                                
                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }
                                if ( $request->get('SEARCH_BY_E_MAIL') !== null ) {
                                    $query->where('E_MAIL',"like","%".$request->get('SEARCH_BY_E_MAIL')."%");
                                }

                                if ( $request->get('SEARCH_BY_E_MAIL_FACTURATION') !== null ) {
                                    $query->where('E_MAIL_FACTURATION',"like","%".$request->get('SEARCH_BY_E_MAIL_FACTURATION')."%");
                                }

                                if ( $request->get('SEARCH_BY_MULTI_ENTITY') !== null ) {
                                    $query->where('MULTI_ENTITY',"like","%".$request->get('SEARCH_BY_MULTI_ENTITY')."%");
                                }

                                if ( $request->get('SEARCH_BY_NOM') !== null ) {
                                    $query->where('NOM',"like","%".$request->get('SEARCH_BY_NOM')."%");
                                }

                                if ( $request->get('SEARCH_BY_NOM_FACTURATION') !== null ) {
                                    $query->where('NOM_FACTURATION',"like","%".$request->get('SEARCH_BY_NOM_FACTURATION')."%");
                                }

                                if ( $request->get('SEARCH_BY_NO_CONTRAT') !== null ) {
                                    $query->where('NO_CONTRAT',"like","%".$request->get('SEARCH_BY_NO_CONTRAT')."%");
                                }

                                if ( $request->get('SEARCH_BY_NO_CONTRAT_ORIGINE') !== null ) {
                                    $query->where('NO_CONTRAT_ORIGINE',"like","%".$request->get('SEARCH_BY_NO_CONTRAT_ORIGINE')."%");
                                }

                                if ( $request->get('SEARCH_BY_NO_ENTITY') !== null ) {
                                    $query->where('NO_ENTITY',"like","%".$request->get('SEARCH_BY_NO_ENTITY')."%");
                                }

                                if ( $request->get('SEARCH_BY_STATUT') !== null ) {
                                    $query->where('STATUT',"like","%".$request->get('SEARCH_BY_STATUT')."%");
                                }

                                if ( $request->get('SEARCH_BY_SUIVI_PAR') !== null ) {
                                    $query->where('SUIVI_PAR',"like","%".$request->get('SEARCH_BY_SUIVI_PAR')."%");
                                }

                                if ( $request->get('SEARCH_BY_DATE_FIN_CONTRAT') !== null ) {
                                    $query->where('DATE_FIN_CONTRAT',"like","%".$request->get('SEARCH_BY_DATE_FIN_CONTRAT')."%");
                                }

                                if ( $request->get('SEARCH_BY_DATE_SIGNATURE_CLIENT') !== null ) {
                                    $query->where('DATE_SIGNATURE_CLIENT',"like","%".$request->get('SEARCH_BY_DATE_SIGNATURE_CLIENT')."%");
                                }

                            })
                            ->addColumn('action', function ($dato) {
                                return '<a href="'.route('contrat.show', ['id_contrat' => $dato->ID_CONTRAT]).'" class="btn btn-sm btn-info"><i class="fa-solid fa-eye"></i></a>';
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
                            ->filter(function ($query) use ($request, $columns) {
                                
                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

                                if ( $request->get('SEARCH_BY_DOCUMENT_FICHIER_NOM') !== null ) {
                                    $query->where('DOCUMENT_FICHIER_NOM',"like","%".$request->get('SEARCH_BY_DOCUMENT_FICHIER_NOM')."%");
                                }

                                if ( $request->get('SEARCH_BY_DOCUMENT_FICHIER_DATE') !== null ) {
                                    $query->where('DOCUMENT_FICHIER_DATE',"like","%".$request->get('SEARCH_BY__DOCUMENT_FICHIER_DATE')."%");
                                }

                                if ( $request->get('SEARCH_BY_DOCUMENT_FICHIER_TAILLE') !== null ) {
                                    $query->where('DOCUMENT_FICHIER_TAILLE',"like","%".$request->get('SEARCH_BY_DOCUMENT_FICHIER_TAILLE')."%");
                                }

                                if ( $request->get('SEARCH_BY_DOCUMENT_FICHIER_TYPE') !== null ) {
                                    $query->where('DOCUMENT_FICHIER_TYPE',"like","%".$request->get('SEARCH_BY_DOCUMENT_FICHIER_TYPE')."%");
                                }
                                if ( $request->get('SEARCH_BY_ORIGINE') !== null ) {
                                    $query->where('ORIGINE',"like","%".$request->get('SEARCH_BY_ORIGINE')."%");
                                }

                                if ( $request->get('SEARCH_BY_SYS_DATE_CREATION') !== null ) {
                                    $query->where('SYS_DATE_CREATION',"like","%".$request->get('SEARCH_BY_SYS_DATE_CREATION')."%");
                                }

                            })
                            ->addColumn('action', function ($dato) {
                                return '<a href="'.route('documents.show', ['id_document' => $dato->ID_DOCUMENTS]).'" class="btn btn-sm btn-info"><i class="fa-solid fa-eye"></i></a>';
                            })
                            ->toJson();
    }

    public function get_tabla_contact( Request $request )
    {
        $columns = config('tablas')['contact'];
        
        $relations = [
            'identification',
            'actions',
            'affaires',
            'contrats',
            'documents',
        ];

        $datos = Contact::select( $columns )->with( $relations );
        $starts = $request->get('SEARCH_BY_SYS_DATE_MODIFICATION_DESDE') ? Carbon::parse( $request->get('SEARCH_BY_SYS_DATE_MODIFICATION_DESDE') ) : Carbon::now('America/Santiago')->setTimeZone('America/Santiago')->subYears(100);
        $ends = $request->get('SEARCH_BY_SYS_DATE_MODIFICATION_HASTA') ? Carbon::parse( $request->get('SEARCH_BY_SYS_DATE_MODIFICATION_HASTA') ) : Carbon::now('America/Santiago')->setTimeZone('America/Santiago')->addYears(100);

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request, $columns,$starts,$ends) {
                                
                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

                                if ( $request->get('SEARCH_BY_E_MAIL') !== null ) {
                                    $query->where('E_MAIL',"like","%".$request->get('SEARCH_BY_E_MAIL')."%");
                                }

                                if ( $request->get('SEARCH_BY_NOM') !== null ) {
                                    $query->where('NOM',"like","%".$request->get('SEARCH_BY_NOM')."%");
                                }

                                if ( $request->get('SEARCH_BY_SERVICE') !== null ) {
                                    $query->where('SERVICE',"like","%".$request->get('SEARCH_BY_SERVICE')."%");
                                }

                                if ( $request->get('SEARCH_BY_FONCTION') !== null ) {
                                    $query->where('FONCTION',"like","%".$request->get('SEARCH_BY_FONCTION')."%");
                                }

                                if ( $request->get('SEARCH_BY_CONTACT_PRINCIPAL') !== null ) {
                                    $query->where('CONTACT_PRINCIPAL',"like","%".$request->get('SEARCH_BY_CONTACT_PRINCIPAL')."%");
                                }

                                if ( $request->get('SEARCH_BY_CONTACT_PRINCIPAL') !== null ) {
                                    $query->where('CONTACT_PRINCIPAL',"like","%".$request->get('SEARCH_BY_CONTACT_PRINCIPAL')."%");
                                }
                                
                                if ($request->get("SEARCH_BY_RUT") !== null){
                                    $palabra = "%".$request->get("SEARCH_BY_RUT")."%";
                                    $query->whereHas('identification', function($q) use ($palabra){
                                        $q->where('SIRET', 'like', $palabra);
                                    });
                                }

                                if ($request->get("SEARCH_BY_RAZON_SOCIAL") !== null){
                                    $palabra = "%".$request->get("SEARCH_BY_RAZON_SOCIAL")."%";
                                    $query->whereHas('identification', function($q) use ($palabra){
                                        $q->where('RAISON_SOC', 'like', $palabra);
                                    });
                                }

                                $query->whereBetween('SYS_DATE_MODIFICATION', [$starts, $ends]);

                            })
                            ->addColumn('rut', function ($dato) {
                                if ( $dato->identification ) {
                                    return $dato->identification->SIRET;
                                }
                                return "-";
                            })
                            ->addColumn('razon_social', function ($dato) {
                                if ( $dato->identification ) {
                                    return $dato->identification->RAISON_SOC;
                                }
                                return "-";
                            })
                            ->addColumn('action', function ($dato) {
                                return '<a href="'.route('contact.show', ['id_contact' => $dato->ID_CONTACT]).'" class="btn btn-sm btn-info"><i class="fa-solid fa-eye"></i></a>';
                            })
                            ->toJson();
    }

    public function get_tabla_contrat_detail_produit( Request $request )
    {
        $columns = config('tablas')['contrat_detail_produit'];
        
        $relations = [
            'identification',
            'contrat',
            'contrat_partiel_condition_fiancieres',
            'missions',
        ];

        $datos = ContratDetailProduit::select( $columns )->with( $relations )->withCount( $relations );
        $starts = $request->get('SEARCH_BY_SYS_DATE_MODIFICATION_DESDE') ? Carbon::parse( $request->get('SEARCH_BY_SYS_DATE_MODIFICATION_DESDE') ) : Carbon::now('America/Santiago')->setTimeZone('America/Santiago')->subYears(100);
        $ends = $request->get('SEARCH_BY_SYS_DATE_MODIFICATION_HASTA') ? Carbon::parse( $request->get('SEARCH_BY_SYS_DATE_MODIFICATION_HASTA') ) : Carbon::now('America/Santiago')->setTimeZone('America/Santiago')->addYears(100);
        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request, $columns,$starts,$ends) {
                                
                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }
                                
                                if ( $request->get('SEARCH_BY_NO_CONTRAT_PARTIEL') !== null ) {
                                    $query->where('NO_CONTRAT_PARTIEL',"like","%".$request->get('SEARCH_BY_NO_CONTRAT_PARTIEL')."%");
                                }

                                if ( $request->get('SEARCH_BY_PRODUIT') !== null ) {
                                    $query->where('PRODUIT',"like","%".$request->get('SEARCH_BY_PRODUIT')."%");
                                }

                                if ($request->get("SEARCH_BY_RUT") !== null){
                                    $palabra = "%".$request->get("SEARCH_BY_RUT")."%";
                                    $query->whereHas('identification', function($q) use ($palabra){
                                        $q->where('SIRET', 'like', $palabra);
                                    });
                                }

                                $query->whereBetween('SYS_DATE_MODIFICATION', [$starts, $ends]);

                                if ( $request->get('SEARCH_BY_CANTIDAD_DE_MISIONS') !== null ) {
                                    $query->where('CANTIDAD_DE_MISIONS',"like","%".$request->get('SEARCH_BY_CANTIDAD_DE_MISIONS')."%");
                                }
                                
                                
                            })
                            ->addColumn('rut', function($dato){
                                return $dato->identification->SIRET;
                            })
                            ->addColumn('action', function ($dato) {
                                return '<a href="'.route('contrat_detail_produit.show', ['id_contrat_detail_produit' => $dato->ID_CONTRAT_DETAIL_PRODUIT]).'" class="btn btn-sm btn-info"><i class="fa-solid fa-eye"></i></a>';
                            })
                            ->toJson();
    }

    public function get_tabla_identification_note( Request $request )
    {
        $columns = config('tablas')['identification_note'];
        
        $relations = [
            'identification',
        ];

        $datos = IdentificationNote::select( $columns )->with( $relations );
        $starts = $request->get('SEARCH_BY_SYS_DATE_MODIFICATION_DESDE') ? Carbon::parse( $request->get('SEARCH_BY_SYS_DATE_MODIFICATION_DESDE') ) : Carbon::now('America/Santiago')->setTimeZone('America/Santiago')->subYears(100);
        $ends = $request->get('SEARCH_BY_SYS_DATE_MODIFICATION_HASTA') ? Carbon::parse( $request->get('SEARCH_BY_SYS_DATE_MODIFICATION_HASTA') ) : Carbon::now('America/Santiago')->setTimeZone('America/Santiago')->addYears(100);

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request, $columns,$starts,$ends) {
                                
                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

                                if ( $request->get('SEARCH_BY_KOMPASS_ID') !== null ) {
                                    $query->where('KOMPASS_ID',"like","%".$request->get('SEARCH_BY_KOMPASS_ID')."%");
                                }

                                if ( $request->get('SEARCH_BY_NOTE') !== null ) {
                                    $query->where('NOTE',"like","%".$request->get('SEARCH_BY_NOTE')."%");
                                }

                                if ( $request->get('SEARCH_BY_SYS_DATE_CREATION') !== null ) {
                                    $query->where('SYS_DATE_CREATION',"like","%".$request->get('SEARCH_BY_SYS_DATE_CREATION')."%");
                                }

                                if ($request->get("SEARCH_BY_RUT") !== null){
                                    $palabra = "%".$request->get("SEARCH_BY_RUT")."%";
                                    $query->whereHas('identification', function($q) use ($palabra){
                                        $q->where('SIRET', 'like', $palabra);
                                    });
                                }

                                if ($request->get("SEARCH_BY_RAZON_SOCIAL") !== null){
                                    $palabra = "%".$request->get("SEARCH_BY_RAZON_SOCIAL")."%";
                                    $query->whereHas('identification', function($q) use ($palabra){
                                        $q->where('RAISON_SOC', 'like', $palabra);
                                    });
                                }

                                $query->whereBetween('SYS_DATE_MODIFICATION', [$starts, $ends]);

                            })
                            ->addColumn('rut', function($dato){
                                if ( $dato->identification ) {
                                    return $dato->identification->SIRET;
                                }
                                return "-";
                            })
                            ->addColumn('razon_social', function($dato){
                                if ( $dato->identification ) {
                                    return $dato->identification->RAISON_SOC;
                                }
                                return "-";
                            })
                            ->addColumn('action', function ($dato) {
                                return '<a href="'.route('identification_note.show', ['id_identification_note' => $dato->ID_IDENTIFICATION_NOTE]).'" class="btn btn-sm btn-info"><i class="fa-solid fa-eye"></i></a>';
                            })
                            ->toJson();
    }

    public function get_tabla_invoice( Request $request )
    {
        $columns = config('tablas')['invoice'];
        
        $relations = [
            'identification',
            'contrat',
            'documents',
            'invoice_lignes',
        ];

        $datos = Invoice::select( $columns )->with( $relations );
        $starts = $request->get('SEARCH_BY_SYS_DATE_MODIFICATION_DESDE') ? Carbon::parse( $request->get('SEARCH_BY_SYS_DATE_MODIFICATION_DESDE') ) : Carbon::now('America/Santiago')->setTimeZone('America/Santiago')->subYears(100);
        $ends = $request->get('SEARCH_BY_SYS_DATE_MODIFICATION_HASTA') ? Carbon::parse( $request->get('SEARCH_BY_SYS_DATE_MODIFICATION_HASTA') ) : Carbon::now('America/Santiago')->setTimeZone('America/Santiago')->addYears(100);

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request, $columns,$starts,$ends) {
                                
                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }
                                if ( $request->get('SEARCH_BY_TOTAL_AMOUNT_INVOICED') !== null ) {
                                    $query->where('TOTAL_AMOUNT_INVOICED',"like","%" .$request->get('SEARCH_BY_TOTAL_AMOUNT_INVOICED')."%");
                                }
                                

                                if ( $request->get('SEARCH_BY_CONTRACT_NBER') !== null ) {
                                    $query->where('CONTRACT_NBER',"like","%" .$request->get('SEARCH_BY_CONTRACT_NBER')."%");
                                }

                                if ( $request->get('SEARCH_BY_INVOICE_DATE') !== null ) {
                                    $query->where('INVOICE_DATE',"like","%" .$request->get('SEARCH_BY_INVOICE_DATE')."%");
                                }

                                if ( $request->get('SEARCH_BY_INVOICE_NBER') !== null ) {
                                    $query->where('INVOICE_NBER',"like","%" .$request->get('SEARCH_BY_INVOICE_NBER')."%");
                                }

                                if ( $request->get('SEARCH_BY_NO_CONTRAT') !== null ) {
                                    $query->where('NO_CONTRAT',"like","%" .$request->get('SEARCH_BY_NO_CONTRAT')."%");
                                }

                                if ( $request->get('SEARCH_BY_PAYE') !== null ) {
                                    $query->where('PAYE',"like","%" .$request->get('SEARCH_BY_PAYE')."%");
                                }

                                if ( $request->get('SEARCH_BY_PAYMENT_DATE') !== null ) {
                                    $query->where('PAYMENT_DATE',"like","%" .$request->get('SEARCH_BY_PAYMENT_DATE')."%");
                                }

                                if ( $request->get('SEARCH_BY_PRODUCT') !== null ) {
                                    $query->where('PRODUCT',"like","%" .$request->get('SEARCH_BY_PRODUCT')."%");
                                }

                                if ( $request->get('SEARCH_BY_BALANCE_DUE') !== null ) {
                                    $query->where('BALANCE_DUE',"like","%" .$request->get('SEARCH_BY_BALANCE_DUE')."%");
                                }

                                if ( $request->get('SEARCH_BY_RUT') !== null ) {
                                    $rut = $request->get('SEARCH_BY_RUT');
                                    $query->whereHas('identification', function($q) use ($rut){
                                        $q->where('SIRET', 'like', "%".$rut."%");
                                    });
                                }

                                if ($request->get("SEARCH_BY_RAZON_SOCIAL") !== null){
                                    $palabra = "%".$request->get("SEARCH_BY_RAZON_SOCIAL")."%";
                                    $query->whereHas('identification', function($q) use ($palabra){
                                        $q->where('RAISON_SOC', 'like', $palabra);
                                    });
                                }

                                $query->whereBetween('SYS_DATE_MODIFICATION', [$starts, $ends]);



                            })
                            ->addColumn('rut', function($dato){
                                if ( $dato->identification ) {
                                    return $dato->identification->SIRET;
                                }
                                return "-";
                            })
                            ->addColumn('razon_social', function($dato){
                                if ( $dato->identification ) {
                                    return $dato->identification->RAISON_SOC;
                                }
                                return "-";
                            })
                            ->addColumn('action', function ($dato) {
                                return '<a href="'.route('invoice.show', ['id_invoice' => $dato->ID_INVOICE]).'" class="btn btn-sm btn-info"><i class="fa-solid fa-eye"></i></a>';
                            })
                            ->toJson();
    }

    public function get_tabla_mission( Request $request )
    {
        $columns = config('tablas')['mission'];
        
        $relations = [
            'identification',
            'contrat',
            'contrat_detail_produit',
            'actions',
            'documents',
            'mission_motives',
            'mission_motive_historique_majs',
            'mission_teams',
        ];

        $datos = Mission::select( $columns )->with( $relations )->withCount( $relations );
        $starts = $request->get('SEARCH_BY_SYS_DATE_MODIFICATION_DESDE') ? Carbon::parse( $request->get('SEARCH_BY_SYS_DATE_MODIFICATION_DESDE') ) : Carbon::now('America/Santiago')->setTimeZone('America/Santiago')->subYears(100);
        $ends = $request->get('SEARCH_BY_SYS_DATE_MODIFICATION_HASTA') ? Carbon::parse( $request->get('SEARCH_BY_SYS_DATE_MODIFICATION_HASTA') ) : Carbon::now('America/Santiago')->setTimeZone('America/Santiago')->addYears(100);

        
        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request, $columns,$starts,$ends) {
                                
                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

                                if ( $request->get('SEARCH_BY_NO_MISSION') !== null ) {
                                    $query->where('NO_MISSION', 'like', "%".$request->get('SEARCH_BY_NO_MISSION')."%");
                                }

                                if ( $request->get('SEARCH_BY_CURRENT_STEP') !== null ) {
                                    $query->where('CURRENT_STEP', 'like', "%".$request->get('SEARCH_BY_CURRENT_STEP')."%");
                                }

                                if ( $request->get('SEARCH_BY_NO_CONTRAT') !== null ) {
                                    $query->where('NO_CONTRAT', 'like', "%".$request->get('SEARCH_BY_NO_CONTRAT')."%");
                                }

                                if ( $request->get('SEARCH_BY_PRODUIT') !== null ) {
                                    $query->where('PRODUIT', 'like', "%".$request->get('SEARCH_BY_PRODUIT')."%");
                                }

                                if ( $request->get('SEARCH_BY_RUT') !== null ) {
                                    $rut = $request->get('SEARCH_BY_RUT');
                                    $query->whereHas('identification', function($q) use ($rut){
                                        $q->where('SIRET', 'like', "%".$rut."%");
                                    });
                                }

                                if ($request->get("SEARCH_BY_RAZON_SOCIAL") !== null){
                                    $palabra = "%".$request->get("SEARCH_BY_RAZON_SOCIAL")."%";
                                    $query->whereHas('identification', function($q) use ($palabra){
                                        $q->where('RAISON_SOC', 'like', $palabra);
                                    });
                                }

                                $query->whereBetween('SYS_DATE_MODIFICATION', [$starts, $ends]);


                            })
                            ->addColumn('rut', function($dato){
                                if ( $dato->identification ) {
                                    return $dato->identification->SIRET;
                                }
                                return "-";
                            })
                            ->addColumn('razon_social', function($dato){
                                if ( $dato->identification ) {
                                    return $dato->identification->RAISON_SOC;
                                }
                                return "-";
                            })
                            ->addColumn('action', function ($dato) {
                                return '<a href="'.route('mission.show', ['id_mission' => $dato->ID_MISSION]).'" class="btn btn-sm btn-info"><i class="fa-solid fa-eye"></i></a>';
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
        $starts = $request->get('SEARCH_BY_SYS_DATE_MODIFICATION_DESDE') ? Carbon::parse( $request->get('SEARCH_BY_SYS_DATE_MODIFICATION_DESDE') ) : Carbon::now('America/Santiago')->setTimeZone('America/Santiago')->subYears(100);
        $ends = $request->get('SEARCH_BY_SYS_DATE_MODIFICATION_HASTA') ? Carbon::parse( $request->get('SEARCH_BY_SYS_DATE_MODIFICATION_HASTA') ) : Carbon::now('America/Santiago')->setTimeZone('America/Santiago')->addYears(100);

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request, $columns,$starts,$ends) {
                                
                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

                                if ( $request->get('SEARCH_BY_ACTIF') !== null ) {
                                    $query->where('ACTIF', 'like', "%".$request->get('SEARCH_BY_ACTIF')."%");
                                }

                                if ( $request->get('SEARCH_BY_CONSULTANT') !== null ) {
                                    $query->where('CONSULTANT', 'like', "%".$request->get('SEARCH_BY_CONSULTANT')."%");
                                }

                                if ( $request->get('SEARCH_BY_DATE_DEBUT') !== null ) {
                                    $query->where('DATE_DEBUT', 'like', "%".$request->get('SEARCH_BY_DATE_DEBUT')."%");
                                }

                                if ( $request->get('SEARCH_BY_DATE_FIN') !== null ) {
                                    $query->where('DATE_FIN', 'like', "%".$request->get('SEARCH_BY_DATE_FIN')."%");
                                }

                                if ( $request->get('SEARCH_BY_SYS_DATE_CREATION') !== null ) {
                                    $query->where('SYS_DATE_CREATION', 'like', "%".$request->get('SEARCH_BY_SYS_DATE_CREATION')."%");
                                }

                                $query->whereBetween('SYS_DATE_MODIFICATION', [$starts, $ends]);

                            })
                            ->addColumn('action', function ($dato) {
                                return '<a href="'.route('mission_team.show', ['id_mission_team' => $dato->ID_MISSION_TEAM]).'" class="btn btn-sm btn-info"><i class="fa-solid fa-eye"></i></a>';
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
                            ->filter(function ($query) use ($request, $columns) {
                                
                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

                                if ( $request->get('SEARCH_BY_NIVEAU') !== null ) {
                                    $query->where('NIVEAU', 'like', "%".$request->get('SEARCH_BY_NIVEAU')."%");
                                }
                                if ( $request->get('SEARCH_BY_FAMILLE') !== null ) {
                                    $query->where('FAMILLE', 'like', "%".$request->get('SEARCH_BY_FAMILLE')."%");
                                }
                                if ( $request->get('SEARCH_BY_TYPE') !== null ) {
                                    $query->where('TYPE', 'like', "%".$request->get('SEARCH_BY_TYPE')."%");
                                }
                                if ( $request->get('SEARCH_BY_DATE_SIGNATURE') !== null ) {
                                    $query->where('DATE_SIGNATURE', 'like', "%".$request->get('SEARCH_BY_DATE_SIGNATURE')."%");
                                }
                                if ( $request->get('SEARCH_BY_FIN_CONTRAT') !== null ) {
                                    $query->where('FIN_CONTRAT', 'like', "%".$request->get('SEARCH_BY_FIN_CONTRAT')."%");
                                }

                            })
                            ->addColumn('action', function ($dato) {
                                return '<a href="'.route('societe_famille.show', ['id_societe_famille' => $dato->ID_SOCIETE_FAMILLE]).'" class="btn btn-sm btn-info"><i class="fa-solid fa-eye"></i></a>';
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
                            ->filter(function ($query) use ($request, $columns) {
                                
                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

                                if ( $request->get('SEARCH_BY_COMMENTS_SITE') !== null ) {
                                    $query->where('COMMENTS_SITE', 'like', "%".$request->get('SEARCH_BY_COMMENTS_SITE')."%");
                                }
                                if ( $request->get('SEARCH_BY_CONSULTANT') !== null ) {
                                    $query->where('CONSULTANT', 'like', "%".$request->get('SEARCH_BY_CONSULTANT')."%");
                                }
                                if ( $request->get('SEARCH_BY_DATE_LIMITE') !== null ) {
                                    $query->where('DATE_LIMITE', 'like', "%".$request->get('SEARCH_BY_DATE_LIMITE')."%");
                                }
                                if ( $request->get('SEARCH_BY_ETAPE_COURANTE') !== null ) {
                                    $query->where('ETAPE_COURANTE', 'like', "%".$request->get('SEARCH_BY_ETAPE_COURANTE')."%");
                                }
                                if ( $request->get('SEARCH_BY_MOTIF') !== null ) {
                                    $query->where('MOTIF', 'like', "%".$request->get('SEARCH_BY_MOTIF')."%");
                                }
                                if ( $request->get('SEARCH_BY_POURCENTAGE') !== null ) {
                                    $query->where('POURCENTAGE', 'like', "%".$request->get('SEARCH_BY_POURCENTAGE')."%");
                                }

                            })
                            ->addColumn('action', function ($dato) {
                                return '<a href="'.route('mission_motive.show', ['id_mission_motive' => $dato->ID_MISSION_MOTIVE]).'" class="btn btn-sm btn-info"><i class="fa-solid fa-eye"></i></a>';
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
                            ->filter(function ($query) use ($request, $columns) {
                                
                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

                                if ( $request->get('SEARCH_BY_ANCIENNE_VALEUR') !== null ) {
                                    $query->where('ANCIENNE_VALEUR', 'like', "%".$request->get('SEARCH_BY_ANCIENNE_VALEUR')."%");
                                }

                                if ( $request->get('SEARCH_BY_ANCIENNE_VALEUR_LIBELLE') !== null ) {
                                    $query->where('ANCIENNE_VALEUR_LIBELLE', 'like', "%".$request->get('SEARCH_BY_ANCIENNE_VALEUR_LIBELLE')."%");
                                }

                                if ( $request->get('SEARCH_BY_CHAMPS') !== null ) {
                                    $query->where('CHAMPS', 'like', "%".$request->get('SEARCH_BY_CHAMPS')."%");
                                }

                                if ( $request->get('SEARCH_BY_DATE') !== null ) {
                                    $query->where('DATE', 'like', "%".$request->get('SEARCH_BY_DATE')."%");
                                }

                                if ( $request->get('SEARCH_BY_NOUVELLE_VALEUR') !== null ) {
                                    $query->where('NOUVELLE_VALEUR', 'like', "%".$request->get('SEARCH_BY_NOUVELLE_VALEUR')."%");
                                }

                                if ( $request->get('SEARCH_BY_NOUVELLE_VALEUR_LIBELLE') !== null ) {
                                    $query->where('NOUVELLE_VALEUR_LIBELLE', 'like', "%".$request->get('SEARCH_BY_NOUVELLE_VALEUR_LIBELLE')."%");
                                }

                            })
                            ->addColumn('action', function ($dato) {
                                return '<a href="'.route('mission_motive_historique_maj.show', ['id_mission_motive_historique_maj' => $dato->ID_MISSION_MOTIVE_HISTORIQUE_MAJ]).'" class="btn btn-sm btn-info"><i class="fa-solid fa-eye"></i></a>';
                            })
                            ->toJson();
    }

    public function get_tabla_contrat_partiel_condition_fiancieres( Request $request )
    {
        $columns = config('tablas')['contrat_partiel_condition_fiancieres'];
        
        $relations = [
            'contrat',
            'contrat_detail_produit',
        ];

        $datos = ContratPartielConditionFianciere::select( $columns )->with( $relations )->withCount( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request, $columns) {

                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }

                                }

                                if ( $request->get('SEARCH_BY_REMUNERATION') !== null ) {
                                    $query->where('REMUNERATION', 'like', "%".$request->get('SEARCH_BY_REMUNERATION')."%");
                                }

                                if ( $request->get('SEARCH_BY_SEUIL_MAX') !== null ) {
                                    $query->where('SEUIL_MAX', 'like', "%".$request->get('SEARCH_BY_SEUIL_MAX')."%");
                                }

                                if ( $request->get('SEARCH_BY_SEUIL_MIN') !== null ) {
                                    $query->where('SEUIL_MIN', 'like', "%".$request->get('SEARCH_BY_SEUIL_MIN')."%");
                                }

                                if ( $request->get('SEARCH_BY_SEUIL_MIN') !== null ) {
                                    $query->where('SEUIL_MIN', 'like', "%".$request->get('SEARCH_BY_SEUIL_MIN')."%");
                                }

                                if ( $request->get('SEARCH_BY_VALEUR') !== null ) {
                                    $query->where('VALEUR', 'like', "%".$request->get('SEARCH_BY_VALEUR')."%");
                                }

                                if ( $request->get('SEARCH_BY_YEAR') !== null ) {
                                    $query->where('YEAR', 'like', "%".$request->get('SEARCH_BY_YEAR')."%");
                                }

                                if ( $request->get('SEARCH_BY_RUT') !== null ) {
                                    $rut = $request->get('SEARCH_BY_RUT');
                                    $query->whereHas('contrat', function($q) use ($rut){
                                        $q->whereHas('identification', function($q2) use ($rut){
                                            $q2->where('SIRET', 'like', "%".$rut."%");
                                        });
                                    });
                                }

                                if ($request->get("SEARCH_BY_RAZON_SOCIAL") !== null){
                                    $palabra = "%".$request->get("SEARCH_BY_RAZON_SOCIAL")."%";
                                    $query->whereHas('contrat', function($q) use ($palabra){
                                        $q->whereHas('identification', function($q2) use ($palabra){
                                            $q2->where('RAISON_SOC', 'like', "%".$palabra."%");
                                        });
                                    });
                                }

                            })
                            ->addColumn('rut', function ($dato) {
                                if ( $dato->contrat ) {
                                    if ( $dato->contrat->identification ) {
                                        return $dato->contrat->identification->SIRET;
                                    }
                                }
                                return "-";
                            })
                            ->addColumn('razon_social', function ($dato) {
                                if ( $dato->contrat ) {
                                    if ( $dato->contrat->identification ) {
                                        return $dato->contrat->identification->RAISON_SOC;
                                    }
                                }
                                return "-";
                            })
                            ->addColumn('action', function ($dato) {
                                return '<a href="'.route('contrat_partiel_condition_fiancieres.show', ['id_contrat_partiel_condition_fianciere' => $dato->ID_CONTRAT_PARTIEL_CONDITION_FIANCIERES]).'" class="btn btn-sm btn-info"><i class="fa-solid fa-eye"></i></a>';
                            })
                            ->toJson();
    }

    public function get_tabla_affaire_conditions_financieres( Request $request )
    {
        $columns = config('tablas')['affaire_conditions_financieres'];
        
        $relations = [
            'affaire',
        ];

        $datos = AffaireConditionsFinanciere::select( $columns )->with( $relations );
        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request, $columns) {
                                
                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }
                                //filtros Tabla: affaire_conditions_financieres
                                if ($request->get("SEARCH_BY_TYPE") !== null){
                                    $query->where("TYPE","like","%" . $request->get('SEARCH_BY_TYPE') . "%");
                                }

                                if ($request->get("SEARCH_BY_VALEUR") !== null){
                                    $query->where("VALEUR","like","%" . $request->get('SEARCH_BY_VALEUR') . "%");
                                }

                                if ($request->get("SEARCH_BY_YEAR") !== null){
                                    $query->where("YEAR","like","%" . $request->get('SEARCH_BY_YEAR') . "%");
                                }

                                if ($request->get("SEARCH_BY_SYS_DATE_CREATION") !== null){
                                    $query->where("SYS_DATE_CREATION","like","%" . $request->get('SEARCH_BY_SYS_DATE_CREATION') . "%");
                                }

                                if ($request->get("SEARCH_BY_RUT") !== null){
                                    $palabra = "%".$request->get("SEARCH_BY_RUT")."%";
                                    $query->whereHas('affaire',function($q1) use ($palabra){
                                        $q1->whereHas('identification',function($q2) use ($palabra){
                                            $q2->where('SIRET','like', $palabra);
                                        });
                                    });
                                }

                                if ($request->get("SEARCH_BY_RAZON_SOCIAL") !== null){
                                    $palabra = "%".$request->get("SEARCH_BY_RAZON_SOCIAL")."%";
                                    $query->whereHas('affaire',function($q1) use ($palabra){
                                        $q1->whereHas('identification',function($q2) use ($palabra){
                                            $q2->where('RAISON_SOC','like', $palabra);
                                        });
                                    });
                                }

                                if ($request->get("SEARCH_BY_SYS_DATE_MODIFICATION") !== null){
                                    $query->where("SYS_DATE_MODIFICATION","like","%" . $request->get('SEARCH_BY_SYS_DATE_MODIFICATION') . "%");
                                }

                            })
                            ->addColumn('rut', function ($dato) {
                                if ( $dato->affaire ) {
                                    if ( $dato->affaire->identification ) {
                                        return $dato->affaire->identification->SIRET;
                                    }
                                }
                                return "-";
                            })
                            ->addColumn('razon_social', function ($dato) {
                                if ( $dato->affaire ) {
                                    if ( $dato->affaire->identification ) {
                                        return $dato->affaire->identification->RAISON_SOC;
                                    }
                                }
                                return "-";
                            })
                            ->addColumn('action', function ($dato) {
                                return '<a href="'.route('contrat_partiel_condition_fiancieres.show', ['id_contrat_partiel_condition_fianciere' => $dato->ID_CONTRAT_PARTIEL_CONDITION_FIANCIERES]).'" class="btn btn-sm btn-info"><i class="fa-solid fa-eye"></i></a>';
                            })
                            ->toJson();
    }

    public function get_tabla_affaire_objections( Request $request )
    {
        $columns = config('tablas')['affaire_objections'];
        
        $relations = [
            'affaire',
        ];

        $datos = AffaireObjection::select( $columns )->with( $relations );

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request, $columns) {
                                
                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

                                //filtros Tabla: affaire_objections
                                
                                if ($request->get("SEARCH_BY_COMMENTS") !== null){
                                    $query->where("COMMENTS","like","%" . $request->get('SEARCH_BY_COMMENTS') . "%");
                                }

                                if ($request->get("SEARCH_BY_DATE") !== null){
                                    $query->where("DATE","like","%" . $request->get('SEARCH_BY_DATE') . "%");
                                }

                                if ($request->get("SEARCH_BY_SOLVED") !== null){
                                    $query->where("SOLVED","like","%" . $request->get('SEARCH_BY_SOLVED') . "%");
                                }

                                if ($request->get("SEARCH_BY_STEP") !== null){
                                    $query->where("STEP","like","%" . $request->get('SEARCH_BY_STEP') . "%");
                                }

                                if ($request->get("SEARCH_BY_OBJECTIONS") !== null){
                                    $query->where("OBJECTIONS","like","%" . $request->get('SEARCH_BY_OBJECTIONS') . "%");
                                }

                                if ($request->get("SEARCH_BY_RUT") !== null){
                                    $palabra = "%".$request->get("SEARCH_BY_RUT")."%";
                                    $query->whereHas('affaire',function($q1) use ($palabra){
                                        $q1->whereHas('identification',function($q2) use ($palabra){
                                            $q2->where('SIRET','like', $palabra);
                                        });
                                    });
                                }

                                if ($request->get("SEARCH_BY_RAZON_SOCIAL") !== null){
                                    $palabra = "%".$request->get("SEARCH_BY_RAZON_SOCIAL")."%";
                                    $query->whereHas('affaire',function($q1) use ($palabra){
                                        $q1->whereHas('identification',function($q2) use ($palabra){
                                            $q2->where('RAISON_SOC','like', $palabra);
                                        });
                                    });
                                }

                                if ($request->get("SEARCH_BY_SYS_DATE_MODIFICATION") !== null){
                                    $query->where("SYS_DATE_MODIFICATION","like","%" . $request->get('SEARCH_BY_SYS_DATE_MODIFICATION') . "%");
                                }

                            })
                            ->addColumn('rut', function ($dato) {
                                if ( $dato->affaire ) {
                                    if ( $dato->affaire->identification ) {
                                        return $dato->affaire->identification->SIRET;
                                    }
                                }
                                return "-";
                            })
                            ->addColumn('razon_social', function ($dato) {
                                if ( $dato->affaire ) {
                                    if ( $dato->affaire->identification ) {
                                        return $dato->affaire->identification->RAISON_SOC;
                                    }
                                }
                                return "-";
                            })
                            ->addColumn('action', function ($dato) {
                                return '<a href="'.route('affaire_objections.show', ['id_affaire_objection' => $dato->ID_AFFAIRE_OBJECTIONS]).'" class="btn btn-sm btn-info"><i class="fa-solid fa-eye"></i></a>';
                            })
                            ->toJson();
    }

    public function get_tabla_historique_maj_affaire( Request $request )
    {
        $columns = config('tablas')['historique_maj_affaire'];
        
        $relations = [
            'affaire',
        ];

        $datos = HistoriqueMajAffaire::select( $columns )->with( $relations );
        $starts = $request->get('SEARCH_BY_SYS_DATE_MODIFICATION_DESDE') ? Carbon::parse( $request->get('SEARCH_BY_SYS_DATE_MODIFICATION_DESDE') ) : Carbon::now('America/Santiago')->setTimeZone('America/Santiago')->subYears(100);
        $ends = $request->get('SEARCH_BY_SYS_DATE_MODIFICATION_HASTA') ? Carbon::parse( $request->get('SEARCH_BY_SYS_DATE_MODIFICATION_HASTA') ) : Carbon::now('America/Santiago')->setTimeZone('America/Santiago')->addYears(100);

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request, $columns,$starts,$ends) {
                                
                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

                                if ($request->get("SEARCH_BY_CHAMPS") !== null){
                                    $query->where("CHAMPS","like","%" . $request->get('SEARCH_BY_CHAMPS') . "%");
                                }

                                if ($request->get("SEARCH_BY_DATE") !== null){
                                    $query->where("DATE","like","%" . $request->get('SEARCH_BY_DATE') . "%");
                                }

                                if ($request->get("SEARCH_BY_ANCIENNE_VALEUR") !== null){
                                    $query->where("ANCIENNE_VALEUR","like","%" . $request->get('SEARCH_BY_ANCIENNE_VALEUR') . "%");
                                }

                                if ($request->get("SEARCH_BY_ANCIENNE_VALEUR_LIBELLE") !== null){
                                    $query->where("ANCIENNE_VALEUR_LIBELLE","like","%" . $request->get('SEARCH_BY_ANCIENNE_VALEUR_LIBELLE') . "%");
                                }

                                if ($request->get("SEARCH_BY_NOUVELLE_VALEUR") !== null){
                                    $query->where("NOUVELLE_VALEUR","like","%" . $request->get('SEARCH_BY_NOUVELLE_VALEUR') . "%");
                                }

                                if ($request->get("SEARCH_BY_NOUVELLE_VALEUR_LIBELLE") !== null){
                                    $query->where("NOUVELLE_VALEUR_LIBELLE","like","%" . $request->get('SEARCH_BY_NOUVELLE_VALEUR_LIBELLE') . "%");
                                }

                                if ($request->get("SEARCH_BY_USER") !== null){
                                    $query->where("USER","like","%" . $request->get('SEARCH_BY_USER') . "%");
                                }

                                if ($request->get("SEARCH_BY_RUT") !== null){
                                    $palabra = "%".$request->get("SEARCH_BY_RUT")."%";
                                    $query->whereHas('affaire',function($q1) use ($palabra){
                                        $q1->whereHas('identification',function($q2) use ($palabra){
                                            $q2->where('SIRET','like', $palabra);
                                        });
                                    });
                                }

                                if ($request->get("SEARCH_BY_RAZON_SOCIAL") !== null){
                                    $palabra = "%".$request->get("SEARCH_BY_RAZON_SOCIAL")."%";
                                    $query->whereHas('affaire',function($q1) use ($palabra){
                                        $q1->whereHas('identification',function($q2) use ($palabra){
                                            $q2->where('RAISON_SOC','like', $palabra);
                                        });
                                    });
                                }

                                $query->whereBetween('SYS_DATE_MODIFICATION', [$starts, $ends]);

                            })
                            ->addColumn('rut', function ($dato) {
                                if ( $dato->affaire ) {
                                    if ( $dato->affaire->identification ) {
                                        return $dato->affaire->identification->SIRET;
                                    }
                                }
                                return "-";
                            })
                            ->addColumn('razon_social', function ($dato) {
                                if ( $dato->affaire ) {
                                    if ( $dato->affaire->identification ) {
                                        return $dato->affaire->identification->RAISON_SOC;
                                    }
                                }
                                return "-";
                            })
                            ->addColumn('action', function ($dato) {
                                return '<a href="'.route('historique_maj_affaire.show', ['id_historique_maj_affaire' => $dato->ID_HISTORIQUE_MAJ_AFFAIRE]).'" class="btn btn-sm btn-info"><i class="fa-solid fa-eye"></i></a>';
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
        $starts = $request->get('SEARCH_BY_SYS_DATE_MODIFICATION_DESDE') ? Carbon::parse( $request->get('SEARCH_BY_SYS_DATE_MODIFICATION_DESDE') ) : Carbon::now('America/Santiago')->setTimeZone('America/Santiago')->subYears(100);
        $ends = $request->get('SEARCH_BY_SYS_DATE_MODIFICATION_HASTA') ? Carbon::parse( $request->get('SEARCH_BY_SYS_DATE_MODIFICATION_HASTA') ) : Carbon::now('America/Santiago')->setTimeZone('America/Santiago')->addYears(100);

        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request, $columns,$starts,$ends) {
                                
                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

                                if ($request->get("SEARCH_BY_DATE_PREVISIONNELLE") !== null){
                                    $query->where("DATE_PREVISIONNELLE","like","%" . $request->get('SEARCH_BY_DATE_PREVISIONNELLE') . "%");
                                }

                                if ($request->get("SEARCH_BY_ECO_ABANDONNEE") !== null){
                                    $query->where("ECO_ABANDONNEE","like","%" . $request->get('SEARCH_BY_ECO_ABANDONNEE') . "%");
                                }

                                if ($request->get("SEARCH_BY_ECO_A_FACTURER") !== null){
                                    $query->where("ECO_A_FACTURER","like","%" . $request->get('SEARCH_BY_ECO_A_FACTURER') . "%");
                                }

                                if ($request->get("SEARCH_BY_ECO_ECART") !== null){
                                    $query->where("ECO_ECART","like","%" . $request->get('SEARCH_BY_ECO_ECART') . "%");
                                }

                                if ($request->get("SEARCH_BY_ECO_PRESENTEE") !== null){
                                    $query->where("ECO_PRESENTEE","like","%" . $request->get('SEARCH_BY_ECO_PRESENTEE') . "%");
                                }

                                if ($request->get("SEARCH_BY_ECO_VALIDEE") !== null){
                                    $query->where("ECO_VALIDEE","like","%" . $request->get('SEARCH_BY_ECO_VALIDEE') . "%");
                                }

                                if ($request->get("SEARCH_BY_SOUS_MOTIF_1") !== null){
                                    $query->where("SOUS_MOTIF_1","like","%" . $request->get('SEARCH_BY_SOUS_MOTIF_1') . "%");
                                }

                                if ($request->get("SEARCH_BY_SOUS_MOTIF_2") !== null){
                                    $query->where("SOUS_MOTIF_2","like","%" . $request->get('SEARCH_BY_SOUS_MOTIF_2') . "%");
                                }

                                if ($request->get("SEARCH_BY_YEAR") !== null){
                                    $query->where("YEAR","like","%" . $request->get('SEARCH_BY_YEAR') . "%");
                                }
                            })   
                            ->addColumn('action', function ($dato) {
                                return '<a href="'.route('mission_motive_eco.show', ['id_mission_motive_eco' => $dato->ID_MISSION_MOTIVE_ECO]).'" class="btn btn-sm btn-info"><i class="fa-solid fa-eye"></i></a>';
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
                            ->filter(function ($query) use ($request, $columns) {
                                
                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

                                if ( $request->get('SEARCH_BY_DESIGNATION') !== null ) {
                                    $query->where('DESIGNATION',"like","%".$request->get('SEARCH_BY_DESIGNATION')."%");
                                }

                                if ( $request->get('SEARCH_BY_FAMILLE') !== null ) {
                                    $query->where('FAMILLE',"like","%" .$request->get('SEARCH_BY_FAMILLE')."%");
                                }

                                if ( $request->get('SEARCH_BY_PRIX_ACHAT') !== null ) {
                                    $query->where('PRIX_ACHAT',"like","%" .$request->get('SEARCH_BY_PRIX_ACHAT')."%");
                                }

                                if ( $request->get('SEARCH_BY_PRIX_VENTE') !== null ) {
                                    $query->where('PRIX_VENTE',"like","%" .$request->get('SEARCH_BY_PRIX_VENTE')."%");
                                }


                            })
                            ->addColumn('action', function ($dato) {
                                return '<a href="'.route('article.show', ['id_article' => $dato->ID_ARTICLE]).'" class="btn btn-sm btn-info"><i class="fa-solid fa-eye"></i></a>';
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
                            ->filter(function ($query) use ($request, $columns) {

                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

                                //filtros Tabla: aide_action_categorie

                                if ($request->get("SEARCH_BY_CATEGORIE") !== null){
                                    $query->where("CATEGORIE","like","%" . $request->get('SEARCH_BY_CATEGORIE') . "%");
                                }

                                if ($request->get("SEARCH_BY_EXCLUSIVE") !== null){
                                    $query->where("EXCLUSIVE","like","%" . $request->get('SEARCH_BY_EXCLUSIVE') . "%");
                                }

                                if ($request->get("SEARCH_BY_GROUPE") !== null){
                                    $query->where("GROUPE","like","%" . $request->get('SEARCH_BY_GROUPE') . "%");
                                }

                                if ($request->get("SEARCH_BY_MISE_A_JOUR_AGENDA") !== null){
                                    $query->where("MISE_A_JOUR_AGENDA","like","%" . $request->get('SEARCH_BY_MISE_A_JOUR_AGENDA') . "%");
                                }

                                if ($request->get("SEARCH_BY_TYPE_EVENEMENT") !== null){
                                    $query->where("TYPE_EVENEMENT","like","%" . $request->get('SEARCH_BY_TYPE_EVENEMENT') . "%");
                                }
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
                            ->filter(function ($query) use ($request, $columns) {

                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

                                //filtros Tabla: aide_action_objet

                                if ($request->get("SEARCH_BY_CATEGORIE") !== null){
                                    $query->where("CATEGORIE","like","%" . $request->get('SEARCH_BY_CATEGORIE') . "%");
                                }

                                if ($request->get("SEARCH_BY_OBJET") !== null){
                                    $query->where("OBJET","like","%" . $request->get('SEARCH_BY_OBJET') . "%");
                                }

                                if ($request->get("SEARCH_BY_SYS_USER_CREATION") !== null){
                                    $query->where("SYS_USER_CREATION","like","%" . $request->get('SEARCH_BY_SYS_USER_CREATION') . "%");
                                }

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
                            ->filter(function ($query) use ($request, $columns) {

                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

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
                            ->filter(function ($query) use ($request, $columns) {

                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

                            })
                            ->toJson();
    }

    public function get_tabla_invoice_ligne( Request $request )
    {
        $columns = config('tablas')['invoice_ligne'];
        
        $relations = [
            'invoice',
            'mission_motive_eco',
        ];

        $datos = InvoiceLigne::select( $columns )->with( $relations );
        $starts = $request->get('SEARCH_BY_SYS_DATE_MODIFICATION_DESDE') ? Carbon::parse( $request->get('SEARCH_BY_SYS_DATE_MODIFICATION_DESDE') ) : Carbon::now('America/Santiago')->setTimeZone('America/Santiago')->subYears(100);
        $ends = $request->get('SEARCH_BY_SYS_DATE_MODIFICATION_HASTA') ? Carbon::parse( $request->get('SEARCH_BY_SYS_DATE_MODIFICATION_HASTA') ) : Carbon::now('America/Santiago')->setTimeZone('America/Santiago')->addYears(100);


        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request, $columns,$starts,$ends) {

                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

                                if ( $request->get('SEARCH_BY_AMOUNT') !== null ) {
                                    $query->where('AMOUNT',"like","%" .$request->get('SEARCH_BY_AMOUNT')."%");
                                }

                                if ( $request->get('SEARCH_BY_ECO_AMOUNT') !== null ) {
                                    $query->where('ECO_AMOUNT',"like","%" .$request->get('SEARCH_BY_ECO_AMOUNT')."%");
                                }

                                if ( $request->get('SEARCH_BY_FEES') !== null ) {
                                    $query->where('FEES',"like","%" .$request->get('SEARCH_BY_FEES')."%");
                                }

                                if ( $request->get('SEARCH_BY_MOTIVE') !== null ) {
                                    $query->where('MOTIVE',"like","%" .$request->get('SEARCH_BY_MOTIVE')."%");
                                }

                                if ( $request->get('SEARCH_BY_NO_LIGNE') !== null ) {
                                    $query->where('NO_LIGNE',"like","%" .$request->get('SEARCH_BY_NO_LIGNE')."%");
                                }

                                if ( $request->get('SEARCH_BY_PRODUCT') !== null ) {
                                    $query->where('PRODUCT',"like","%" .$request->get('SEARCH_BY_PRODUCT')."%");
                                }

                                if ( $request->get('SEARCH_BY_SUB_MOTIVE1') !== null ) {
                                    $query->where('SUB_MOTIVE1',"like","%" .$request->get('SEARCH_BY_SUB_MOTIVE1')."%");
                                }

                                if ( $request->get('SEARCH_BY_SUB_MOTIVE2') !== null ) {
                                    $query->where('SUB_MOTIVE2',"like","%" .$request->get('SEARCH_BY_SUB_MOTIVE2')."%");
                                }

                                if ( $request->get('SEARCH_BY_YEAR') !== null ) {
                                    $query->where('YEAR',"like","%" .$request->get('SEARCH_BY_YEAR')."%");
                                }

                                if ($request->get("SEARCH_BY_RUT") !== null){
                                    $palabra = "%".$request->get("SEARCH_BY_RUT")."%";
                                    $query->whereHas('invoice',function($q1) use ($palabra){
                                        $q1->whereHas('identification',function($q2) use ($palabra){
                                            $q2->where('SIRET','like', $palabra);
                                        });
                                    });
                                }

                                if ($request->get("SEARCH_BY_RAZON_SOCIAL") !== null){
                                    $palabra = "%".$request->get("SEARCH_BY_RAZON_SOCIAL")."%";
                                    $query->whereHas('identification',function($q1) use ($palabra){
                                        $q1->where('RAISON_SOC','like', $palabra);
                                    });
                                }

                                $query->whereBetween('SYS_DATE_MODIFICATION', [$starts, $ends]);


                            })
                            ->addColumn('rut', function ($dato) {
                                if ( $dato->invoice ) {
                                    if ( $dato->invoice->identification ) {
                                        return $dato->invoice->identification->SIRET;
                                    }
                                }
                                return "-";
                            })
                            ->addColumn('razon_social', function ($dato) {
                                if ( $dato->invoice ) {
                                    if ( $dato->invoice->identification ) {
                                        return $dato->invoice->identification->RAISON_SOC;
                                    }
                                }
                                return "-";
                            })
                            ->addColumn('action', function ($dato) {
                                return '<a href="'.route('invoice_ligne.show', ['id_invoice_ligne' => $dato->ID_INVOICE_LIGNE]).'" class="btn btn-sm btn-info"><i class="fa-solid fa-eye"></i></a>';
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
        $starts = $request->get('SEARCH_BY_SYS_DATE_MODIFICATION_DESDE') ? Carbon::parse( $request->get('SEARCH_BY_SYS_DATE_MODIFICATION_DESDE') ) : Carbon::now('America/Santiago')->setTimeZone('America/Santiago')->subYears(100);
        $ends = $request->get('SEARCH_BY_SYS_DATE_MODIFICATION_HASTA') ? Carbon::parse( $request->get('SEARCH_BY_SYS_DATE_MODIFICATION_HASTA') ) : Carbon::now('America/Santiago')->setTimeZone('America/Santiago')->addYears(100);


        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request, $columns,$starts,$ends) {

                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

                                if ( $request->get('SEARCH_BY_INFORMATION') !== null ) {
                                    $query->where('INFORMATION',"like","%" .$request->get('SEARCH_BY_INFORMATION')."%");
                                }

                                if ( $request->get('SEARCH_BY_RECORD_KEY') !== null ) {
                                    $query->where('RECORD_KEY',"like","%" .$request->get('SEARCH_BY_RECORD_KEY')."%");
                                }

                                if ( $request->get('SEARCH_BY_TABLE') !== null ) {
                                    $query->where('TABLE',"like","%" .$request->get('SEARCH_BY_TABLE')."%");
                                }

                                if ( $request->get('SEARCH_BY_SYS_DATE_CREATION') !== null ) {
                                    $query->where('SYS_DATE_CREATION',"like","%" .$request->get('SEARCH_BY_SYS_DATE_CREATION')."%");
                                }

                                $query->whereBetween('SYS_DATE_MODIFICATION', [$starts, $ends]);


                            })
                            ->addColumn('action', function ($dato) {
                                return '<a href="'.route('journal_deleted.show', ['id_journal_deleted' => $dato->ID_JOURNAL_DELETED]).'" class="btn btn-sm btn-info"><i class="fa-solid fa-eye"></i></a>';
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
                            ->filter(function ($query) use ($request, $columns) {

                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

                                if ( $request->get('SEARCH_BY_CLIENT_REVIEW_LABEL') !== null ) {
                                    $query->where('CLIENT_REVIEW_LABEL',"like","%" .$request->get('SEARCH_BY_CLIENT_REVIEW_LABEL')."%");
                                }
                                if ( $request->get('SEARCH_BY_CONTRACT_COUNTER_PREFIX') !== null ) {
                                    $query->where('CONTRACT_COUNTER_PREFIX',"like","%" .$request->get('SEARCH_BY_CONTRACT_COUNTER_PREFIX')."%");
                                }
                                if ( $request->get('SEARCH_BY_CONTRACT_DUNNING_PERIOD') !== null ) {
                                    $query->where('CONTRACT_DUNNING_PERIOD',"like","%" .$request->get('SEARCH_BY_CONTRACT_DUNNING_PERIOD')."%");
                                }
                                if ( $request->get('SEARCH_BY_CONTRACT_DURATION') !== null ) {
                                    $query->where('CONTRACT_DURATION',"like","%" .$request->get('SEARCH_BY_CONTRACT_DURATION')."%");
                                }
                                if ( $request->get('SEARCH_BY_COUNTRY') !== null ) {
                                    $query->where('COUNTRY',"like","%" .$request->get('SEARCH_BY_COUNTRY')."%");
                                }

                            })
                            ->addColumn('action', function ($dato) {
                                return '<a href="'.route('settings.show', ['id_setting' => $dato->ID_SETTINGS]).'" class="btn btn-sm btn-info"><i class="fa-solid fa-eye"></i></a>';
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
                            ->filter(function ($query) use ($request, $columns) {

                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

                                //filtros Tabla: aide_action_objet
                                if ($request->get("SEARCH_BY_ORIGINE") !== null){
                                    $query->where("ORIGINE","like","%" . $request->get('SEARCH_BY_ORIGINE') . "%");
                                }
                                
                                if ($request->get("SEARCH_BY_SYS_DATE_CREATION") !== null){
                                    $query->where("SYS_DATE_CREATION","like","%" . $request->get('SEARCH_BY_SYS_DATE_CREATION') . "%");
                                }
                                
                                if ($request->get("SEARCH_BY_SYS_DATE_MODIFICATION") !== null){
                                    $query->where("SYS_DATE_MODIFICATION","like","%" . $request->get('SEARCH_BY_SYS_DATE_MODIFICATION') . "%");
                                }
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
                            ->filter(function ($query) use ($request, $columns) {

                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

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
                            ->filter(function ($query) use ($request, $columns) {

                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

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
                            ->filter(function ($query) use ($request, $columns) {

                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

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
                            ->filter(function ($query) use ($request, $columns) {

                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

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
                            ->filter(function ($query) use ($request, $columns) {

                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

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
                            ->filter(function ($query) use ($request, $columns) {

                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

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
                            ->filter(function ($query) use ($request, $columns) {

                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

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
                            ->filter(function ($query) use ($request, $columns) {

                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

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
                            ->filter(function ($query) use ($request, $columns) {

                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

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
                            ->filter(function ($query) use ($request, $columns) {

                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

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
                            ->filter(function ($query) use ($request, $columns) {

                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

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
                            ->filter(function ($query) use ($request, $columns) {

                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

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
                            ->filter(function ($query) use ($request, $columns) {

                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

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
                            ->filter(function ($query) use ($request, $columns) {

                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

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
                            ->filter(function ($query) use ($request, $columns) {

                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

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
                            ->filter(function ($query) use ($request, $columns) {

                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

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
                            ->filter(function ($query) use ($request, $columns) {

                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

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
                            ->filter(function ($query) use ($request, $columns) {

                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

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
                            ->filter(function ($query) use ($request, $columns) {

                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

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
                            ->filter(function ($query) use ($request, $columns) {

                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

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
                            ->filter(function ($query) use ($request, $columns) {

                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

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
                            ->filter(function ($query) use ($request, $columns) {

                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

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
                            ->filter(function ($query) use ($request, $columns) {

                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

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
                            ->filter(function ($query) use ($request, $columns) {

                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

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
                            ->filter(function ($query) use ($request, $columns) {

                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

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
                            ->filter(function ($query) use ($request, $columns) {

                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

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
                            ->filter(function ($query) use ($request, $columns) {

                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

                                if ( $request->get('SEARCH_BY_CA_MAX') !== null ) {
                                    $query->where('CA_MAX',"like","%".$request->get('SEARCH_BY_CA_MAX')."%");
                                }

                                if ( $request->get('SEARCH_BY_CA_MIN') !== null ) {
                                    $query->where('CA_MIN',"like","%".$request->get('SEARCH_BY_CA_MIN')."%");
                                }

                                if ( $request->get('SEARCH_BY_CA_TRANCHE') !== null ) {
                                    $query->where('CA_TRANCHE',"like","%".$request->get('SEARCH_BY_CA_TRANCHE')."%");
                                }

                                if ( $request->get('SEARCH_BY_SYS_DATE_CREATION') !== null ) {
                                    $query->where('SYS_DATE_CREATION',"like","%".$request->get('SEARCH_BY_SYS_DATE_CREATION')."%");
                                }

                                if ( $request->get('SEARCH_BY_SYS_USER_CREATION') !== null ) {
                                    $query->where('SYS_USER_CREATION',"like","%".$request->get('SEARCH_BY_SYS_USER_CREATION')."%");
                                }

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
                            ->filter(function ($query) use ($request, $columns) {

                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }

                                    if ( $request->get('SEARCH_BY_CODE_POSTAL') !== null ) {
                                        $query->where('CODE_POSTAL',"like","%".$request->get('SEARCH_BY_CODE_POSTAL')."%");
                                    }

                                    if ( $request->get('SEARCH_BY_COMMUNE') !== null ) {
                                        $query->where('COMMUNE',"like","%".$request->get('SEARCH_BY_COMMUNE')."%");
                                    }

                                    if ( $request->get('SEARCH_BY_INSEE') !== null ) {
                                        $query->where('INSEE',"like","%".$request->get('SEARCH_BY_INSEE')."%");
                                    }

                                    if ( $request->get('SEARCH_BY_LIB_DEPARTEMENT') !== null ) {
                                        $query->where('LIB_DEPARTEMENT',"like","%".$request->get('SEARCH_BY_LIB_DEPARTEMENT')."%");
                                    }

                                    if ( $request->get('SEARCH_BY_REGION') !== null ) {
                                        $query->where('REGION',"like","%".$request->get('SEARCH_BY_REGION')."%");
                                    }

                                    if ( $request->get('SEARCH_BY_SECTEUR') !== null ) {
                                        $query->where('SECTEUR',"like","%".$request->get('SEARCH_BY_SECTEUR')."%");
                                    }

                                    if ( $request->get('SEARCH_BY_SYS_USER_CREATION') !== null ) {
                                        $query->where('SYS_USER_CREATION',"like","%".$request->get('SEARCH_BY_SYS_USER_CREATION')."%");
                                    }
                                }

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
                            ->filter(function ($query) use ($request, $columns) {

                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

                                if ( $request->get('SEARCH_BY_COMPANY_CLASSIFICATION') !== null ) {
                                    $query->where('COMPANY_CLASSIFICATION',"like","%".$request->get('SEARCH_BY_COMPANY_CLASSIFICATION')."%");
                                }

                                if ( $request->get('SEARCH_BY_SYS_DATE_CREATION') !== null ) {
                                    $query->where('SYS_DATE_CREATION',"like","%".$request->get('SEARCH_BY_SYS_DATE_CREATION')."%");
                                }

                                if ( $request->get('SEARCH_BY_SYS_USER_CREATION') !== null ) {
                                    $query->where('SYS_USER_CREATION',"like","%".$request->get('SEARCH_BY_SYS_USER_CREATION')."%");
                                }

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
                            ->filter(function ($query) use ($request, $columns) {

                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

                                if ( $request->get('SEARCH_BY_EFFECTIF') !== null ) {
                                    $query->where('EFFECTIF',"like","%".$request->get('SEARCH_BY_EFFECTIF')."%");
                                }

                                if ( $request->get('SEARCH_BY_TRANCHE_MAXI') !== null ) {
                                    $query->where('TRANCHE_MAXI',"like","%".$request->get('SEARCH_BY_TRANCHE_MAXI')."%");
                                }

                                if ( $request->get('SEARCH_BY_TRANCHE_MINI') !== null ) {
                                    $query->where('TRANCHE_MINI',"like","%".$request->get('SEARCH_BY_TRANCHE_MINI')."%");
                                }

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
                            ->filter(function ($query) use ($request, $columns) {

                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

                                if ( $request->get('SEARCH_BY_FORME_JURIDIQUE') !== null ) {
                                    $query->where('FORME_JURIDIQUE',"like","%".$request->get('SEARCH_BY_FORME_JURIDIQUE')."%");
                                }

                                if ( $request->get('SEARCH_BY_SIGLE') !== null ) {
                                    $query->where('SIGLE',"like","%".$request->get('SEARCH_BY_SIGLE')."%");
                                }

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
                            ->filter(function ($query) use ($request, $columns) {

                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

                                if ( $request->get('SEARCH_BY_CODE') !== null ) {
                                    $query->where('CODE',"like","%".strval($request->get('SEARCH_BY_CODE'))."%");
                                }

                                if ( $request->get('SEARCH_BY_IT_PART_TIME') !== null ) {
                                    $query->where('IT_PART_TIME',"like","%".strval($request->get('SEARCH_BY_IT_PART_TIME'))."%");
                                }

                                if ( $request->get('SEARCH_BY_LIBELLE') !== null ) {
                                    $query->where('LIBELLE',"like","%".$request->get('SEARCH_BY_LIBELLE')."%");
                                }
                                
                                if ( $request->get('SEARCH_BY_SEGMENT') !== null ) {
                                    $query->where('SEGMENT',"like","%".$request->get('SEARCH_BY_SEGMENT')."%");
                                }

                                if ( $request->get('SEARCH_BY_TGG_2017') !== null ) {
                                    $query->where('TGG_2017',"like","%".$request->get('SEARCH_BY_TGG_2017')."%");
                                }

                                if ( $request->get('SEARCH_BY_TARGET_AT') !== null ) {
                                    $query->where('TARGET_AT',"like","%".$request->get('SEARCH_BY_TARGET_AT')."%");
                                }

                                if ( $request->get('SEARCH_BY_TARGET_INNO') !== null ) {
                                    $query->where('TARGET_INNO',"like","%".$request->get('SEARCH_BY_TARGET_INNO')."%");
                                }

                                if ( $request->get('SEARCH_BY_TARGET_ONSS') !== null ) {
                                    $query->where('TARGET_ONSS',"like","%".$request->get('SEARCH_BY_TARGET_ONSS')."%");
                                }

                                if ( $request->get('SEARCH_BY_TARGET_PRP') !== null ) {
                                    $query->where('TARGET_PRP',"like","%".$request->get('SEARCH_BY_TARGET_PRP')."%");
                                }

                                if ( $request->get('SEARCH_BY_TARGET_SOCIAL') !== null ) {
                                    $query->where('TARGET_SOCIAL',"like","%".$request->get('SEARCH_BY_TARGET_SOCIAL')."%");
                                }

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
                            ->filter(function ($query) use ($request, $columns) {

                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

                                if ( $request->get('SEARCH_BY_ORIGINE') !== null ) {
                                    $query->where('ORIGINE',"like","%".$request->get('SEARCH_BY_ORIGINE')."%");
                                }

                                if ( $request->get('SEARCH_BY_SYS_DATE_CREATION') !== null ) {
                                    $query->where('SYS_DATE_CREATION',"like","%".$request->get('SEARCH_BY_SYS_DATE_CREATION')."%");
                                }

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
                            ->filter(function ($query) use ($request, $columns) {

                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

                                if ( $request->get('SEARCH_BY_PAYROLL_OUTSOURCER_TYPE') !== null ) {
                                    $query->where('PAYROLL_OUTSOURCER_TYPE',"like","%".$request->get('SEARCH_BY_PAYROLL_OUTSOURCER_TYPE')."%");
                                }

                                if ( $request->get('SEARCH_BY_SYS_DATE_CREATION') !== null ) {
                                    $query->where('SYS_DATE_CREATION',"like","%".$request->get('SEARCH_BY_SYS_DATE_CREATION')."%");
                                }

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
                            ->filter(function ($query) use ($request, $columns) {

                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

                                if ( $request->get('SEARCH_BY_CODE_ISO') !== null ) {
                                    $query->where('CODE_ISO',"like","%".$request->get('SEARCH_BY_CODE_ISO')."%");
                                }

                                if ( $request->get('SEARCH_BY_CONTINENT') !== null ) {
                                    $query->where('CONTINENT',"like","%".$request->get('SEARCH_BY_CONTINENT')."%");
                                }

                                if ( $request->get('SEARCH_BY_INDICATIF_TEL') !== null ) {
                                    $query->where('INDICATIF_TEL',"like","%".$request->get('SEARCH_BY_INDICATIF_TEL')."%");
                                }

                                if ( $request->get('SEARCH_BY_NOM_PAYS') !== null ) {
                                    $query->where('NOM_PAYS',"like","%".$request->get('SEARCH_BY_NOM_PAYS')."%");
                                }

                                if ( $request->get('SEARCH_BY_LATITUDE') !== null ) {
                                    $query->where('LATITUDE',"like","%".$request->get('SEARCH_BY_LATITUDE')."%");
                                }

                                if ( $request->get('SEARCH_BY_LONGITUDE') !== null ) {
                                    $query->where('LONGITUDE',"like","%".$request->get('SEARCH_BY_LONGITUDE')."%");
                                }

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
                            ->filter(function ($query) use ($request, $columns) {

                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

                                if ( $request->get('SEARCH_BY_SECTEUR_GEO') !== null ) {
                                    $query->where('SECTEUR_GEO',"like","%".$request->get('SEARCH_BY_SECTEUR_GEO')."%");
                                }

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
                            ->filter(function ($query) use ($request, $columns) {

                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

                                if ( $request->get('SEARCH_BY_SEGMENT') !== null ) {
                                    $query->where('SEGMENT',"like","%".$request->get('SEARCH_BY_SEGMENT')."%");
                                }

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
                            ->filter(function ($query) use ($request, $columns) {

                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

                                if ( $request->get('SEARCH_BY_NIVEAU') !== null ) {
                                    $query->where('NIVEAU',"like","%".$request->get('SEARCH_BY_NIVEAU')."%");
                                }

                                if ( $request->get('SEARCH_BY_SITUATION_JURIDIQUE') !== null ) {
                                    $query->where('SITUATION_JURIDIQUE',"like","%".$request->get('SEARCH_BY_SITUATION_JURIDIQUE')."%");
                                }

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
                            ->filter(function ($query) use ($request, $columns) {

                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

                                if ( $request->get('SEARCH_BY_SUB_SECTOR') !== null ) {
                                    $query->where('SUB_SECTOR',"like","%".$request->get('SEARCH_BY_SUB_SECTOR')."%");
                                }

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
                            ->filter(function ($query) use ($request, $columns) {

                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

                                if ( $request->get('SEARCH_BY_NIVEAU') !== null ) {
                                    $query->where('NIVEAU',"like","%".$request->get('SEARCH_BY_NIVEAU')."%");
                                }

                                if ( $request->get('SEARCH_BY_PARTNER') !== null ) {
                                    $query->where('PARTNER',"like","%".$request->get('SEARCH_BY_PARTNER')."%");
                                }

                                if ( $request->get('SEARCH_BY_TYPE_FICHE') !== null ) {
                                    $query->where('TYPE_FICHE',"like","%".$request->get('SEARCH_BY_TYPE_FICHE')."%");
                                }

                                if ( $request->get('SEARCH_BY_SUPPLIER') !== null ) {
                                    $query->where('SUPPLIER',"like","%".$request->get('SEARCH_BY_SUPPLIER')."%");
                                }

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
                            ->filter(function ($query) use ($request, $columns) {

                                foreach ($columns as $column) { // filtro por llaves foráneas
                                    if (str_contains($column, "PID_")) {
                                        if ( $request->get('SEARCH_BY_'.$column) !== null ) {
                                            $query->where($column, $request->get('SEARCH_BY_'.$column));
                                        }
                                    }
                                }

                                if ( $request->get('SEARCH_BY_TYPE_ADRESSE') !== null ) {
                                    $query->where('TYPE_ADRESSE',"like","%".$request->get('SEARCH_BY_TYPE_ADRESSE')."%");
                                }

                            })
                            ->toJson();
    }

}
