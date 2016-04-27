<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademyImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academy_images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('academy_id')->unsigned();
            $table->foreign('academy_id')->references('id')->on('academies')->onDelete('cascade');
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
        Schema::drop('academy_images');
    }
}
