<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Stage;
use App\Models\projects;
use App\Models\statuses;
use App\Models\departments;
use Illuminate\Database\Eloquent\Factories\Factory;

class StageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Stage::class;

    public $sort = 1;
    // public $stageable = [
    //     projects::class,
    // ];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $department = departments::all()->random();
        $unit = $department ? $department->units->random() : null;
        $team = $unit ? $unit->teams->random() : null;

        return [
            'name'        => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'description' => $this->faker->text,
            'admin_id'    => User::all()->random()->id,


            'status_id'   => $this->sort == 1 ? statuses::all()->random()->id : 1,

            'sort' => $this->sort++,


            'stages_due_on' => $this->faker->dateTimeBetween($startDate = 'now', $endDate = '12 month', $timezone = null),
            'created_at' => $created_at = $this->faker->dateTimeBetween($startDate = '-1 month', $endDate = 'now', $timezone = null),
            'updated_at' => $created_at,

            'department_id'     => $department ? $department->id : null,
            'unit_id'           => $unit ? $unit->id : null,
            'team_id'           => $team ? $team->id : null,


        ];
    }
}
