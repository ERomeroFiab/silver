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
    protected $keyType = "string";

    public function identification()
    {
        return $this->belongsTo('App\Models\Identification', 'PID_IDENTIFICATION', 'ID_IDENTIFICATION');
    }

    public function contrat()
    {
        return $this->belongsTo('App\Models\Contrat', 'PID_CONTRAT', 'ID_CONTRAT');
    }

    public function affaire()
    {
        return $this->belongsTo('App\Models\Affaire', 'PID_AFFAIRE', 'ID_AFFAIRE');
    }

    public function action()
    {
        return $this->belongsTo('App\Models\Action', 'PID_ACTION', 'ID_ACTION');
    }

    public function contact()
    {
        return $this->belongsTo('App\Models\Contact', 'PID_CONTACT', 'ID_CONTACT');
    }

    // public function echantillon()
    // {
    //     return $this->belongsTo('App\Models\xxx', 'PID_CONTACT', 'ID_CONTACT');
    // }

    // public function email()
    // {
    //     return $this->belongsTo('App\Models\xxx', 'PID_CONTACT', 'ID_CONTACT');
    // }

    public function invoice()
    {
        return $this->belongsTo('App\Models\Invoice', 'PID_INVOICE', 'ID_INVOICE');
    }

    public function mission()
    {
        return $this->belongsTo('App\Models\Mission', 'PID_MISSION', 'ID_MISSION');
    }

    // public function mission_audit_report()
    // {
    //     return $this->belongsTo('App\Models\MissionAuditReport', 'PID_MISSION_AUDIT_REPORT', 'ID_MISSION_AUDIT_REPORT');
    // }

    // public function offre_entete()
    // {
    //     return $this->belongsTo('App\Models\OffreEntete', 'PID_OFFRE_ENTETE', 'ID_OFFRE_ENTETE');
    // }

    public function reclamation()
    {
        return $this->belongsTo('App\Models\Reclamation', 'PID_RECLAMATION', 'ID_RECLAMATION');
    }
}
