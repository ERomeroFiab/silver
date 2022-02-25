<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocieteFamille extends Model
{
    use HasFactory;

    protected $table = 'societe_famille';
    public $timestamps = false;
    protected $primaryKey = 'ID_SOCIETE_FAMILLE';
    protected $keyType = "string";

    public function identification()
    {
        return $this->belongsTo('App\Models\Identification', 'ID_IDENTIFICATION', 'PID_IDENTIFICATION');
    }
}
