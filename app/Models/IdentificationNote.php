<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdentificationNote extends Model
{
    use HasFactory;

    protected $table = 'identification_note';
    public $timestamps = false;
    protected $primaryKey = 'ID_IDENTIFICATION_NOTE';
    protected $keyType = "string";

    public function identification()
    {
        return $this->belongsTo('App\Models\Identification', 'ID_IDENTIFICATION', 'PID_IDENTIFICATION');
    }
}
