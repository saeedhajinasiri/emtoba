<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->tinyInteger('state')->after('id');
            $table->string('mobile')->after('loginable_type')->nullable();
            $table->string('address')->after('mobile')->nullable();
            $table->string('avatar')->after('address')->nullable();
            $table->string('new_avatar')->after('avatar')->nullable();

            $table->unsignedInteger('location_id')->nullable()->after('mobile');
            $table->string('location_path')->nullable()->after('location_id');

            $table->string('last_login_ip')->after('remember_token')->nullable();
            $table->datetime('last_login_at')->after('last_login_ip')->nullable();

            $table->foreign('location_id')
                ->references('id')
                ->on('locations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['state', 'mobile', 'address', 'avatar', 'new_avatar', 'location_id', 'location_path', 'last_login_ip', 'last_login_at']);
        });
    }
}
