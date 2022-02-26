<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AideActionCategorie extends Model
{
    use HasFactory;

    protected $table = 'aide_action_categorie';
    public $timestamps = false;
    protected $primaryKey = 'ID_AIDE_ACTION_CATEGORIE';
    protected $keyType = "string";
}
