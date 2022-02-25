<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    use HasFactory;

    protected $table = 'action';
    public $timestamps = false;
    protected $primaryKey = 'ID_ACTION';
    protected $keyType = "string";
    // public $incrementing = false;

    public function identification()
    {
        return $this->belongsTo('App\Models\Identification', 'ID_IDENTIFICATION', 'PID_IDENTIFICATION');
    }

    public function contrat()
    {
        return $this->belongsTo('App\Models\Contrat', 'ID_CONTRAT', 'PID_CONTRAT');
    }

    public function affaire()
    {
        return $this->belongsTo('App\Models\Affaire', 'ID_AFFAIRE', 'PID_AFFAIRE');
    }
}
