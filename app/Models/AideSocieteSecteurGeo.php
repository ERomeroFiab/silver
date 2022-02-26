<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AideSocieteSecteurGeo extends Model
{
    use HasFactory;

    protected $table = 'aide_societe_secteur_geo';
    public $timestamps = false;
    protected $primaryKey = 'ID_AIDE_SOCIETE_SECTEUR_GEO';
    protected $keyType = "string";
}
