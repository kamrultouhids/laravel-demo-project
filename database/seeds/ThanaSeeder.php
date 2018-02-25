<?php

use Illuminate\Database\Seeder;

class ThanaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $time = Carbon\Carbon::now();
        DB::table('thana')->truncate();
        DB::table('thana')->insert(
            [
                ['district_id'=>'1','thana_name' => 'Mirshari','created_at'=>$time,'updated_at'=>$time],
                ['district_id'=>'1','thana_name' => 'Satkania','created_at'=>$time,'updated_at'=>$time],
                ['district_id'=>'1','thana_name' => 'Chakaria Upazila','created_at'=>$time,'updated_at'=>$time],
                ['district_id'=>'2','thana_name' => 'Paltan','created_at'=>$time,'updated_at'=>$time],
            ]

        );
    }
}
