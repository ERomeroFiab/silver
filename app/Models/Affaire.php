<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affaire extends Model
{
    use HasFactory;

    protected $table = 'affaire';
    public $timestamps = false;
    protected $primaryKey = 'ID_AFFAIRE';
    protected $keyType = "string";

    public function identification()
    {
        return $this->belongsTo('App\Models\Identification', 'ID_IDENTIFICATION', 'PID_IDENTIFICATION');
    }

    public function contrat()
    {
        return $this->belongsTo('App\Models\Contrat', 'ID_CONTRAT', 'PID_CONTRAT');
    }
}
