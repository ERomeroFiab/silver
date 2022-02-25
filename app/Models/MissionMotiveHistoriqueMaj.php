<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MissionMotiveHistoriqueMaj extends Model
{
    use HasFactory;

    protected $table = 'mission_motive_historique_maj';
    public $timestamps = false;
    protected $primaryKey = 'ID_MISSION_MOTIVE_HISTORIQUE_MAJ';
    protected $keyType = "string";

    public function mission()
    {
        return $this->belongsTo('App\Models\Mission', 'PID_MISSION', 'ID_MISSION');
    }

    public function mission_motive()
    {
        return $this->belongsTo('App\Models\MissionMotive', 'PID_MISSION_MOTIVE', 'ID_MISSION_MOTIVE');
    }
}
