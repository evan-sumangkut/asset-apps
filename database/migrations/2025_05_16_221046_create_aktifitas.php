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
        Schema::create('aktifitas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('asset_id')->unsigned()->index();
            $table->foreign('asset_id')->references('id')->on('asset');
            $table->text('keterangan');
            $table->integer('status')->default(1)->comment('1:bagus,2:rusak,3:dibuang');
            $table->date('tanggal');
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
        Schema::dropIfExists('aktifitas');
    }
};
