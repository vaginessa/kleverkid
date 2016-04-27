<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AcademyTags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academy_tags', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->integer('tag_id')->unsigned();
            $table->integer('academy_id')->unsigned();
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
        Schema::table('academy_tags', function (Blueprint $table) {
            //
        });
    }
}
