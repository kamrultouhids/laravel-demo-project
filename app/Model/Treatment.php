<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    protected $table = 'treatment';
    protected $primaryKey = 'treatment_id';
    protected $guarded = [];

    public function consultant(){
        return  $this->belongsTo(User::class,'consultant_id','user_id');
    }

    public function patient(){
        return  $this->belongsTo(Patient::class,'patient_id');
    }
}
