<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    protected $table = 'referral';
    protected $primaryKey = 'referral_id';
    protected $guarded = [];
}
