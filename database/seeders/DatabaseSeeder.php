<?php
namespace Database\Seeders;

use Database\Seeders\GamesTableSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(GamesTableSeeder::class);
    }
}