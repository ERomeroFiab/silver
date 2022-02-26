<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AideRemunerationType extends Model
{
    use HasFactory;

    protected $table = 'aide_renumeration_type';
    public $timestamps = false;
    protected $primaryKey = 'ID_AIDE_RENUMERATION_TYPE';
    protected $keyType = "string";
}
