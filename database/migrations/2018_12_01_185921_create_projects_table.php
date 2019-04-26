<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('page_title');
            $table->string('slug');
            $table->text('content')->nullable();
            $table->text('abstract')->nullable();
            $table->text('video_description')->nullable();
            $table->string('image')->nullable();
            $table->string('video_cover')->nullable();
            $table->integer('author_id')->unsigned();

            $table->string('architects')->nullable();
            $table->string('location')->nullable();
            $table->string('employer')->nullable();
            $table->string('project_year')->nullable();
            $table->string('dimension')->nullable();
            $table->string('length')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->tinyInteger('featured')->default(0);
            $table->integer('hits')->default(0);

            $table->integer('state')->default(0);
            $table->integer('created_by')->unsigned();
            $table->integer('updated_by')->unsigned();
            $table->string('published_at');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('projects', function (Blueprint $table) {
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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('projects');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
