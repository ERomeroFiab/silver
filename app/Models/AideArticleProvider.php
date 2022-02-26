<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AideArticleProvider extends Model
{
    use HasFactory;

    protected $table = 'aide_article_provider';
    public $timestamps = false;
    protected $primaryKey = 'ID_AIDE_ARTICLE_PROVIDER';
    protected $keyType = "string";
}
