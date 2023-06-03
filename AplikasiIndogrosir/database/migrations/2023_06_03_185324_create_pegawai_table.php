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
        Schema::create('pegawai', function (Blueprint $table) {
                $table->uuid('id');
                $table->primary('id');
                $table->string('nama_pegawai',50);
                $table->string('alamat',50);
                $table->string('nomor_hp',20);
                //foreign divisi
                $table->uuid('divisi_id');
                $table->foreign('divisi_id')->references('id')->on('divisi')->cascadeOnDelete()->cascadeOnUpdate();
                //foreign shift
                $table->uuid('shift_id');
                $table->foreign('shift_id')->references('id')->on('shift')->cascadeOnDelete()->cascadeOnUpdate();


                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawai');
    }
};
