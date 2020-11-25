<?php

namespace Database\Factories;

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
        $gender = rand(0, 1);
        return [
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => '$2y$10$mv82RzT702Y2Rs1jTiglhelJe/PiBKgAqMLdRiyJtULij8wy.iw1C', // my password
            'remember_token' => Str::random(10),
            'name' => $this->faker->name($gender ? 'female' : 'male'),
            'gender' => $gender,
            'date_birth' => $this->faker->dateTimeInInterval('-50 years', '-15 years'),
            'state' => 0,
        ];
    }
}
