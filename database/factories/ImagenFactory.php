<?php

namespace Database\Factories;

use App\Models\Imagen;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Imagen>
 */
class ImagenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'urlImage'=>'posts'.$this->faker->image('public/storage/posts',640,480, null, false)
        ];
    }
}
