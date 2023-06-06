<?php

namespace Database\Seeders;

use App\Models\Etiqueta;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Etiqueta::factory(10)->create();
    }
}
