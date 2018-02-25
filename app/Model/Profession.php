<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    protected $table = 'profession';
    protected $primaryKey = 'profession_id';
    protected $guarded = [];
}
