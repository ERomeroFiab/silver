<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MissionMotive extends Model
{
    use HasFactory;
    
    protected $table = 'mission_motive';
    public $timestamps = false;
    protected $primaryKey = 'ID_MISSION_MOTIVE';
    protected $keyType = "string";

    public function mission()
    {
        return $this->belongsTo('App\Models\Mission', 'ID_MISSION', 'PID_MISSION');
    }

    public function mission_motive_ecos()
    {
        return $this->hasMany('App\Models\MissionMotiveEco', 'PID_MISSION_MOTIVE', 'ID_MISSION_MOTIVE');
    }

    public function mission_motive_historique_majs()
    {
        return $this->hasMany('App\Models\MissionMotiveHistoriqueMaj', 'PID_MISSION_MOTIVE', 'ID_MISSION_MOTIVE');
    }
}
