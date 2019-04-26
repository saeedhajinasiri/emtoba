<?php

use App\Admin;
use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'state' => '1',
            'first_name' => 'سعید',
            'last_name' => 'نصیری',
            'username' => 'admin',
            'email' => 'saeed.hajinasiri@gmail.com',
            'mobile' => '09212375850',
            'password' => Hash::make('q1w2e3'),
            'loginable_id' => 1,
            'loginable_type' => 'App\Admin',
        ]);
        $admin = Admin::create([
            'state' => 1,
            'created_by' => 1,
            'updated_by' => 1,
        ]);

        $role = Role::create([
            'name' => 'admin',
            'display_name' => 'admin',
            'description' => 'admin',
        ]);

        $role->users()->save($user);

        Role::create([
            'name' => 'customer',
            'display_name' => 'customer',
            'description' => 'customer',
        ]);
    }
}
