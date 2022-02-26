<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AideSocieteComune extends Model
{
    use HasFactory;

    protected $table = 'aide_societe_commune';
    public $timestamps = false;
    protected $primaryKey = 'ID_AIDE_SOCIETE_COMMUNE';
    protected $keyType = "string";
}
