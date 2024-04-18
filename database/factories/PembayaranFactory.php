<?php

namespace Database\Factories;

use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pembayaran>
 */
class PembayaranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tgl_bayar'     => $this->faker->date(),
            'total_bayar'   => $this->faker->numberBetween(10000, 100000),
            'id_transaksi'  => Transaksi::all()->random()->id_transaksi
        ];
    }
}
