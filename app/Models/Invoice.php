<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoice';
    public $timestamps = false;
    protected $primaryKey = 'ID_INVOICE';
    protected $keyType = "string";

    public function identification()
    {
        return $this->belongsTo('App\Models\Identification', 'PID_IDENTIFICATION', 'ID_IDENTIFICATION');
    }

    public function contrat()
    {
        return $this->belongsTo('App\Models\Contrat', 'PID_CONTRAT', 'ID_CONTRAT');
    }

    public function documents()
    {
        return $this->hasMany('App\Models\Document', 'PID_INVOICE', 'ID_INVOICE');
    }
    
    public function invoice_lignes()
    {
        return $this->hasMany('App\Models\InvoiceLigne', 'PID_INVOICE', 'ID_INVOICE');
    }
}
