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
        Schema::create("pembayaran", function (Blueprint $table) {
            $table->id("id_pembayaran");
            $table->date("tgl_bayar")->nullable();
            $table->integer("total_bayar")->default(0)->nullable();
            $table->integer("id_transaksi")->nullable();

            $table->timestampsTz(precision: 0);
            $table->softDeletes(precision: 0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("pembayaran");
    }
};
