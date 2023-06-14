<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Unique;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\tiket>
 */
class TiketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $randomString = Str::random(4);
        return [
            'id_tiket' => $randomString,
            'id_penonton' => null,
            'sts_pemakaian' => 0
        ];
    }
}
