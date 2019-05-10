<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('blog_tag', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('tag_id');
            $table->unsignedInteger('blog_id');
        });

        Schema::table('blog_tag', function (Blueprint $table) {
            $table->foreign('tag_id')
                ->references('id')
                ->on('tags');
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
        Schema::dropIfExists('blog_tag');
    }
}
