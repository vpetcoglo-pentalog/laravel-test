<?php

namespace Database\Factories;

use App\Models\Advert;
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

    private $users;
    private $adverts;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        if (empty($this->users)) $this->users = User::all();
        if (empty($this->adverts)) $this->adverts = Advert::all();

        return [
            'body' => $this->faker->text(),
            'user_id' => $this->users->random()->id,
            'advert_id' => $this->adverts->random()->id,
        ];
    }
}
