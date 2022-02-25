<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AffaireObjection extends Model
{
    use HasFactory;

    protected $table = 'affaire_objections';
    public $timestamps = false;
    protected $primaryKey = 'ID_AFFAIRE_OBJECTIONS';
    protected $keyType = "string";

    public function affaire()
    {
        return $this->belongsTo('App\Models\Affaire', 'ID_AFFAIRE', 'PID_AFFAIRE');
    }
}
