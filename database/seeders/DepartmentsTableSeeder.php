<?php

namespace Database\Seeders;

use App\Models\teams;
use App\Models\units;
use App\Models\departments;
use App\Models\User;
use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for($i = 0 ; $i < 6 ; $i++){
            departments::factory()->has(User::factory()->count(rand(2,6)) , 'users')->create()->each(function () {
                units::factory()
                ->times(rand(1,4))
                ->has(User::factory()->count(rand(2,6)) , 'users')
                ->has(teams::factory()->count(rand(2,6)) , 'teams')
                ->create();

            });
        };




    }
}
