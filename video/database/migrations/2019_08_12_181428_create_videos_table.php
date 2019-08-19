<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('desc');
            $table->string('meta_desc')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->boolean('published')->default(1);
            // link of youtube
            $table->string('youtube');
            $table->string('image');

            $table->integer('user_id');
            $table->integer('cat_id');
 
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
        Schema::dropIfExists('videos');
    }
}
