<?php

namespace Database\Factories;

use App\Models\Advert;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::all()->random();
        $category = Category::all()->random();

        return [
            'body' => $this->faker->text(),
            'user_id' => $user->id,
            'advert_id' => $category->id,
        ];
    }
}
