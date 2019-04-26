<?php

use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::statement('TRUNCATE TABLE `categories`');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        $category = Category::create([
            'title' => 'دسته بندی',
            'slug' => 'دسته-بندی',
            'description' => '',
            'lft' => 1,
            'rgt' => 6,
            'depth' => 1,
            'state' => 1,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        $category = Category::create([
            'title' => 'دسته بندی بلاگ ها',
            'slug' => 'دسته-بندی-بلاگ-ها',
            'description' => '',
            'parent_id' => 1,
            'lft' => 2,
            'rgt' => 3,
            'depth' => 2,
            'state' => 1,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
    }
}
