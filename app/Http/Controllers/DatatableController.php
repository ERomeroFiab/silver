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
            'ID_ACTION', 
            'PID_AFFAIRE', 
            'PID_CONTACT', 
            'PID_CONTRAT', 
            'PID_IDENTIFICATION', 
            'PID_LOT', 
            'PID_MISSION', 
            'PID_OFFRE_ENTETE', 
            'PID_RECLAMATION', 
            'ALARME', 
            'BITRIX_CONTACT', 
            'BITRIX_KEY', 
            'CATEGORIE', 
            'CIVILITE', 
            'CODE_CAMPAGNE', 
            'DATE_ALARME', 
            'DATE_DEBUT', 
            'DATE_FIN', 
            'DUREE_CHRONO', 
            'EMPLACEMENT', 
            'E_MAIL', 
            'FAIT', 
            'HEURE_ALARME', 
            'HEURE_DEBUT', 
            'HEURE_FIN', 
            'NB_MINUTES_AVANT_ALARME', 
            'NOM', 
            'NOTE', 
            'NO_AFFAIRE', 
            'NO_CONTRAT', 
            'NO_LOT', 
            'NO_MISSION', 
            'NO_OFFRE', 
            'NO_RECLAMATION', 
            'OBJET', 
            'ORIGINE_ACTION', 
            'PRENOM', 
            'PRODUIT', 
            'RESULTAT', 
            'SUIVI_PAR', 
            'SYS_DATE_CREATION', 
            'SYS_DATE_EXCHANGE', 
            'SYS_DATE_MODIFICATION', 
            'SYS_HEURE_CREATION', 
            'SYS_HEURE_MODIFICATION', 
            'SYS_ID_EXCHANGE', 
            'SYS_SYNCHRO_CODE_POSTE', 
            'SYS_SYNCHRO_DATE_ENREG', 
            'SYS_USER_CREATION', 
            'SYS_USER_MODIFICATION', 
            'TYPE_EVENEMENT', 
            'VP_N_ACTION', 
            'VP_N_AFFAIRE', 
            'VP_N_CONTACT', 
        ];

        $relations = [
            // '',
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
            'PID_ACTION', 
            'LOGIN', 
            'SYS_DATE_CREATION', 
            'SYS_DATE_MODIFICATION', 
            'SYS_HEURE_CREATION', 
            'SYS_HEURE_MODIFICATION', 
            'SYS_USER_CREATION', 
            'SYS_USER_MODIFICATION', 
        ];

        $relations = [
            // '',
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
            'ID_AFFAIRE',  
            'PID_CONCURRENT',  
            'PID_CONTACT',  
            'PID_CONTRAT',  
            'PID_IDENTIFICATION',  
            'BITRIX_KEY',  
            'CIVILITE',  
            'CONCURRENT',  
            'DATE_PERTE',  
            'DATE_PREVISIONNEL',  
            'DATE_SIGNATURE',  
            'EMAIL',  
            'FAMILLE',  
            'IT_COMPTEUR',  
            'MEMO',  
            'MONTANT_PONDERE',  
            'MOTIF_PERTE',  
            'NOM',  
            'NO_AFFAIRE',  
            'PHASE',  
            'PRENOM',  
            'PROBABILITE',  
            'PRODUIT',  
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
            'TOTAL_PREVISIONNEL',  
            'VP_N_AFFAIRE',  
            'VP_N_CONTRAT_CADRE',  
            'VP_N_CONTRAT_PARTIEL',  
            'INTERNATIONAL_SALES',  
        ];

        $relations = [
            // '',
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
            'PID_GROUP', 
            'PID_INTERNATIONAL_GROUP', 
            'PID_PARTNER', 
            'PID_REVENDEUR', 
            'PID_SUSPECTS', 
            'ACTIVITE', 
            'ACTIVITY_INAIL_CLASSIFICATION', 
            'ACTIVITY_INPS_CLASSIFICATION', 
            'ADRESSE1', 
            'ADRESSE2', 
            'ADRESSE3', 
            'AT_AO_BROKER', 
            'AT_AO_CONTRACT_ENDING_DATE', 
            'AT_AO_CONTRACT_STARTING_DATE', 
            'AT_AO_INSURANCE', 
            'AT_AO_POLICE_NBRE', 
            'AUDITEUR', 
            'BELSPO', 
            'BENEFITS', 
            'BITRIX_KEY', 
            'CA', 
            'CA_2', 
            'CA_2_ANNEE', 
            'CA_ANNEE', 
            'CCNL_MAIN', 
            'CCNL_SECONDARY', 
            'CLIENT_SECURE', 
            'CODE_CLIENT', 
            'CODE_NAF', 
            'CODE_NAF2', 
            'CODE_POSTAL', 
            'CODE_TVA_INTRA', 
            'COMPANY_CLASSIFICATION', 
            'COMPL_RAISON_SOC', 
            'CONVENTION_COLLECTIVE_IDCC', 
            'CONVENTION_COLLECTIVE_TITRE', 
            'CREATION_DATE', 
            'CSC_CODE_INPS_CLASSIFICATION', 
            'CSP_ETRANGER', 
            'CSP_FRANCE', 
            'CUSTOMER_RELATIONSHIP_MANAGER', 
            'DIGITAL_INVOICE_ONLY', 
            'DIGITAL_INVOICE_REFUSED', 
            'DMFA_REQUEST', 
            'EFFECTIF', 
            'EFFECTIF_2', 
            'EFFECTIF_NUM', 
            'EFFECTIF_NUM_2', 
            'EMAIL', 
            'EMPLOYEES_USE_CARS', 
            'EPISODES_OF_INTEGRATION_OR_SOLIDARITY', 
            'EPISODES_OF_INTEGRATION_OR_SOLIDARITY_YEAR', 
            'FAX', 
            'FISCAL_CLOSING', 
            'FORME_JURIDIQUE', 
            'FUSION', 
            'GROUP', 
            'HEAD_OFFICE', 
            'HEAD_OFFICE_NAME', 
            'INCORPORATION', 
            'INTERNATIONAL', 
            'INTERNATIONAL_COMPANY', 
            'INTERNATIONAL_GROUP', 
            'INTERNATIONAL_HEAD_OFFICE', 
            'INTERNATIONAL_HEAD_OFFICE_TYPE', 
            'INTERNATIONAL_RESPONSIBLE', 
            'INTERNATIONAL_SECTOR', 
            'INVOICE_LANGUAGE', 
            'IP_BELGIUM', 
            'IP_BRAZIL', 
            'IP_CHILE', 
            'IP_COUNTRY_OF_THE_DECISION_MAKER', 
            'IP_FRANCE', 
            'IP_GERMANY', 
            'IP_ITALY', 
            'IP_POLAND', 
            'IP_SPAIN', 
            'IWT', 
            'KEY_ACCOUNT', 
            'LIQUIDATION', 
            'LISTED_COMPANY', 
            'MAPS_ADRESSE', 
            'MAPS_ADRESSE_PHYSIQUE', 
            'MAPS_CODE_POSTAL', 
            'MAPS_PAYS', 
            'MAPS_VILLE', 
            'NB_ETABLISSEMENTS', 
            'NET_PROFIT', 
            'NOM_EXPEDITEUR', 
            'NUMBER_MANAGERS', 
            'N_CANAL_SFTP', 
            'ONSS_PROTOCOL', 
            'ONSS_TYPE_OF_COMPANY', 
            'ORIGINE', 
            'OT24', 
            'OT24_YEAR', 
            'PARTICULAR_SITUATIONS_INPS_INAIL', 
            'PARTICULAR_SITUATIONS_INPS_INAIL_DETAIL', 
            'PAYROLL_MANAGEMENT', 
            'PAYROLL_OUTSOURCER', 
            'PAYROLL_SOFTWARE', 
            'PAYS', 
            'PERS_MORALE_OU_PERS_PHYSIQUE', 
            'PO_MANDATORY', 
            'RAISON_SOC', 
            'REAL_ECONOMIC_ACTIVITY', 
            'RECO_GROUP', 
            'REVENDEUR', 
            'SAVING_ACTIONS', 
            'SAVING_ACTIONS_OTHERS', 
            'SCORING_FINANCIER', 
            'SCORING_IT_1', 
            'SCORING_IT_2', 
            'SCORING_IT_3', 
            'SCORING_IT_4', 
            'SCORING_IT_5', 
            'SCORING_IT_6', 
            'SCORING_IT_7', 
            'SCORING_IT_8', 
            'SCORING_IT_9', 
            'SCORING_TOTAL', 
            'SECOND_LEVEL_CONTRACTS', 
            'SECRETARIAT_SOCIAL_ADRESSE', 
            'SECRETARIAT_SOCIAL_EMAIL', 
            'SECRETARIAT_SOCIAL_GESTIONNAIRE', 
            'SECRETARIAT_SOCIAL_NOM', 
            'SECRETARIAT_SOCIAL_TEL', 
            'SECTEUR_GEO', 
            'SEGMENT', 
            'SIRET', 
            'SIRET2', 
            'SIRET3', 
            'SITE_WEB', 
            'SITUATION_JURIDIQUE', 
            'SITUATION_JURIDIQUE_DATE', 
            'SOCIAL_CAPITAL', 
            'SPI_CERTIFICADO', 
            'SPI_SUBVENCIONES', 
            'SPLIT', 
            'SUB_SECTOR', 
            'SUIVI_PAR', 
            'SUIVI_PAR_MANUEL', 
            'SUIVI_PAR_REAFF', 
            'SYS_DATE_CREATION', 
            'SYS_DATE_MODIFICATION', 
            'SYS_HEURE_CREATION', 
            'SYS_HEURE_MODIFICATION', 
            'SYS_MAP_ADRESSE_GEOCODEE', 
            'SYS_MAP_LATITUDE', 
            'SYS_MAP_LONGITUDE', 
            'SYS_MAP_QUALITE_GEOCODAGE', 
            'SYS_SYNCHRO_CODE_POSTE', 
            'SYS_SYNCHRO_DATE_ENREG', 
            'SYS_USER_CREATION', 
            'SYS_USER_MODIFICATION', 
            'TARGET_AT', 
            'TARGET_JIB', 
            'TARGET_ONSS', 
            'TARGET_PRP', 
            'TARGET_PRP_CHANTIER', 
            'TARGET_SOCIAL', 
            'TELEPHONE', 
            'TGG_2017', 
            'TGG_2019', 
            'TOP_TARGET_AT', 
            'TOP_TARGET_PRP', 
            'TO_DELETE', 
            'TRANCHE_CA', 
            'TRANCHE_CA_2', 
            'TRANSFER_ABROAD', 
            'TRANSFER_ITALIA', 
            'TYPE_FICHE', 
            'URSSAF', 
            'URSSAF_MDP_NET_ENTREPRISE', 
            'URSSAF_NO_COTISANT1', 
            'URSSAF_NO_COTISANT2', 
            'URSSAF_RATTACHEMENT', 
            'URSSAF_VLU', 
            'VILLE', 
            'VOCE_TARIFFA_NOT_0722_0723', 
            'VP_N_SOCIETE', 
            'WORKFORCE_2_YEAR', 
            'WORKFORCE_YEAR', 
            'PARTNER_UPDATE_DATE', 
            'SINE', 
            'TOP_TARGET_INNO', 
            'TOP_TARGET_ONSS', 
            'UNIVERSITY_GRADUATES', 
            'WORKERS_BLUE_COLLAR', 
            'PAYROLL_OUTSOURCER_TYPE', 
            'TGG_2019_B', 
        ];

        $relations = [
            // '',
        ];

        $datos = Identification::select( $columns )->with( $relations );
        
        return DataTables::eloquent( $datos )
                            ->filter(function ($query) use ($request) {
                                
                                if ( $request->get('search_by_id_identification') ) {
                                    $query->where('ID_IDENTIFICATION', intval($request->get('search_by_id_identification')));
                                }
                            })
                            ->toJson();
    }

    public function get_tabla_contrat( Request $request )
    {
        $columns = [
            'ID_CONTRAT',  
            'PID_AIDE_OFFRE_CONDITION',  
            'PID_CONTACT',  
            'PID_CONTACT_FACTURATION',  
            'PID_IDENTIFICATION',  
            'PID_PARTNER',  
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
