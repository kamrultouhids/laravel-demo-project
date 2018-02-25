<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(MenuPermission::class);
        $this->call(ProfessionSeeder::class);
        $this->call(DistrictSeeder::class);
        $this->call(ThanaSeeder::class);
        $this->call(CenterTableSeeder::class);
        $this->call(InstructionTableSeeder::class);
        $this->call(ReferalTableSeeder::class);
    }
}
