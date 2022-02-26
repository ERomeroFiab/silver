<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AideActionResultat extends Model
{
    use HasFactory;

    protected $table = 'aide_action_resultat';
    public $timestamps = false;
    protected $primaryKey = 'ID_AIDE_ACTION_RESULTAT';
    protected $keyType = "string";
}
