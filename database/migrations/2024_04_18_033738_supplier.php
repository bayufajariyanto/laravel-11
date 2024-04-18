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
        Schema::create("supplier", function (Blueprint $table) {
            $table->id("id_supplier");
            $table->string("nama_supplier", 128)->nullable();
            $table->string("no_telp", 24)->nullable();
            $table->string("alamat", 100)->nullable();

            $table->timestampsTz(precision: 0);
            $table->softDeletes(precision: 0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("supplier");
    }
};
