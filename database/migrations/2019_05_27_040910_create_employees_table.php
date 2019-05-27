<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('birth_certificate_number')->nullable();
            $table->string('national_code');
            $table->string('birth_place')->nullable();
            $table->string('gender');
            $table->string('email');
            $table->text('phone')->nullable();
            $table->text('mobile');
            $table->text('address')->nullable();
            $table->string('file')->nullable();
            $table->text('description');
            $table->integer('read')->default(0);
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
        Schema::dropIfExists('employees');
    }
}
