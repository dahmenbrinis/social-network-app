<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=> $this->faker->numberBetween(2,4),
            'name'=>$this->faker->words(3,true),
            'details'=>$this->faker->sentence(50,false),
            'price'=>$this->faker->numberBetween(1,30)*100,
            'quantity'=>$this->faker->numberBetween(1,30)*50
        ];
    }
}
