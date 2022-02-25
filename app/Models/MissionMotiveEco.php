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
        return $this->belongsTo('App\Models\MissionMotive', 'ID_MISSION_MOTIVE', 'PID_MISSION_MOTIVE');
    }
}
