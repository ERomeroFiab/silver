<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contact';
    public $timestamps = false;
    protected $primaryKey = 'ID_CONTACT';
    protected $keyType = "string";

    public function identification()
    {
        return $this->belongsTo('App\Models\Identification', 'PID_IDENTIFICATION', 'ID_IDENTIFICATION');
    }

    public function actions()
    {
        return $this->hasMany('App\Models\Action', 'PID_CONTACT', 'ID_CONTACT');
    }

    public function affaires()
    {
        return $this->hasMany('App\Models\Affaire', 'PID_CONTACT', 'ID_CONTACT');
    }

    public function contrats()
    {
        return $this->hasMany('App\Models\Contrat', 'PID_CONTACT', 'ID_CONTACT');
    }

    public function documents()
    {
        return $this->hasMany('App\Models\Document', 'PID_CONTACT', 'ID_CONTACT');
    }
}
