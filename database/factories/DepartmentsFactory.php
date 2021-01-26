<?php

namespace Database\Factories;

use App\Models\Role;
use App\Models\User;
use App\Models\departments;
use Illuminate\Database\Eloquent\Factories\Factory;

class departmentsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = departments::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $superadmin_role = Role::find(1);



        return [
            'name' => $this->faker->name,
            'display_name' => $this->faker->name,
            'description' => $this->faker->name,
            'admin_id'   => $superadmin_role->users->random()->id,
        ];
    }
}
