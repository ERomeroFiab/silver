<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AideAffairePhase extends Model
{
    use HasFactory;

    protected $table = 'aide_affaire_phase';
    public $timestamps = false;
    protected $primaryKey = 'ID_AIDE_AFFAIRE_PHASE';
    protected $keyType = "string";
}
