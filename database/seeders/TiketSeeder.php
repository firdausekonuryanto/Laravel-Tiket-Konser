<?php

namespace Database\Seeders;

use App\Models\tiket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TiketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        tiket::factory(30)->create();
    }
}
