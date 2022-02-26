<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AideMissionStep extends Model
{
    use HasFactory;

    protected $table = 'aide_mission_step';
    public $timestamps = false;
    protected $primaryKey = 'ID_AIDE_MISSION_STEP';
    protected $keyType = "string";

    public function aide_mission_motif()
    {
        return $this->belongsTo('App\Models\AideMissionMotif', 'PID_AIDE_MISSION_MOTIF', 'ID_AIDE_MISSION_MOTIF');
    }
}
