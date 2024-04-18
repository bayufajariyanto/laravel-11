<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pembeli>
 */
class PembeliFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_pembeli'  => $this->faker->name,
            'jk'            => $this->faker->randomElement(['L', 'P']),
            'no_telp'       => $this->faker->phoneNumber,
            'alamat'        => $this->faker->address,
        ];
    }
}
