<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AideInternationalResponsible extends Model
{
    use HasFactory;

    protected $table = 'aide_international_responsible';
    public $timestamps = false;
    protected $primaryKey = 'ID_AIDE_INTERNATIONAL_RESPONSIBLE';
    protected $keyType = "string";
}
