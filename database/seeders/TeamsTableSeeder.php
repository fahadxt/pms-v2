<?php

namespace Database\Seeders;

use App\Models\teams;
use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        teams::create([
            'name'  => 'team 1',
            'display_name'  => 'الفريق 1',
            'description'  => 'وصف الفريق 1',
            'unit_id'  => 1,

        ]);
        teams::create([
            'name'  => 'team 2',
            'display_name'  => 'الفريق 2',
            'description'  => 'وصف الفريق 2',
            'unit_id'  => 2,

        ]);
    }
}
