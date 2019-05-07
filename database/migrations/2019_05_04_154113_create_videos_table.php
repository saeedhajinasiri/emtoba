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
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->text('content')->nullable();
            $table->text('video_url')->nullable();
            $table->string('image')->nullable();
            $table->integer('author_id')->unsigned();
            $table->tinyInteger('featured')->default(0);

            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->integer('hits')->default(0);

            $table->integer('state')->default(0);
            $table->integer('created_by')->unsigned();
            $table->integer('updated_by')->unsigned();
            $table->string('published_at');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('videos', function (Blueprint $table) {
            $table->foreign('author_id')
                ->references('id')
                ->on('users');
            $table->foreign('created_by')
                ->references('id')
                ->on('users');
            $table->foreign('updated_by')
                ->references('id')
                ->on('users');
        });
        Schema::create('category_video', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('video_id');
        });

        Schema::table('category_video', function (Blueprint $table) {
            $table->foreign('category_id')
                ->references('id')
                ->on('categories');
            $table->foreign('video_id')
                ->references('id')
                ->on('videos');
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
        Schema::drop('category_video');
        Schema::drop('tag_video');
        Schema::drop('videos');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
