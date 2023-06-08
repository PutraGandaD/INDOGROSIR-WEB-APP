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
        Schema::create('produk', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->integer('harga_produk');
            $table->String('nama_produk', 50);
            $table->String('foto_produk');
            // foreign key brand
            $table->uuid('brand_id');
            $table->foreign('brand_id')->references('id')->on('brand')->cascadeOnDelete()->cascadeOnUpdate();
            // foreign key kontainer
            $table->uuid('kontainer_id');
            $table->foreign('kontainer_id')->references('id')->on('kontainerBarang')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
