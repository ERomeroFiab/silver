<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    use HasFactory;

    protected $table = 'mission';
    public $timestamps = false;
    protected $primaryKey = 'ID_MISSION';
    protected $keyType = "string";

    public function identification()
    {
        return $this->belongsTo('App\Models\Identification', 'PID_IDENTIFICATION', 'ID_IDENTIFICATION');
    }

    public function contrat()
    {
        return $this->belongsTo('App\Models\Contrat', 'PID_CONTRAT', 'ID_CONTRAT');
    }

    public function actions()
    {
        return $this->hasMany('App\Models\Action', 'PID_MISSION', 'ID_MISSION');
    }

    public function documents()
    {
        return $this->hasMany('App\Models\Document', 'PID_MISSION', 'ID_MISSION');
    }

    // public function emails()
    // {
    //     return $this->hasMany('App\Models\Action', 'PID_MISSION', 'ID_MISSION');
    // }

    // public function mission_audit_reports()
    // {
    //     return $this->hasMany('App\Models\Action', 'PID_MISSION', 'ID_MISSION');
    // }

    // public function mission_cnaes()
    // {
    //     return $this->hasMany('App\Models\Action', 'PID_MISSION', 'ID_MISSION');
    // }

    public function mission_motives()
    {
        return $this->hasMany('App\Models\MissionMotive', 'PID_MISSION', 'ID_MISSION');
    }

    public function mission_motive_historique_majs()
    {
        return $this->hasMany('App\Models\MissionMotiveHistoriqueMaj', 'PID_MISSION', 'ID_MISSION');
    }

    // public function mission_sites()
    // {
    //     return $this->hasMany('App\Models\Action', 'PID_MISSION', 'ID_MISSION');
    // }

    public function mission_teams()
    {
        return $this->hasMany('App\Models\MissionTeam', 'PID_MISSION', 'ID_MISSION');
    }

    
}
