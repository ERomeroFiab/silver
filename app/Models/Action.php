<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    use HasFactory;

    protected $table = 'action';
    public $timestamps = false;
    protected $primaryKey = 'ID_ACTION';
    protected $keyType = "string";
    // public $incrementing = false;

    public function identification()
    {
        return $this->belongsTo('App\Models\Identification', 'PID_IDENTIFICATION', 'ID_IDENTIFICATION');
    }

    public function contrat()
    {
        return $this->belongsTo('App\Models\Contrat', 'PID_CONTRAT', 'ID_CONTRAT');
    }

    public function affaire()
    {
        return $this->belongsTo('App\Models\Affaire', 'PID_AFFAIRE', 'ID_AFFAIRE');
    }

    public function contact()
    {
        return $this->belongsTo('App\Models\Contact', 'PID_CONTACT', 'ID_CONTACT');
    }

    public function mission()
    {
        return $this->belongsTo('App\Models\Mission', 'PID_MISSION', 'ID_MISSION');
    }

    // public function action_autres_contacts()
    // {
    //     return $this->hasMany('App\Models\xxx', 'PID_ACTION', 'ID_ACTION');
    // }

    public function action_intervenants_fiabilis()
    {
        return $this->hasMany('App\Models\ActionIntervenantsFiabilis', 'PID_ACTION', 'ID_ACTION');
    }

    public function documents()
    {
        return $this->hasMany('App\Models\Document', 'PID_ACTION', 'ID_ACTION');
    }

    // public function email()
    // {
    //     return $this->hasMany('App\Models\xxx', 'PID_ACTION', 'ID_ACTION');
    // }

    // public function sms()
    // {
    //     return $this->hasMany('App\Models\xxx', 'PID_ACTION', 'ID_ACTION');
    // }

    // public function tliste_action_marketing()
    // {
    //     return $this->hasMany('App\Models\xxx', 'PID_ACTION', 'ID_ACTION');
    // }

    // public function tliste_actions()
    // {
    //     return $this->hasMany('App\Models\xxx', 'PID_ACTION', 'ID_ACTION');
    // }
}
