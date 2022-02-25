<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Identification extends Model
{
    use HasFactory;

    protected $table = 'identification';
    public $timestamps = false;
    protected $primaryKey = 'ID_IDENTIFICATION';
    protected $keyType = "string";

    public function actions()
    {
        return $this->hasMany('App\Models\Action', 'PID_IDENTIFICATION', 'ID_IDENTIFICATION');
    }

    // public function action_marketings()
    // {
    //     return $this->hasMany('App\Models\ActionMarketing', 'PID_IDENTIFICATION', 'ID_IDENTIFICATION');
    // }

    // public function adresses()
    // {
    //     return $this->hasMany('App\Models\Adresse', 'PID_IDENTIFICATION', 'ID_IDENTIFICATION');
    // }

    public function affaires()
    {
        return $this->hasMany('App\Models\Affaire', 'PID_IDENTIFICATION', 'ID_IDENTIFICATION');
    }

    // public function affaire_intervenants()
    // {
    //     return $this->hasMany('App\Models\AffaireIntervenant', 'PID_IDENTIFICATION', 'ID_IDENTIFICATION');
    // }

    public function contacts()
    {
        return $this->hasMany('App\Models\Contact', 'PID_IDENTIFICATION', 'ID_IDENTIFICATION');
    }

    public function contrats()
    {
        return $this->hasMany('App\Models\Contrat', 'PID_IDENTIFICATION', 'ID_IDENTIFICATION');
    }

    public function contrat_detail_produits()
    {
        return $this->hasMany('App\Models\ContratDetailProduit', 'PID_IDENTIFICATION', 'ID_IDENTIFICATION');
    }

    // public function contrat_fournisseurs()
    // {
    //     return $this->hasMany('App\Models\YYYYYYYYYY', 'PID_IDENTIFICATION', 'ID_IDENTIFICATION');
    // }

    public function documents()
    {
        return $this->hasMany('App\Models\Document', 'PID_IDENTIFICATION', 'ID_IDENTIFICATION');
    }

    // public function echantillon()
    // {
    //     return $this->hasMany('App\Models\YYYYYYYYYY', 'PID_IDENTIFICATION', 'ID_IDENTIFICATION');
    // }

    // public function emails()
    // {
    //     return $this->hasMany('App\Models\YYYYYYYYYY', 'PID_IDENTIFICATION', 'ID_IDENTIFICATION');
    // }

    // public function events()
    // {
    //     return $this->hasMany('App\Models\YYYYYYYYYY', 'PID_IDENTIFICATION', 'ID_IDENTIFICATION');
    // }

    // public function identification_lies()
    // {
    //     return $this->hasMany('App\Models\YYYYYYYYYY', 'PID_IDENTIFICATION', 'ID_IDENTIFICATION');
    // }

    public function identification_notes()
    {
        return $this->hasMany('App\Models\IdentificationNote', 'PID_IDENTIFICATION', 'ID_IDENTIFICATION');
    }

    public function invoices()
    {
        return $this->hasMany('App\Models\Invoice', 'PID_IDENTIFICATION', 'ID_IDENTIFICATION');
    }

    // public function lignes_factures()
    // {
    //     return $this->hasMany('App\Models\YYYYYYYYYY', 'PID_IDENTIFICATION', 'ID_IDENTIFICATION');
    // }

    public function missions()
    {
        return $this->hasMany('App\Models\Mission', 'PID_IDENTIFICATION', 'ID_IDENTIFICATION');
    }

    // public function mission_audit_reports()
    // {
    //     return $this->hasMany('App\Models\YYYYYYYYYY', 'PID_IDENTIFICATION', 'ID_IDENTIFICATION');
    // }

    // public function mission_sites()
    // {
    //     return $this->hasMany('App\Models\YYYYYYYYYY', 'PID_IDENTIFICATION', 'ID_IDENTIFICATION');
    // }

    public function mission_teams()
    {
        return $this->hasMany('App\Models\MissionTeam', 'PID_IDENTIFICATION', 'ID_IDENTIFICATION');
    }

    // public function note_frais_details()
    // {
    //     return $this->hasMany('App\Models\YYYYYYYYYY', 'PID_IDENTIFICATION', 'ID_IDENTIFICATION');
    // }

    // public function offre_entetes()
    // {
    //     return $this->hasMany('App\Models\YYYYYYYYYY', 'PID_IDENTIFICATION', 'ID_IDENTIFICATION');
    // }

    // public function parcs()
    // {
    //     return $this->hasMany('App\Models\YYYYYYYYYY', 'PID_IDENTIFICATION', 'ID_IDENTIFICATION');
    // }

    // public function prepa_mailings()
    // {
    //     return $this->hasMany('App\Models\YYYYYYYYYY', 'PID_IDENTIFICATION', 'ID_IDENTIFICATION');
    // }

    // public function reclamations()
    // {
    //     return $this->hasMany('App\Models\YYYYYYYYYY', 'PID_IDENTIFICATION', 'ID_IDENTIFICATION');
    // }

    // public function sms()
    // {
    //     return $this->hasMany('App\Models\YYYYYYYYYY', 'PID_IDENTIFICATION', 'ID_IDENTIFICATION');
    // }

    // public function societe_commission_paritaires()
    // {
    //     return $this->hasMany('App\Models\YYYYYYYYYY', 'PID_IDENTIFICATION', 'ID_IDENTIFICATION');
    // }

    public function societe_familles()
    {
        return $this->hasMany('App\Models\SocieteFamille', 'PID_IDENTIFICATION', 'ID_IDENTIFICATION');
    }

    // public function societe_subvenciones()
    // {
    //     return $this->hasMany('App\Models\YYYYYYYYYY', 'PID_IDENTIFICATION', 'ID_IDENTIFICATION');
    // }

    // public function tickets()
    // {
    //     return $this->hasMany('App\Models\YYYYYYYYYY', 'PID_IDENTIFICATION', 'ID_IDENTIFICATION');
    // }

    // public function tliste_societes()
    // {
    //     return $this->hasMany('App\Models\YYYYYYYYYY', 'PID_IDENTIFICATION', 'ID_IDENTIFICATION');
    // }
}
