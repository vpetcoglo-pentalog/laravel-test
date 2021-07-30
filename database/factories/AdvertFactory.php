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
    private $users;
    private $categories;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        if (empty($this->users)) $this->users = User::all();
        if (empty($this->categories)) $this->categories = Category::all();

        return [
            'price' => $this->faker->numerify(),
            'title' => $this->faker->jobTitle,
            'subtitle' => $this->faker->jobTitle." at ". $this->faker->company,
            'description' => $this->faker->text(),
            'category_id' => $this->categories->random()->id,
            'user_id' => $this->users->random()->id,
        ];
    }
}
