<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AideActionObjet extends Model
{
    use HasFactory;

    protected $table = 'aide_action_objet';
    public $timestamps = false;
    protected $primaryKey = 'ID_AIDE_ACTION_OBJET';
    protected $keyType = "string";
}
