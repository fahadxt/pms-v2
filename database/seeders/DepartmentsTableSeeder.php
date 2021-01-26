<?php

namespace Database\Seeders;

use App\Models\departments;
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
        departments::create([
            'name'  => 'department 1',
            'display_name'  => 'القسم 1',
            'description'  => 'وصف القسم 1',
        ]);
        departments::create([
            'name'  => 'department 2',
            'display_name'  => 'القسم 2',
            'description'  => 'وصف القسم 2',
        ]);
        $departments = departments::factory()
            ->times(4)
            ->create();


    }
}
