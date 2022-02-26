<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AideAffairePerte extends Model
{
    use HasFactory;

    protected $table = 'aide_affaire_perte';
    public $timestamps = false;
    protected $primaryKey = 'ID_AIDE_AFFAIRE_PERTE';
    protected $keyType = "string";
}
