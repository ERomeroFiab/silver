<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AideSocieteOrigine extends Model
{
    use HasFactory;

    protected $table = 'aide_societe_origine';
    public $timestamps = false;
    protected $primaryKey = 'ID_AIDE_SOCIETE_ORIGINE';
    protected $keyType = "string";
}
