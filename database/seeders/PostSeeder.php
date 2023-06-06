<?php

namespace Database\Seeders;

use App\Models\Imagen;
use App\Models\Post;
use App\Models\User;
use Database\Factories\ImagenFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::factory(45)->create()->each(function (Post $post){
            Imagen::factory(4)->create([
               'imageable_id'=> $post->id,
               'imageable_type'=> Post::class
            ]);

            $post->etiquetas()->attach([
                rand(1,5),
                rand(5,10)
            ]);
        });
    }
}
