<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AideSocietePay extends Model
{
    use HasFactory;

    protected $table = 'aide_societe_pays';
    public $timestamps = false;
    protected $primaryKey = 'ID_AIDE_SOCIETE_PAYS';
    protected $keyType = "string";
}
