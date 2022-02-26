<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AideSocieteType extends Model
{
    use HasFactory;

    protected $table = 'aide_societe_type';
    public $timestamps = false;
    protected $primaryKey = 'ID_AIDE_SOCIETE_TYPE';
    protected $keyType = "string";
}
