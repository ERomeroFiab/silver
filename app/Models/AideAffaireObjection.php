<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AideAffaireObjection extends Model
{
    use HasFactory;

    protected $table = 'aide_affaire_objections';
    public $timestamps = false;
    protected $primaryKey = 'ID_AIDE_AFFAIRE_OBJECTIONS';
    protected $keyType = "string";
}
