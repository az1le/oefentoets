<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    protected $comment = Comment::class;

    public function definition()
    {
        return [
            'user_id' => 1,
            'post_id' => 1,
            'content' => $this->faker->sentence,
        ];
    }
}
