<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AideArticleFamille extends Model
{
    use HasFactory;

    protected $table = 'aide_article_famille';
    public $timestamps = false;
    protected $primaryKey = 'ID_AIDE_ARTICLE_FAMILLE';
    protected $keyType = "string";
}
