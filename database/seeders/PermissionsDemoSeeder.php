<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsDemoSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'create posts', 'guard_name' => 'web']);
        Permission::create(['name' => 'edit posts', 'guard_name' => 'web']);
        Permission::create(['name' => 'publish posts', 'guard_name' => 'web']);
        Permission::create(['name' => 'delete posts', 'guard_name' => 'web']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'Super-Admin']);
        //gives all permissions to super admin
        $role1->givePermissionTo(Permission::all());

        $role2 = Role::create(['name' => 'Admin']);
        //gives all permissions to admin
        $role2->givePermissionTo(Permission::all());

        $role3 = Role::create(['name' => 'editor']);
        $role3->givePermissionTo('edit posts');
        $role3->givePermissionTo('publish posts');

        $role4 = Role::create(['name' => 'user']);
        $role4->givePermissionTo('create posts');

        // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'Super-Admin',
            'email' => 'superadmin@example.com',
        ]);
        $user->assignRole($role1);
        $user = \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
        ]);
        $user->assignRole($role2);
        $user = \App\Models\User::factory()->create([
            'name' => 'editor',
            'email' => 'editor@example.com',
        ]);
        $user->assignRole($role3);
        $user = \App\Models\User::factory()->create([
            'name' => 'user',
            'email' => 'usertest@example.com',
        ]);
        $user->assignRole($role4);




    }
}
