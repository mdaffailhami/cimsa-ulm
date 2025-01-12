<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Post::class;

    public function definition(): array
    {
        $users = User::all();

        $title = fake()->sentence();
        $slug = Str::slug($title);
        $date = Carbon::now();
        $path_name = "post/{$date->year}";
        $image_name = generateImage('image', $path_name);
        $image_url = config('global')["url"] . "/api/image/" . $path_name . "/" . $image_name;

        return [
            "author_id" => $users->random(1)->first()->uuid,
            "cover" => $image_url,
            "title" => $title,
            "slug" => $slug,
            "highlight" => fake()->paragraph(1),
            "content" => '<p>' . implode('</p><p>', fake()->paragraphs(3)) . '</p>',
        ];
    }

    public function categories($categories = null)
    {
        return $this->afterCreating(function (Post $post) use ($categories) {
            $post->categories()->attach($categories);
        });
    }
}
