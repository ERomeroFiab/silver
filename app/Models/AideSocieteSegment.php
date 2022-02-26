<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AideSocieteSegment extends Model
{
    use HasFactory;

    protected $table = 'aide_societe_segment';
    public $timestamps = false;
    protected $primaryKey = 'ID_AIDE_SOCIETE_SEGMENT';
    protected $keyType = "string";
}
