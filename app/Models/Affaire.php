<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affaire extends Model
{
    use HasFactory;

    protected $table = 'affaire';
    public $timestamps = false;
    protected $primaryKey = 'ID_AFFAIRE';
    // public $incrementing = false;
}
