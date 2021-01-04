<?php

namespace Database\Seeders;


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
        // $this->call(RolesAndPermissionsSeeder::class);
        $this->call(VoyagerDatabaseSeeder::class);
        $this->call(AdminUserSeeder::class);
        $this->call(StatusesTableSeeder::class);
    }
}
