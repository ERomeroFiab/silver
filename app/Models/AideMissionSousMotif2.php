<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AideMissionSousMotif2 extends Model
{
    use HasFactory;

    protected $table = 'aide_mission_sous_motif2';
    public $timestamps = false;
    protected $primaryKey = 'ID_AIDE_MISSION_SOUS_MOTIF2';
    protected $keyType = "string";
}
