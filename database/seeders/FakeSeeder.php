<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\tasks;
use App\Models\projects;
use App\Models\Stage;
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
            ->times(10)
            ->create();

        foreach($users as $user){
            $roles = Role::take(rand(1,4))->get();
            foreach($roles as $role){
                $user->attachRole($role);
            }
        }

        for($i = 0 ; $i < 10 ; $i++){
            projects::factory()
            ->hasTasks(random_int(1, 5))
            ->has(Stage::factory()->times(random_int(1, 5))->has(User::factory()->times(random_int(1, 5)), 'users'), 'stages')
            ->create();
        };



    }
}
