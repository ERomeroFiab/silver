<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AideEventsStatu extends Model
{
    use HasFactory;

    protected $table = 'aide_events_status';
    public $timestamps = false;
    protected $primaryKey = 'ID_AIDE_EVENTS_STATUS';
    protected $keyType = "string";
}
