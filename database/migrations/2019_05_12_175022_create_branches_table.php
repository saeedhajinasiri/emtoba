<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('name')->nullable();
            $table->string('tel')->nullable();
            $table->string('fax')->nullable();
            $table->string('website')->nullable();
            $table->string('email')->nullable();
            $table->text('address')->nullable();
            $table->string('image')->nullable();

            $table->integer('state')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('branches');
    }
}
