<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AideSocieteFormeJuridique extends Model
{
    use HasFactory;

    protected $table = 'aide_societe_forme_juridique';
    public $timestamps = false;
    protected $primaryKey = 'ID_AIDE_SOCIETE_FORME_JURIDIQUE';
    protected $keyType = "string";
}
