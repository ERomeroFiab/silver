<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AideMissionMotif extends Model
{
    use HasFactory;

    protected $table = 'aide_mission_motif';
    public $timestamps = false;
    protected $primaryKey = 'ID_AIDE_MISSION_MOTIF';
    protected $keyType = "string";
}
