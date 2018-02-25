<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CenterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $time = Carbon::now();
        DB::table('centre')->truncate();
        DB::table('centre')->insert(
            [
                ['center_code' => 'CM','title' => 'Comilla','address' => 'Comilla','email' => 'comilla@lmrf.org','created_at'=>$time],
                ['center_code' => 'LN','title' => 'Chittagang','address' => 'Chittagang','email' => 'chittagang@lmrf.org','created_at'=>$time],
                ['center_code' => 'CX','title' => 'Cox’s Bazar','address' => 'Cox’s Bazar','email' => 'Coxsbazar@lmrf.org','created_at'=>$time],
                ['center_code' => 'FN','title' => 'Feni','address' => 'Feni','email' => 'Feni@lmrf.org','created_at'=>$time],
                ['center_code' => 'NK','title' => 'Noakhali','address' => 'Noakhali','email' => 'Noakhali@lmrf.org','created_at'=>$time],
                ['center_code' => 'BB','title' => 'B.Baria','address' => 'B.Baria','email' => 'B.Baria@lmrf.org','created_at'=>$time],
                ['center_code' => 'DP','title' => 'Chandpur','address' => 'Chandpur','email' => 'Chandpur@lmrf.org','created_at'=>$time],

            ]

        );
    }
}
