<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AideEventsQualification extends Model
{
    use HasFactory;

    protected $table = 'aide_events_qualification';
    public $timestamps = false;
    protected $primaryKey = 'ID_AIDE_EVENTS_QUALIFICATION';
    protected $keyType = "string";
}
