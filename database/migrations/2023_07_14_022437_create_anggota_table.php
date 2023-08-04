<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota', function (Blueprint $table) {
            $table->id();
            $table->string('noanggota');
            $table->string('namaanggota');
            $table->double('angsuranpokok');
            $table->double('jasa');
            $table->double('simpananke');
            $table->double('simpananwajib');
            $table->double('simpananpokok');
            $table->double('simpananmasukan');
            $table->double('angsuranpihakke3pokok');
            $table->double('angsuranpihakke3jasa');
            $table->double('angsuranpihakke3jumlah');
            $table->double('angsuranpihakke3ke');
            $table->double('baranglainjumlah');
            $table->double('baranglainke');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anggota');
    }
};
