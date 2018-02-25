<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Instruction extends Model
{
    protected $table = 'instruction';
    protected $primaryKey = 'instruction_id';
    protected $guarded = [];
}
