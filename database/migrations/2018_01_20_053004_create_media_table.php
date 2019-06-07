<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('path')->defaut('');
            $table->string('disk', 31);
            $table->string('url', 1022)->nullable();
            $table->string('mime_type')->nullable();
            $table->morphs('mediable');

            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->unsignedInteger('user_id')->nullable();

            $table->integer('state');
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('media', function (Blueprint $table) {
            $table->foreign('created_by')
                ->references('id')
                ->on('users');

            $table->foreign('updated_by')
                ->references('id')
                ->on('users');

            $table->foreign('user_id')
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
        Schema::dropIfExists('media');
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
    }
}
