<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'appointment';
    protected $primaryKey = 'appointment_id';
    protected $guarded = [];

    public function patient(){
        return  $this->belongsTo(Patient::class,'patient_id');
    }
}
