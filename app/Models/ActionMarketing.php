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

    public function identification()
    {
        return $this->belongsTo('App\Models\Identification', 'ID_IDENTIFICATION', 'PID_IDENTIFICATION');
    }
}
