<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTempatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tempats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('lokasi');
            $table->integer('kategori');
            $table->text('deskripsi');
            $table->string('thumbnail')->default('default-thumbnail.png');
            $table->boolean('konfirmasi')->default('0');
            $table->float('rating')->default(0.0);
            $table->integer('tiket')->default(0);
            $table->time('buka')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->time('tutup')->default(DB::raw('CURRENT_TIMESTAMP'));
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
        Schema::dropIfExists('tempats');
    }
}
