<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Gerardo Montivero',
            'email' => 'gerardo.montivero@gmail.com',
            'password' => bcrypt('N1nguna=')
        ]);
        User::factory(45)->create();
    }
}
