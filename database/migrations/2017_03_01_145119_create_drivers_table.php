<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('gambar_profile')->nullable();
            $table->string('noLesen')->nullable();
            $table->string('lesen_luput')->nullable();
            $table->string('gambar_lesen')->nullable();
            $table->string('gambar_ic')->nullable();
            $table->string('no_plat')->nullable();
            $table->string('jenis_kereta')->nullable();
            $table->string('roadtax_luput')->nullable();
            $table->timestamps();

            //foreign key
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drivers');
    }
}
