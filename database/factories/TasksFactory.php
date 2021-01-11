<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\tasks;
use App\Models\statuses;
use Illuminate\Database\Eloquent\Factories\Factory;

class tasksFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = tasks::class;

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
            'completed'    => rand(0,1),
            'assigned_to'   => User::all()->random()->id,
            'created_by' => User::all()->random()->id,
            'due_on' => $this->faker->dateTimeBetween($startDate = 'now', $endDate = '1 month', $timezone = null),
            'status_id' => statuses::all()->random()->id,
            'created_at' => $created_at = $this->faker->dateTimeBetween($startDate = '-1 month', $endDate = 'now', $timezone = null),
            'updated_at' => $created_at,
        ];
    }
}
