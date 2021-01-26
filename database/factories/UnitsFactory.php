<?php

namespace Database\Factories;

use App\Models\Role;
use App\Models\User;
use App\Models\units;
use App\Models\departments;
use Illuminate\Database\Eloquent\Factories\Factory;

class unitsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = units::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $admin_role = Role::find(2);


        return [
            'name' => $this->faker->name,
            'display_name' => $this->faker->name,
            'description' => $this->faker->name,
            'department_id' => departments::all()->random()->id,
            'admin_id'   => $admin_role->users->random()->id,
        ];
    }
}
