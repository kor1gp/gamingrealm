<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Seeder;


class GamesTableSeeder extends Seeder
{
    public function run()
    {
        Game::create([
            'name' => 'MLBB',
            'slug' => 'mlbb',
            'description' => 'Mobile Legends: Bang Bang guide and tips',
        ]);

        Game::create([
            'name' => 'Free Fire Max',
            'slug' => 'freefiremax',
            'description' => 'Free Fire Max guide and tips',
        ]);

        Game::create([
            'name' => 'Diablo IV',
            'slug' => 'diabloiv',
            'description' => 'Diablo IV guide and tips',
        ]);
    }
}
