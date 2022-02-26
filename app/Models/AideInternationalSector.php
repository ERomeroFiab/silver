<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AideInternationalSector extends Model
{
    use HasFactory;

    protected $table = 'aide_international_sector';
    public $timestamps = false;
    protected $primaryKey = 'ID_AIDE_INTERNATIONAL_SECTOR';
    protected $keyType = "string";
}
