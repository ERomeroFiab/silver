<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affaire extends Model
{
    use HasFactory;

    protected $table = 'affaire';
    public $timestamps = false;
    protected $primaryKey = 'ID_AFFAIRE';
    protected $keyType = "string";

    public function identification()
    {
        return $this->belongsTo('App\Models\Identification', 'PID_IDENTIFICATION', 'ID_IDENTIFICATION');
    }

    public function contrat()
    {
        return $this->belongsTo('App\Models\Contrat', 'PID_CONTRAT', 'ID_CONTRAT');
    }

    public function action()
    {
        return $this->hasMany('App\Models\Action', 'PID_AFFAIRE', 'ID_AFFAIRE');
    }

    public function affaire_conditions_financieres()
    {
        return $this->hasMany('App\Models\AffaireConditionsFinanciere', 'PID_AFFAIRE', 'ID_AFFAIRE');
    }

    public function affaire_objections()
    {
        return $this->hasMany('App\Models\AffaireObjection', 'PID_AFFAIRE', 'ID_AFFAIRE');
    }

    public function documents()
    {
        return $this->hasMany('App\Models\Document', 'PID_AFFAIRE', 'ID_AFFAIRE');
    }

    public function historique_maj_affaire()
    {
        return $this->hasMany('App\Models\HistoriqueMajAffaire', 'PID_AFFAIRE', 'ID_AFFAIRE');
    }
}
