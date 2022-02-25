<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indicator extends Model
{
    use HasFactory;

    protected $table = 'indicators';
    public $timestamps = false;
    protected $primaryKey = 'ID_INDICATORS';
    protected $keyType = "string";

    // public function societe_famille()
    // {
    //     return $this->belongsTo('App\Models\SocieteFamille', 'ID_SOCIETE_FAMILLE', 'PID_SOCIETE_FAMILLE');
    // }
}
