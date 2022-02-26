<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AideContratTypeReconduction extends Model
{
    use HasFactory;

    protected $table = 'aide_contrat_type_reconduction';
    public $timestamps = false;
    protected $primaryKey = 'ID_AIDE_CONTRAT_TYPE_RECONDUCTION';
    protected $keyType = "string";
}
