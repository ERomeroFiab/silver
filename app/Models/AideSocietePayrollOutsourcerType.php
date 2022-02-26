<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AideSocietePayrollOutsourcerType extends Model
{
    use HasFactory;

    protected $table = 'aide_societe_payroll_outsourcer_type';
    public $timestamps = false;
    protected $primaryKey = 'ID_AIDE_SOCIETE_PAYROLL_OUTSOURCER_TYPE';
    protected $keyType = "string";
}
