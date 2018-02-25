<?php

use Illuminate\Database\Seeder;

class ProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $time = Carbon\Carbon::now();
        DB::table('profession')->truncate();
        DB::table('profession')->insert(
            [
                ['profession_name' => 'Not applicable','created_at'=>$time,'updated_at'=>$time],
                ['profession_name' => 'Govt. service','created_at'=>$time,'updated_at'=>$time],
                ['profession_name' => 'Pvt. Service','created_at'=>$time,'updated_at'=>$time],
                ['profession_name' => 'Doctor','created_at'=>$time,'updated_at'=>$time],
                ['profession_name' => 'Engineer','created_at'=>$time,'updated_at'=>$time],
                ['profession_name' => 'Farmer','created_at'=>$time,'updated_at'=>$time],
                ['profession_name' => 'Day-labor','created_at'=>$time,'updated_at'=>$time],
                ['profession_name' => 'House wife','created_at'=>$time,'updated_at'=>$time],
                ['profession_name' => 'Student','created_at'=>$time,'updated_at'=>$time],
                ['profession_name' => 'Teacher','created_at'=>$time,'updated_at'=>$time],
                ['profession_name' => 'NBR','created_at'=>$time,'updated_at'=>$time],
            ]

        );
    }
}
