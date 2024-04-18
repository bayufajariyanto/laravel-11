<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama_barang'   => "BARANG A",
                'harga'         => 10000,
                'stok'          => 50,
                'id_supplier'   => Supplier::all()->random()->id_supplier,
            ],
            [
                'nama_barang'   => "BARANG B",
                'harga'         => 20000,
                'stok'          => 30,
                'id_supplier'   => Supplier::all()->random()->id_supplier,
            ],
            [
                'nama_barang'   => "BARANG C",
                'harga'         => 15000,
                'stok'          => 40,
                'id_supplier'   => Supplier::all()->random()->id_supplier,
            ],
            [
                'nama_barang'   => "BARANG D",
                'harga'         => 25000,
                'stok'          => 20,
                'id_supplier'   => Supplier::all()->random()->id_supplier,
            ],
            [
                'nama_barang'   => "BARANG E",
                'harga'         => 18000,
                'stok'          => 60,
                'id_supplier'   => Supplier::all()->random()->id_supplier,
            ],
        ];
        DB::table("barang")->truncate();
        Barang::insert($data);
    }
}
