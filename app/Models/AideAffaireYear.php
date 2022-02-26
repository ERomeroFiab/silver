<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AideAffaireYear extends Model
{
    use HasFactory;

    protected $table = 'aide_affaire_year';
    public $timestamps = false;
    protected $primaryKey = 'ID_AIDE_AFFAIRE_YEAR';
    protected $keyType = "string";
}
