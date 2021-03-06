<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AideSocieteEffectif extends Model
{
    use HasFactory;

    protected $table = 'aide_societe_effectif';
    public $timestamps = false;
    protected $primaryKey = 'ID_AIDE_SOCIETE_EFFECTIF';
    protected $keyType = "string";
}
