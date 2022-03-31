<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MissionMotiveEco extends Model
{
    use HasFactory;

    protected $table = 'mission_motive_eco';
    public $timestamps = false;
    protected $primaryKey = 'ID_MISSION_MOTIVE_ECO';
    protected $keyType = "string";

    public function mission_motive()
    {
        return $this->belongsTo('App\Models\MissionMotive', 'PID_MISSION_MOTIVE', 'ID_MISSION_MOTIVE');
    }

    public function invoice_lignes()
    {
        return $this->hasMany('App\Models\InvoiceLigne', 'PID_MISSION_MOTIVE_ECO', 'ID_MISSION_MOTIVE_ECO');
    }

    public function invoice_ligne()
    {
        return $this->hasOne('App\Models\InvoiceLigne', 'PID_MISSION_MOTIVE_ECO', 'ID_MISSION_MOTIVE_ECO');
    }
}
