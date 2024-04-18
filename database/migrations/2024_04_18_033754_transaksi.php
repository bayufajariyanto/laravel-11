<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("transaksi", function (Blueprint $table) {
            $table->id("id_transaksi");
            $table->integer("id_barang")->nullable();
            $table->integer("id_pembeli")->nullable();
            $table->date("tanggal")->nullable();
            $table->text("keterangan")->nullable();

            $table->timestampsTz(precision: 0);
            $table->softDeletes(precision: 0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("transaksi");
    }
};
