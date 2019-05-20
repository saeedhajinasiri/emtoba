<?php

use App\Menu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PartnersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::statement('TRUNCATE TABLE `partners`');
        DB::statement('TRUNCATE TABLE `jobs`');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        DB::unprepared(file_get_contents(base_path('database/seeds/partners.sql')));
    }
}
