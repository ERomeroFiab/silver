<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AideContactLanguage extends Model
{
    use HasFactory;

    protected $table = 'aide_contact_language';
    public $timestamps = false;
    protected $primaryKey = 'ID_AIDE_CONTACT_LANGUAGE';
    protected $keyType = "string";
}
