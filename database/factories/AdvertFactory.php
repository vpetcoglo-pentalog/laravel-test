<?php

namespace Database\Factories;

use App\Models\Advert;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdvertFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Advert::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'price' => $this->faker->numerify(),
            'title' => $this->faker->name(),
            'subtitle' => $this->faker->name(),
            'description' => $this->faker->text(),
            'category_id' => Category::factory()->create(),
            'user_id' => User::factory()->create(),
        ];
    }
}
