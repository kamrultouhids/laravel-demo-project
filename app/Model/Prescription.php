<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected $table = 'prescription';
    protected $primaryKey = 'prescription_id';
    protected $guarded = [];

    public function instruction()
    {
        return $this->belongsTo(Instruction::class,'instruction_id');
    }

}
