<?php

use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->truncate();
        DB::table('menus')->insert(
            array
            (

                ['name'  => 'Add Role','menu_icon'=>'mdi  mdi-newspaper','menu_url'  => 'userRole.index', 'status'  => '1','menu_serial_id'=>'1'],
                ['name'  => 'Role Wise Permission','menu_icon'=>'mdi  mdi-google-controller-off', 'menu_url'  => 'rolePermission.index','status'  => '1','menu_serial_id'=>'2'],

                ['name'  => 'Appointment', 'menu_icon'=>'mdi mdi-calendar-check','menu_url'  => 'appointment.index', 'status'  => '1','menu_serial_id'=>'3'],

                ['name'  => 'Physiotherapist','menu_icon'=>'mdi mdi-contacts', 'menu_url'  => 'physiotherapist.index', 'status'  => '1','menu_serial_id'=>'4'],
                ['name'  => 'Data Operator','menu_icon'=>'mdi mdi-account-box', 'menu_url'  => 'dataOperator.index','status'  => '1','menu_serial_id'=>'5'],
                ['name'  => 'Patient','menu_icon'=>'mdi mdi-account-multiple-outline', 'menu_url'  => 'patient.index',  'status'  => '1','menu_serial_id'=>'6'],
                /**
                 *
                 * @settings
                 *
                 */

                ['name'  => 'Center','menu_icon'=>'mdi mdi-source-branch', 'menu_url'  => 'centre.index', 'status'  => '1','menu_serial_id'=>'7'],
                ['name'  => 'Instruction','menu_icon'=>'mdi mdi-information', 'menu_url'  => 'instruction.index',  'status'  => '1','menu_serial_id'=>'8'],

                ['name'  => 'Referral', 'menu_icon'=>'mdi mdi-information-outline','menu_url'  => 'referral.index', 'status'  => '1','menu_serial_id'=>'9'],


            )
        );

    }
}
