<?php

namespace Database\Seeders;

use App\Models\teams;
use App\Models\units;
use Illuminate\Database\Seeder;

class UnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        units::create([
            'name'  => 'units 1',
            'display_name'  => 'الوحدة 1',
            'description'  => 'وصف الوحدة 1',
            'department_id'  => 1,
        ]);
        units::create([
            'name'  => 'units 2',
            'display_name'  => 'الوحدة 2',
            'description'  => 'وصف الوحدة 2',
            'department_id'  => 2,
        ]);

        $units = units::factory()
        ->times(4)
        ->has(teams::factory()->count(2) , 'teams')
        ->create();
    }
}
