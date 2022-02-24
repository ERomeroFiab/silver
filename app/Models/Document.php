<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $table = 'documents';
    public $timestamps = false;
    protected $primaryKey = 'ID_DOCUMENTS';
    // public $incrementing = false;
}