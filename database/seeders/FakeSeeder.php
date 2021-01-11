<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\tasks;
use App\Models\projects;
use Illuminate\Database\Seeder;

class FakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = User::factory()
            ->times(100)
            ->create();

        foreach($users as $user){
            $roles = Role::take(rand(1,4))->get();
            foreach($roles as $role){
                $user->attachRole($role); 
            }
        }

        for($i = 0 ; $i < 100 ; $i++){
            $projects = projects::factory()
            ->has(User::factory()->times(random_int(1, 20)), 'users')
            ->hasTasks(random_int(1, 20))
            ->create(); 
        };
        
        

    }
}
