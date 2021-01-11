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
        $this->call(PermissionsRoleSeeder::class);
        $this->call(AdminUserSeeder::class);
        $this->call(StatusesTableSeeder::class);

        $this->call(FakeSeeder::class);
    }
}
