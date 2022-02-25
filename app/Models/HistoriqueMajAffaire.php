<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriqueMajAffaire extends Model
{
    use HasFactory;

    protected $table = 'historique_maj_affaire';
    public $timestamps = false;
    protected $primaryKey = 'ID_HISTORIQUE_MAJ_AFFAIRE';
    protected $keyType = "string";

    public function affaire()
    {
        return $this->belongsTo('App\Models\Affaire', 'ID_AFFAIRE', 'PID_AFFAIRE');
    }
}
