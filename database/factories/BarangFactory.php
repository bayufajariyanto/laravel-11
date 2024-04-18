<?php

namespace Database\Factories;

use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_barang'   => $this->faker->word,
            'harga'         => $this->faker->numberBetween(1000, 100000),
            'stok'          => $this->faker->numberBetween(0, 100),
            'id_supplier'   => Supplier::all()->random()->id_supplier,
        ];
    }
}
