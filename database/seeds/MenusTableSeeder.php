<?php

use App\Menu;
use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu = Menu::create([
            'title' => 'منوی اصلی',
            'slug' => 'منوی-اصلی',
            'route' => 'منوی-اصلی',
            'description' => 'منوی اصلی',
            'lft' => '1',
            'rgt' => '2',
            'depth' => '0',
            'state' => '1',
            'created_by' => '1',
            'updated_by' => '1',
        ]);
    }
}
