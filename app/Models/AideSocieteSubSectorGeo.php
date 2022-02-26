<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AideSocieteSubSectorGeo extends Model
{
    use HasFactory;

    protected $table = 'aide_societe_sub_sector_geo';
    public $timestamps = false;
    protected $primaryKey = 'ID_AIDE_SOCIETE_SUB_SECTOR_GEO';
    protected $keyType = "string";
}
