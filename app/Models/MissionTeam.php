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
        return $this->belongsTo('App\Models\Identification', 'ID_IDENTIFICATION', 'PID_IDENTIFICATION');
    }

}
