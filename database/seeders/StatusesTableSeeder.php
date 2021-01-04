<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\statuses;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        statuses::create([
            'name'  => 'New',
            'display_name'  => 'جديد',
            'color' => '#90cdf4',
        ]);
        statuses::create([
            'name'  => 'In Progress',
            'display_name'  => 'قيد الإجراء',
            'color' => '#d6bcfa',
        ]);
        statuses::create([
            'name'  => 'In Review',
            'display_name'  => 'قيد المراجعة',
            'color' => '#fbd38d',
        ]);
        statuses::create([
            'name'  => 'Completed',
            'display_name'  => 'مكتمل',
            'color' => '#9ae6b4',
        ]);
        statuses::create([
            'name'  => 'Discarded',
            'display_name'  => 'مهملة',
            'color' => '#feb2b2',
        ]);
    }
}
