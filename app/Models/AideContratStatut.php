<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AideContratStatut extends Model
{
    use HasFactory;

    protected $table = 'aide_contrat_statut';
    public $timestamps = false;
    protected $primaryKey = 'ID_AIDE_CONTRAT_STATUT';
    protected $keyType = "string";
}
