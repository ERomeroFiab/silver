<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContratPartielConditionFianciere extends Model
{
    use HasFactory;

    protected $table = 'contrat_partiel_condition_fiancieres';
    public $timestamps = false;
    protected $primaryKey = 'ID_CONTRAT_PARTIEL_CONDITION_FIANCIERES';
    protected $keyType = "string";

    public function contrat()
    {
        return $this->belongsTo('App\Models\Contrat', 'PID_CONTRAT', 'ID_CONTRAT');
    }

    public function contrat_detail_produit()
    {
        return $this->belongsTo('App\Models\ContratDetailProduit', 'PID_CONTRAT_DETAIL_PRODUIT', 'ID_CONTRAT_DETAIL_PRODUIT');
    }
}
