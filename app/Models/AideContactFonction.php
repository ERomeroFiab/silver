<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AideContactFonction extends Model
{
    use HasFactory;

    protected $table = 'aide_contact_fonction';
    public $timestamps = false;
    protected $primaryKey = 'ID_AIDE_CONTACT_FONCTION';
    protected $keyType = "string";
}
