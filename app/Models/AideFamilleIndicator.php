<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AideFamilleIndicator extends Model
{
    use HasFactory;

    protected $table = 'aide_famille_indicators';
    public $timestamps = false;
    protected $primaryKey = 'ID_AIDE_FAMILLE_INDICATORS';
    protected $keyType = "string";
}
