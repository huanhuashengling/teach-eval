<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class BasicAdminPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        // create permissions
        $permissions = [
            'permission list',
            'permission create',
            'permission edit',
            'permission delete',
            'role list',
            'role create',
            'role edit',
            'role delete',
            'user list',
            'user create',
            'user edit',
            'user delete',
         ];

         $taskPermission = [
            'task list',
            'task create',
            'task edit',
            'task delete',
            'task_log list',
            'task_log create',
            'task_log edit',
            'task_log delete',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'writer']);
        // $role1->givePermissionTo('permission list');
        // $role1->givePermissionTo('role list');
        // $role1->givePermissionTo('user list');
        $role2 = Role::create(['name' => 'admin']);
        foreach ($taskPermission as $permission) {
            Permission::create(['name' => $permission]);
            $role2->givePermissionTo($permission);
        }
        $role3 = Role::create(['name' => 'super-admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider
        // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => '管理员',
            'phone' => '13487564267',
            'sex' => '1',
            'schools_id' => '1',
            'is_member' => '0',
            'order' => '0',
            'is_formal' => '0',
            'is_working' => '0',
        ]);
        $user->assignRole($role3);
        $user = \App\Models\User::factory()->create([
            'name' => '操作员',
            'phone' => '13755164667',
            'sex' => '1',
            'schools_id' => '1',
            'is_member' => '0',
            'order' => '0',
            'is_formal' => '0',
            'is_working' => '0',
        ]);
        $user->assignRole($role2);
    }
}
