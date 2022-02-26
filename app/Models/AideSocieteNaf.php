<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AideSocieteNaf extends Model
{
    use HasFactory;

    protected $table = 'aide_societe_naf';
    public $timestamps = false;
    protected $primaryKey = 'ID_AIDE_SOCIETE_NAF';
    protected $keyType = "string";
}
