<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrat extends Model
{
    use HasFactory;

    protected $table = 'contrat';
    public $timestamps = false;
    protected $primaryKey = 'ID_CONTRAT';
    protected $keyType = "string";

    public function identification()
    {
        return $this->belongsTo('App\Models\Identification', 'PID_IDENTIFICATION', 'ID_IDENTIFICATION');
    }

    public function contact()
    {
        return $this->belongsTo('App\Models\Contact', 'PID_CONTACT', 'ID_CONTACT');
    }

    public function aide_offre_condition()
    {
        return $this->belongsTo('App\Models\AideOffreCondition', 'PID_AIDE_OFFRE_CONDITION', 'ID_AIDE_OFFRE_CONDITION');
    }

    public function actions()
    {
        return $this->hasMany('App\Models\Action', 'PID_CONTRAT', 'ID_CONTRAT');
    }

    public function affaires()
    {
        return $this->hasMany('App\Models\Affaire', 'PID_CONTRAT', 'ID_CONTRAT');
    }

    public function contrat_detail_produits()
    {
        return $this->hasMany('App\Models\ContratDetailProduit', 'PID_CONTRAT', 'ID_CONTRAT');
    }

    // public function contrat_parcs()
    // {
    //     return $this->hasMany('App\Models\xxx', 'PID_CONTRAT', 'ID_CONTRAT');
    // }

    public function contrat_partiel_condition_fiancieres()
    {
        return $this->hasMany('App\Models\ContratPartielConditionFianciere', 'PID_CONTRAT', 'ID_CONTRAT');
    }

    // public function contrat_revue_annuelle()
    // {
    //     return $this->hasMany('App\Models\xxx', 'PID_CONTRAT', 'ID_CONTRAT');
    // }

    public function documents()
    {
        return $this->hasMany('App\Models\Document', 'PID_CONTRAT', 'ID_CONTRAT');
    }

    // public function emails()
    // {
    //     return $this->hasMany('App\Models\xxx', 'PID_CONTRAT', 'ID_CONTRAT');
    // }

    public function invoices()
    {
        return $this->hasMany('App\Models\Invoice', 'PID_CONTRAT', 'ID_CONTRAT');
    }

    public function missions()
    {
        return $this->hasMany('App\Models\Mission', 'PID_CONTRAT', 'ID_CONTRAT');
    }

    // public function tickets()
    // {
    //     return $this->hasMany('App\Models\xxx', 'PID_CONTRAT', 'ID_CONTRAT');
    // }
}
