<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AideSocieteCa extends Model
{
    use HasFactory;

    protected $table = 'aide_societe_ca';
    public $timestamps = false;
    protected $primaryKey = 'ID_AIDE_SOCIETE_CA';
    protected $keyType = "string";
}
