<?php

namespace Database\Factories;

use App\Models\Barang;
use App\Models\Pembeli;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaksi>
 */
class TransaksiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_barang'     => Barang::all()->random()->id_barang,
            'id_pembeli'    => Pembeli::all()->random()->id_pembeli,
            'tanggal'       => $this->faker->dateTimeThisMonth(),
            'keterangan'    => $this->faker->sentence,
        ];
    }
}
