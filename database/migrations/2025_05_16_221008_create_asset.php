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
        Schema::create('asset', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->nullable();
            $table->string('nama')->nullable();
            $table->text('keterangan')->nullable();
            $table->date('tanggal_beli')->nullable();
            $table->integer('status')->default(1)->comment('1:bagus,2:rusak,3:dibuang');
            $table->unsignedBigInteger('ruangan_id')->unsigned()->index();
            $table->foreign('ruangan_id')->references('id')->on('ruangan');
            $table->unsignedBigInteger('petugas_id')->unsigned()->index()->comment('penanggung jawab');
            $table->foreign('petugas_id')->references('id')->on('petugas');
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
        Schema::dropIfExists('asset');
    }
};
