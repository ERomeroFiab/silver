<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AideContactService extends Model
{
    use HasFactory;

    protected $table = 'aide_contact_service';
    public $timestamps = false;
    protected $primaryKey = 'ID_AIDE_CONTACT_SERVICE';
    protected $keyType = "string";
}
