<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Identification extends Model
{
    use HasFactory;

    protected $table = 'identification';
    public $timestamps = false;
    protected $primaryKey = 'ID_IDENTIFICATION';
    // public $incrementing = false;
}
