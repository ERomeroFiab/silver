<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActionMarketing extends Model
{
    use HasFactory;

    protected $table = 'action_marketing';
    public $timestamps = false;
    protected $primaryKey = 'ID_ACTION_MARKETING';
    protected $keyType = "string";

    public function identification()
    {
        return $this->belongsTo('App\Models\Identification', 'PID_IDENTIFICATION', 'ID_IDENTIFICATION');
    }
}
