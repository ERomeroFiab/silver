<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrat extends Model
{
    use HasFactory;

    protected $table = 'contrat';
    public $timestamps = false;
    protected $primaryKey = 'ID_CONTRAT';
    // public $incrementing = false;
}