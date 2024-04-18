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
        Schema::create("barang", function (Blueprint $table) {
            $table->id("id_barang");
            $table->string("nama_barang", 20)->nullable();
            $table->integer("harga")->default(0)->nullable();
            $table->integer("stok")->default(0)->nullable();
            $table->integer("id_supplier")->nullable();

            $table->timestampsTz(precision: 0);
            $table->softDeletes(precision: 0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("barang");
    }
};
