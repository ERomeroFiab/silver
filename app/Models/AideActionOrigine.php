<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AideActionOrigine extends Model
{
    use HasFactory;

    protected $table = 'aide_action_origine';
    public $timestamps = false;
    protected $primaryKey = 'ID_AIDE_ACTION_ORIGINE';
    protected $keyType = "string";
}
