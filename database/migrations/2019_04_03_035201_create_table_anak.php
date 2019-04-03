<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAnak extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anak', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('pegawai_id')->unsigned();
            $table->string('nama',100);
            $table->string('tempat_lahir',100);
            $table->date('tanggal_lahir');
            $table->timestamps();

            // $table->foreign('pegawai_id')->references('id')->on('mst_pagawai');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anak');
    }
}
