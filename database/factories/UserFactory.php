<?php

namespace Database\Factories;

use App\Models\departments;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        if(departments::count() > 0 ){
            $department = departments::all()->random();
            $unit = $department->units->count() > 0 ? $department->units->random() : null;
            $team = ($unit) ? ($unit->teams->count() > 0 ? $unit->teams->random() : null) : null;
        }else{
            $department = null;
            $unit = null;
            $team = null;
        }

        return [
            'name'              => $this->faker->name,
            'email'             => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'active'            => 1,
            'password'          => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',   // password
            'remember_token'    => Str::random(10),
            'department_id'     => $department ? $department->id : null,
            'unit_id'           => $unit ? $unit->id : null,
            'team_id'           => $team ? $team->id : null,
        ];
    }
}
