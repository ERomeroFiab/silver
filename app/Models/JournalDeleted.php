<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JournalDeleted extends Model
{
    use HasFactory;

    protected $table = 'journal_deleted';
    public $timestamps = false;
    protected $primaryKey = 'ID_JOURNAL_DELETED';
    protected $keyType = "string";
}
