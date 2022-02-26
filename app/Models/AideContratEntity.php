<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AideContratEntity extends Model
{
    use HasFactory;

    protected $table = 'aide_contrat_entity';
    public $timestamps = false;
    protected $primaryKey = 'ID_AIDE_CONTRAT_ENTITY';
    protected $keyType = "string";
}
