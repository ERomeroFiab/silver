<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Identification extends Model
{
    use HasFactory;

    protected $table = 'identification';
    public $timestamps = false;
    protected $primaryKey = 'ID_IDENTIFICATION';

    public function actions()
    {
        return $this->hasMany('App\Models\Action', 'PID_IDENTIFICATION', 'ID_IDENTIFICATION');
    }

    public function action_marketings()
    {
        return $this->hasMany('App\Models\ActionMarketing', 'PID_IDENTIFICATION', 'ID_IDENTIFICATION');
    }

    public function adresses()
    {
        return $this->hasMany('App\Models\Adresse', 'PID_IDENTIFICATION', 'ID_IDENTIFICATION');
    }

    public function affaires()
    {
        return $this->hasMany('App\Models\Affaire', 'PID_IDENTIFICATION', 'ID_IDENTIFICATION');
    }

    public function affaire_intervenants()
    {
        return $this->hasMany('App\Models\AffaireIntervenant', 'PID_IDENTIFICATION', 'ID_IDENTIFICATION');
    }
}
