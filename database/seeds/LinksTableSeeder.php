<?php

use App\Menu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::statement('TRUNCATE TABLE `links`');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        DB::unprepared(file_get_contents(base_path('database/seeds/links.sql')));
    }
}
