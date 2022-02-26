<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AideMissionSousMotif1 extends Model
{
    use HasFactory;

    protected $table = 'aide_mission_sous_motif1';
    public $timestamps = false;
    protected $primaryKey = 'ID_AIDE_MISSION_SOUS_MOTIF1';
    protected $keyType = "string";
}
