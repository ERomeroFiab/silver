<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AffaireIntervenant extends Model
{
    use HasFactory;

    protected $table = 'affaire_intervenants';
    public $timestamps = false;
    protected $primaryKey = 'ID_AFFAIRE_INTERVENANTS';
    protected $keyType = "string";

    public function identification()
    {
        return $this->belongsTo('App\Models\Identification', 'ID_IDENTIFICATION', 'PID_IDENTIFICATION');
    }
}
