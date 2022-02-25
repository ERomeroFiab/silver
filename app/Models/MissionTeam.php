<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MissionTeam extends Model
{
    use HasFactory;

    protected $table = 'mission_team';
    public $timestamps = false;
    protected $primaryKey = 'ID_MISSION_TEAM';
    protected $keyType = "string";

    public function identification()
    {
        return $this->belongsTo('App\Models\Identification', 'PID_IDENTIFICATION', 'ID_IDENTIFICATION');
    }

    public function mission()
    {
        return $this->belongsTo('App\Models\Mission', 'PID_MISSION', 'ID_MISSION');
    }

}
