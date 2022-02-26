<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AideSocieteTypeAdr extends Model
{
    use HasFactory;

    protected $table = 'aide_societe_typeadr';
    public $timestamps = false;
    protected $primaryKey = 'ID_AIDE_SOCIETE_TYPEADR';
    protected $keyType = "string";
}
