<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\Post;

use App\Models\User;
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
    public function definition(): array
    {

        $nombre = $this->faker->unique()->word(20);
        return [
            'nombre' => $nombre,
            'urlLink' => Str::slug($nombre),
            'resumen' => $this->faker->text(100),
            'body' => $this->faker->text(500),
            'estado' => $this->faker->randomElement([Post::DRAFT, Post::PUBLISHED]),
            'categoria_id' => Categoria::all()->random()->id,
            'user_id' => User::all()->random()->id,
        ];

    }
}
