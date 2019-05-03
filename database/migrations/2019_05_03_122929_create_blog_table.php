<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->text('content')->nullable();
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

        Schema::table('blog', function (Blueprint $table) {
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
        Schema::create('blog_category', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('blog_id');
        });

        Schema::table('blog_category', function (Blueprint $table) {
            $table->foreign('category_id')
                ->references('id')
                ->on('categories');
            $table->foreign('blog_id')
                ->references('id')
                ->on('blog');
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
        Schema::drop('blog_category');
        Schema::drop('blog');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
