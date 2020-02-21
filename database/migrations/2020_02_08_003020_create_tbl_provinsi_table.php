<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblProvinsiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_provinsi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('negara_id');
            $table->string('nama_provinsi', 50)->unique();
            $table->timestamps();

            $table->foreign('negara_id')->references('id')->on('tbl_negara')->onDelete('cascade')->onUpdated('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_provinsi');
    }
}
