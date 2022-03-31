<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Identification;
use App\Models\MissionMotiveEco;
use Illuminate\Support\Facades\Validator;

class RazonSocialController extends Controller
{
    public function get_razones_sociales()
    {
        $razones_sociales = Identification::where('TYPE_FICHE', 'Client')->get();
        return response()->json($razones_sociales);
    }
    public function get_razones_sociales_by_group_name( Request $request )
    {
        $validator = Validator::make($request->all(), [
            'group_name'  => 'required|string|exists:identification,GROUP',
        ]);

        if ( $validator->fails() ) {
            return response()->json([
                'status'  => 'error',
                'message' => $validator->errors(),
            ], 400);
        }

        $relations = [
            'invoices',
            'missions',
            'missions.mission_motives',
            'missions.mission_motives.mission_motive_ecos',
        ];
        
        $razones_sociales = Identification::where( 'GROUP', $request->get('group_name') )->with( $relations )->get()->toArray();
        // $razones_sociales = mb_convert_encoding($razones_sociales, 'UTF-8', 'UTF-8');
        return response()->json($razones_sociales);
    }

    public function get_razon_social_by_rut( Request $request )
    {
        $validator = Validator::make($request->all(), [
            'rut'  => 'required|string|exists:identification,SIRET',
        ]);

        if ( $validator->fails() ) {
            return response()->json([
                'status'  => 'error',
                'message' => $validator->errors(),
            ], 400);
        }
        
        $relations = [
            // primer nivel
            'actions',
            'affaires',
            'contacts',
            'contrats',
            'contrat_detail_produits',
            // 'documents',
            'identification_notes',
            'invoices',
            'missions',
            'mission_teams',
            'societe_familles',
            // 2DO NIVEL - actions
            // 'actions.contrat',
            // 'actions.affaire',
            // 'actions.contact',
            // 'actions.mission',
            'actions.action_intervenants_fiabilis',
            // 'actions.documents',
            // 2DO NIVEL - affaires
            // 'affaires.actions',
            'affaires.affaire_conditions_financieres',
            'affaires.affaire_objections',
            'affaires.historique_maj_affaire',
            // 2DO NIVEL - contacts
            // 'contacts.actions',
            // 'contacts.affaires',
            // 'contacts.contrats',
            // 'contacts.documents',
            // 2DO NIVEL - contrats
            // 'contrats.actions',
            // 'contrats.affaires',
            // 'contrats.contrat_detail_produits',
            'contrats.contrat_partiel_condition_fiancieres',
            // 'contrats.documents',
            // 'contrats.invoices',
            // 'contrats.missions',
            // 2DO NIVEL - contrat_detail_produits
            'contrat_detail_produits.contrat_partiel_condition_fiancieres',
            'contrat_detail_produits.missions',
            // 2DO NIVEL - invoices
            'invoices.invoice_lignes',
            // 2DO NIVEL - missions
            'missions.actions',
            'missions.mission_motives',
            'missions.mission_motive_historique_majs',
            'missions.mission_teams',
            // 3ER NIVEL - missions.mission_motives
            'missions.mission_motives.mission_motive_ecos',
            'missions.mission_motives.mission_motive_historique_majs',
            // 4TO NIVEL - missions
            'missions.mission_motives.mission_motive_ecos.invoice_lignes',

        ];

        $razon_social = Identification::where( 'SIRET', $request->get('rut') )->with( $relations )->first()->toArray();
        $razon_social = mb_convert_encoding($razon_social, 'UTF-8', 'UTF-8');
        
        return response()->json($razon_social);
    }

    public function get_ecos()
    {
        $relations = [
            'invoice_ligne',
            'mission_motive',
            'mission_motive.mission',
            'mission_motive.mission.identification',
            'mission_motive.mission.contrat',
            'mission_motive.mission.contrat_detail_produit',
        ];
        $ecos = MissionMotiveEco::with($relations)->get();
        return response()->json($ecos);
    }

    public function get_ecos_by_razon_social( Request $request )
    {
        $validator = Validator::make($request->all(), [
            'rut'  => 'required|string|exists:identification,SIRET',
        ]);

        if ( $validator->fails() ) {
            return response()->json([
                'status'  => 'error',
                'message' => $validator->errors(),
            ], 400);
        }

        $relations = [
            'invoice_ligne',
            'mission_motive',
            'mission_motive.mission',
            'mission_motive.mission.identification',
            'mission_motive.mission.contrat',
            'mission_motive.mission.contrat_detail_produit',
        ];
        
        $rut = $request->get('rut');

        $ecos = MissionMotiveEco::whereHas('mission_motive', function($q) use ($rut){
            $q->whereHas('mission', function($q2) use ($rut){
                $q2->whereHas('identification', function ($q3) use ($rut){
                    $q3->where('SIRET', $rut);
                });
            });
        })
        ->with($relations)->get();

        return response()->json($ecos);
    }
}
