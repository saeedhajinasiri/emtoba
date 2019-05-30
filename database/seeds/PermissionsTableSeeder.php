<?php

use App\Permission;
use App\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::statement('TRUNCATE TABLE `permission_role`');
        DB::statement('TRUNCATE TABLE `permissions`');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        $role = Role::find(1);


        $permission = Permission::create([
            'name' => 'admin.dashboard.read',
            'display_name' => 'Admin Dashboard Home Read'
        ]);
        $role->permissions()->attach($permission);
        // PROFILE PERMISSIONS
        $permission = Permission::create([
            'name' => 'admin.profile.read',
            'display_name' => 'Admin Profile Read'
        ]);
        $role->permissions()->attach($permission);
        $permission = Permission::create([
            'name' => 'admin.profile.update',
            'display_name' => 'Admin Profile Update'
        ]);
        $role->permissions()->attach($permission);

        // default permissions
        $this->setCRUDPermissions($role, 'Customers');
        $this->setCRUDPermissions($role, 'Admins');
        $this->setCRUDPermissions($role, 'Roles');
        $this->setCRUDPermissions($role, 'Permissions');
        $this->setCRUDPermissions($role, 'Menus');
        $this->setCRUDPermissions($role, 'Posts');
        $this->setCRUDPermissions($role, 'Pages');
        $this->setCRUDPermissions($role, 'Links');
        $this->setCRUDPermissions($role, 'Translations');
        $this->setCRUDPermissions($role, 'Settings');
        $this->setCRUDPermissions($role, 'Comments');
        $this->setCRUDPermissions($role, 'Locations');
        $this->setCRUDPermissions($role, 'Sliders');
        $this->setCRUDPermissions($role, 'Categories');
        $this->setCRUDPermissions($role, 'Contacts');
        $this->setCRUDPermissions($role, 'Departments');
        $this->setCRUDPermissions($role, 'Blog');
        $this->setCRUDPermissions($role, 'Videos');
        $this->setCRUDPermissions($role, 'Branches');
        $this->setCRUDPermissions($role, 'Partners');
        $this->setCRUDPermissions($role, 'Attorney');
        $this->setCRUDPermissions($role, 'Employees');
        $this->setCRUDPermissions($role, 'Camps');
        $this->setCRUDPermissions($role, 'Concerts');
        $this->setCRUDPermissions($role, 'Matches');

        // START custom permissions
        // $this->setCRUDPermissions($role, 'Videos');
        // END custom permissions


        /**
         *
         * DASHBOARD PERMISSIONS
         *
         */

        /*$permission = Permission::create([
            'name' => 'admin.databases.read',
            'display_name' => 'Admin Databases Home Read'
        ]);
        $role->permissions()->attach($permission);*/

        $customerRole = Role::find(2);

        $permission = Permission::create([
            'display_name' => 'Dashboard Notifications Read',
            'name' => 'dashboard.notifications.read',
        ]);
        $customerRole->permissions()->attach($permission);

        $permission = Permission::create([
            'display_name' => 'Dashboard Discussions Read',
            'name' => 'dashboard.discussions.read',
        ]);
        $customerRole->permissions()->attach($permission);

        $permission = Permission::create([
            'display_name' => 'Dashboard Home Read',
            'name' => 'dashboard.home.read',
        ]);
        $customerRole->permissions()->attach($permission);

        $permission = Permission::create([
            'display_name' => 'Dashboard Announcements Read',
            'name' => 'dashboard.announcements.read',
        ]);
        $customerRole->permissions()->attach($permission);

        $permission = Permission::create([
            'display_name' => 'Dashboard Profile Read',
            'name' => 'dashboard.profile.read',
        ]);
        $customerRole->permissions()->attach($permission);

        $permission = Permission::create([
            'display_name' => 'Dashboard Profile Update',
            'name' => 'dashboard.profile.update',
        ]);
        $customerRole->permissions()->attach($permission);

        $permission = Permission::create([
            'display_name' => 'Dashboard Password Read',
            'name' => 'dashboard.password.read',
        ]);
        $customerRole->permissions()->attach($permission);

        $permission = Permission::create([
            'display_name' => 'Dashboard Password Update',
            'name' => 'dashboard.password.update',
        ]);
        $customerRole->permissions()->attach($permission);

        $permission = Permission::create([
            'display_name' => 'Dashboard Settings Update',
            'name' => 'dashboard.settings.update',
        ]);
        $customerRole->permissions()->attach($permission);
    }

    /**
     * @param $role
     * @param $component
     */
    public function setCRUDPermissions($role, $component)
    {
        $permission = Permission::create([
            'name' => strtolower($role->name) . '.' . strtolower($component) . '.create',
            'display_name' => ucfirst($role->name) . ' ' . $component . ' Create'
        ]);

        $role->permissions()->attach($permission);

        $permission = Permission::create([
            'name' => strtolower($role->name) . '.' . strtolower($component) . '.read',
            'display_name' => ucfirst($role->name) . ' ' . $component . ' Read'
        ]);

        $role->permissions()->attach($permission);

        $permission = Permission::create([
            'name' => strtolower($role->name) . '.' . strtolower($component) . '.update',
            'display_name' => ucfirst($role->name) . ' ' . $component . ' Update'
        ]);

        $role->permissions()->attach($permission);

        $permission = Permission::create([
            'name' => strtolower($role->name) . '.' . strtolower($component) . '.delete',
            'display_name' => ucfirst($role->name) . ' ' . $component . ' Delete'
        ]);

        $role->permissions()->attach($permission);
    }
}
