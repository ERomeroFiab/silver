<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceLigne extends Model
{
    use HasFactory;

    protected $table = 'invoice_ligne';
    public $timestamps = false;
    protected $primaryKey = 'ID_INVOICE_LIGNE';
    protected $keyType = "string";

    public function invoice()
    {
        return $this->belongsTo('App\Models\Invoice', 'PID_INVOICE', 'ID_INVOICE');
    }

    public function mission_motive_eco()
    {
        return $this->belongsTo('App\Models\MissionMotiveEco', 'PID_MISSION_MOTIVE_ECO', 'ID_MISSION_MOTIVE_ECO');
    }
}
