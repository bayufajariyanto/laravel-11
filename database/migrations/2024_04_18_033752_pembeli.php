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
        Schema::create("pembeli", function (Blueprint $table) {
            $table->id("id_pembeli");
            $table->string("nama_pembeli", 128)->nullable();
            $table->char("jk", 1)->nullable();
            $table->string("no_telp", 24)->nullable();
            $table->text("alamat")->nullable();

            $table->timestampsTz(precision: 0);
            $table->softDeletes(precision: 0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("pembeli");
    }
};
