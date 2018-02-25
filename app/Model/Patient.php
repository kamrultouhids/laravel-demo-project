<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = 'patient';
    protected $primaryKey = 'patient_id';
    protected $guarded = [];

    public function centre(){
        return $this->belongsTo(Centre::class,'centre_id');
    }

    public function profession(){
        return $this->belongsTo(Profession::class,'profession_id');
    }
}
