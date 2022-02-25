<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = 'article';
    public $timestamps = false;
    protected $primaryKey = 'ID_ARTICLE';
    protected $keyType = "string";
}
