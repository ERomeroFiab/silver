<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AideContratModeSignature extends Model
{
    use HasFactory;

    protected $table = 'aide_contrat_mode_signature';
    public $timestamps = false;
    protected $primaryKey = 'ID_AIDE_CONTRAT_MODE_SIGNATURE';
    protected $keyType = "string";
}
