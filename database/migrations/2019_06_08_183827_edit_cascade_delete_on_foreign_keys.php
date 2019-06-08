<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditCascadeDeleteOnForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tag_video', function ($table) {
            $table->dropForeign('tag_video_tag_id_foreign');
            $table->dropForeign('tag_video_video_id_foreign');
            $table->foreign('tag_id')
                ->references('id')
                ->on('tags')
                ->onDelete('cascade');
            $table->foreign('video_id')
                ->references('id')
                ->on('videos')
                ->onDelete('cascade');
        });

        Schema::table('blog_category', function ($table) {
            $table->dropForeign('blog_category_category_id_foreign');
            $table->dropForeign('blog_category_blog_id_foreign');

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');
            $table->foreign('blog_id')
                ->references('id')
                ->on('blog')
                ->onDelete('cascade');
        });

        Schema::table('blog_tag', function ($table) {
            $table->dropForeign('blog_tag_tag_id_foreign');
            $table->dropForeign('blog_tag_blog_id_foreign');

            $table->foreign('tag_id')
                ->references('id')
                ->on('tags')
                ->onDelete('cascade');
            $table->foreign('blog_id')
                ->references('id')
                ->on('blog')
                ->onDelete('cascade');
        });

        Schema::table('category_post', function ($table) {
            $table->dropForeign('category_post_category_id_foreign');
            $table->dropForeign('category_post_post_id_foreign');

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');
            $table->foreign('post_id')
                ->references('id')
                ->on('posts')
                ->onDelete('cascade');
        });

        Schema::table('category_video', function ($table) {
            $table->dropForeign('category_video_category_id_foreign');
            $table->dropForeign('category_video_video_id_foreign');

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');
            $table->foreign('video_id')
                ->references('id')
                ->on('videos')
                ->onDelete('cascade');
        });

        Schema::table('department_user', function ($table) {
            $table->dropForeign('department_user_user_id_foreign');
            $table->dropForeign('department_user_department_id_foreign');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('department_id')
                ->references('id')
                ->on('departments')
                ->onDelete('cascade');
        });

        Schema::table('post_tag', function ($table) {
            $table->dropForeign('post_tag_tag_id_foreign');
            $table->dropForeign('post_tag_post_id_foreign');

            $table->foreign('tag_id')
                ->references('id')
                ->on('tags')
                ->onDelete('cascade');
            $table->foreign('post_id')
                ->references('id')
                ->on('posts')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
