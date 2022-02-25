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
        return $this->belongsTo('App\Models\Identification', 'PID_IDENTIFICATION', 'ID_IDENTIFICATION');
    }

    public function contrat()
    {
        return $this->belongsTo('App\Models\Contrat', 'PID_CONTRAT', 'ID_CONTRAT');
    }

    public function affaire()
    {
        return $this->belongsTo('App\Models\Affaire', 'PID_AFFAIRE', 'ID_AFFAIRE');
    }
}
