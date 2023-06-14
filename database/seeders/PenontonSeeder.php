<?php

namespace Database\Seeders;

use App\Models\Penonton;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenontonSeeder extends Seeder
{

    public function run(): void
    {
        Penonton::factory(30)->create();
    }
}
