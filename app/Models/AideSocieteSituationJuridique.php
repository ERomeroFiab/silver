<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AideSocieteSituationJuridique extends Model
{
    use HasFactory;

    protected $table = 'aide_societe_situation_juridique';
    public $timestamps = false;
    protected $primaryKey = 'ID_AIDE_SOCIETE_SITUATION_JURIDIQUE';
    protected $keyType = "string";
}
