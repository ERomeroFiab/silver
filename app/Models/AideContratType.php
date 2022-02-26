<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AideContratType extends Model
{
    use HasFactory;

    protected $table = 'aide_contrat_type';
    public $timestamps = false;
    protected $primaryKey = 'ID_AIDE_CONTRAT_TYPE';
    protected $keyType = "string";
}
