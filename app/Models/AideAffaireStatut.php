<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AideAffaireStatut extends Model
{
    use HasFactory;

    protected $table = 'aide_affaire_statut';
    public $timestamps = false;
    protected $primaryKey = 'ID_AIDE_AFFAIRE_STATUT';
    protected $keyType = "string";
}
