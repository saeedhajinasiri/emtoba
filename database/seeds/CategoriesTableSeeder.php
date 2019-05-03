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
            'category_name' => 'root',
            'description' => '',
            'lft' => 1,
            'rgt' => 8,
            'depth' => 1,
            'state' => 1,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        $category = Category::create([
            'title' => 'دسته بندی خبر ها',
            'slug' => 'دسته-بندی-خبر-ها',
            'category_name' => 'news',
            'description' => '',
            'parent_id' => 1,
            'lft' => 2,
            'rgt' => 3,
            'depth' => 2,
            'state' => 1,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        $category = Category::create([
            'title' => 'دسته بندی مقاله ها',
            'slug' => 'دسته-بندی-مقاله-ها',
            'category_name' => 'articles',
            'description' => '',
            'parent_id' => 1,
            'lft' => 4,
            'rgt' => 5,
            'depth' => 2,
            'state' => 1,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
        $category = Category::create([
            'title' => 'دسته بندی خدمات',
            'slug' => 'دسته-بندی-خدمات',
            'category_name' => 'services',
            'description' => '',
            'parent_id' => 1,
            'lft' => 6,
            'rgt' => 7,
            'depth' => 2,
            'state' => 1,
            'created_by' => 1,
            'updated_by' => 1,
        ]);
    }
}
