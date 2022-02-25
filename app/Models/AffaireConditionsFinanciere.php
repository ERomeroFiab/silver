<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AffaireConditionsFinanciere extends Model
{
    use HasFactory;

    protected $table = 'affaire_conditions_financieres';
    public $timestamps = false;
    protected $primaryKey = 'ID_AFFAIRE_CONDITIONS_FINANCIERES';
    protected $keyType = "string";

    public function affaire()
    {
        return $this->belongsTo('App\Models\Affaire', 'ID_AFFAIRE', 'PID_AFFAIRE');
    }
}
