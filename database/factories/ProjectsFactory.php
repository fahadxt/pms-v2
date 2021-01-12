<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\projects;
use App\Models\statuses;
use Illuminate\Database\Eloquent\Factories\Factory;

class projectsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = projects::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'        => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'description' => $this->faker->text,
            'owner_id'    => User::all()->random()->id,
            'status_id'   => statuses::all()->random()->id,
            'created_at' => $created_at = $this->faker->dateTimeBetween($startDate = '-1 month', $endDate = 'now', $timezone = null),
            'updated_at' => $created_at,
            'project_due_on' => $created_at = $this->faker->dateTimeBetween($startDate = 'now', $endDate = '12 month', $timezone = null),
        ];
    }
}
