<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('image')->nullable();
            $table->text('scientific_records')->nullable();
            $table->text('social_records')->nullable();
            $table->integer('job_id')->unsigned();
            $table->integer('state')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('partners', function (Blueprint $table) {
            $table->foreign('job_id')
                ->references('id')
                ->on('jobs');
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
        Schema::drop('partners');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
