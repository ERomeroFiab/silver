<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContratDetailProduit extends Model
{
    use HasFactory;

    protected $table = 'contrat';
    public $timestamps = false;
    protected $primaryKey = 'ID_CONTRAT';
    protected $keyType = "string";

    public function identification()
    {
        return $this->belongsTo('App\Models\Identification', 'ID_IDENTIFICATION', 'PID_IDENTIFICATION');
    }
}