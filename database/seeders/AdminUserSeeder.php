<?php

namespace Database\Seeders;


use Carbon\Carbon;
use App\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'role_id'    => 1,
            'name'       => 'Superadmin',
            'email'      => 'superadmin@example.com',
            'active'     => 1,
            'password'   => bcrypt('123123123'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $user = User::create([
            'name'       => 'fahad',
            'email'      => 'fahad@example.com',
            'active'     => 1,
            'password'   => bcrypt('123123123'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
