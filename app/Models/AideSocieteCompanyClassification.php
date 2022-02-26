<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AideSocieteCompanyClassification extends Model
{
    use HasFactory;

    protected $table = 'aide_societe_company_classification';
    public $timestamps = false;
    protected $primaryKey = 'ID_AIDE_SOCIETE_COMPANY_CLASSIFICATION';
    protected $keyType = "string";
}
