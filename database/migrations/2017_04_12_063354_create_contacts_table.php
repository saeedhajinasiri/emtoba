<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subject');
            $table->text('content');

            $table->string('user_name')->nullable();
            $table->string('user_email')->nullable();
            $table->text('user_phone')->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->ipAddress('user_ip');

            $table->integer('department_id')->unsigned();
            $table->integer('assignee_id')->unsigned()->nullable();

            $table->integer('state');
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->timestamps();
            $table->timestamp('read_at')->nullable();
            $table->softDeletes();
        });

        Schema::table('contacts', function (Blueprint $table) {
            $table->foreign('created_by')
                ->references('id')
                ->on('users');
            $table->foreign('updated_by')
                ->references('id')
                ->on('users');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->foreign('department_id')
                ->references('id')
                ->on('departments');
            $table->foreign('assignee_id')
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
        Schema::dropIfExists('contacts');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
