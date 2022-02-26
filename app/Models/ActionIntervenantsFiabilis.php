<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActionIntervenantsFiabilis extends Model
{
    use HasFactory;

    protected $table = 'action_intervenants_fiabilis';
    public $timestamps = false;
    protected $primaryKey = 'ID_ACTION_INTERVENANTS_FIABILIS';
    protected $keyType = "string";

    public function action()
    {
        return $this->belongsTo('App\Models\Action', 'PID_ACTION', 'ID_ACTION');
    }
}
