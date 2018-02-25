<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ReferalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $time = Carbon::now();
        DB::table('referral')->truncate();
        DB::table('referral')->insert(
            [
                ['title' => 'Doctor','description'=>'','created_at'=>$time,'updated_at'=>$time],
                ['title' => 'Old Patient','description'=>'','created_at'=>$time,'updated_at'=>$time],
                ['title' => 'Publicity','description'=>'','created_at'=>$time,'updated_at'=>$time],
                ['title' => 'Health Worker','description'=>'','created_at'=>$time,'updated_at'=>$time],
                ['title' => 'NGO','description'=>'','created_at'=>$time,'updated_at'=>$time],
                ['title' => 'Pharmacy','description'=>'','created_at'=>$time,'updated_at'=>$time],
                ['title' => 'CoMCH','description'=>'','created_at'=>$time,'updated_at'=>$time],
                ['title' => 'Others','description'=>'','created_at'=>$time,'updated_at'=>$time],

            ]

        );
    }
}
