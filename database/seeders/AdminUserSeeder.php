<?php

namespace Database\Seeders;


use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
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

        $superadmin_role = Role::find(1);
        $admin_role = Role::find(2);
        $leader_role = Role::find(3);
        $employee_role = Role::find(4);




        $superadmin = User::create([
            'name'       => 'Super Admin',
            'email'      => 'superadmin@example.com',
            'active'     => 1,
            'password'   => bcrypt('123123123'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $superadmin->attachRole($superadmin_role);
        


        $admin = User::create([
            'name'       => 'Admin',
            'email'      => 'admin@example.com',
            'active'     => 1,
            'password'   => bcrypt('123123123'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $admin->attachRole($admin_role);
        


        $leader = User::create([
            'name'       => 'Leader',
            'email'      => 'leader@example.com',
            'active'     => 1,
            'password'   => bcrypt('123123123'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $leader->attachRole($leader_role);



        $employee = User::create([
            'name'       => 'Employee',
            'email'      => 'employee@example.com',
            'active'     => 1,
            'password'   => bcrypt('123123123'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $employee->attachRole($employee_role);
    }
}
