<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AideOffreCondition extends Model
{
    use HasFactory;

    protected $table = 'aide_offre_condition';
    public $timestamps = false;
    protected $primaryKey = 'ID_AIDE_OFFRE_CONDITION';
    protected $keyType = "string";

    public function contrats()
    {
        return $this->hasMany('App\Models\Contrat', 'PID_AIDE_OFFRE_CONDITION', 'ID_AIDE_OFFRE_CONDITION');
    }
}
