<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AideContactCivilite extends Model
{
    use HasFactory;

    protected $table = 'aide_contact_civilite';
    public $timestamps = false;
    protected $primaryKey = 'ID_AIDE_CONTACT_CIVILITE';
    protected $keyType = "string";
}
