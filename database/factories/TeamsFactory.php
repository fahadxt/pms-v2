<?php

namespace Database\Factories;

use App\Models\Role;
use App\Models\User;
use App\Models\teams;
use App\Models\units;
use Illuminate\Database\Eloquent\Factories\Factory;

class teamsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = teams::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $leader_role = Role::find(3);

        return [
            'name' => $this->faker->name,
            'display_name' => $this->faker->name,
            'description' => $this->faker->name,
            'admin_id'   => $leader_role->users->random()->id,
            // 'unit_id' => units::all()->random()->id,
        ];
    }
}
