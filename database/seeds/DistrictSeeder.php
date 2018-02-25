<?php

use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $time = Carbon\Carbon::now();
        DB::table('district')->truncate();
        DB::table('district')->insert(
            [
                ['district_name' => 'Dhaka','created_at'=>$time,'updated_at'=>$time],
                ['district_name' => 'Chittagong','created_at'=>$time,'updated_at'=>$time],
            ]

        );
    }
}
