<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');

            $table->timestamps();
        });

        Schema::create('tag_video', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tag_id');
            $table->unsignedInteger('video_id');
        });

        Schema::table('tag_video', function (Blueprint $table) {
            $table->foreign('tag_id')
                ->references('id')
                ->on('tags');
            $table->foreign('video_id')
                ->references('id')
                ->on('videos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::drop('tag_video');
        Schema::dropIfExists('tags');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
