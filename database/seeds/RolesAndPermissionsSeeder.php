<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['guard_name' => 'admin', 'name' => 'user-list']); // index, show , any another function added
        Permission::create(['guard_name' => 'admin', 'name' => 'user-create']);// create , store
        Permission::create(['guard_name' => 'admin', 'name' => 'user-edit']); // edit , update
        Permission::create(['guard_name' => 'admin', 'name' => 'user-delete']); // delete

        Permission::create(['guard_name' => 'admin', 'name' => 'administration-list']);
        Permission::create(['guard_name' => 'admin', 'name' => 'administration-create']);
        Permission::create(['guard_name' => 'admin', 'name' => 'administration-edit']);
        Permission::create(['guard_name' => 'admin', 'name' => 'administration-delete']);

        Permission::create(['guard_name' => 'admin', 'name' => 'role-list']);
        Permission::create(['guard_name' => 'admin', 'name' => 'role-create']);
        Permission::create(['guard_name' => 'admin', 'name' => 'role-edit']);
        Permission::create(['guard_name' => 'admin', 'name' => 'role-delete']);

        Permission::create(['guard_name' => 'admin', 'name' => 'permission-list']);

        Permission::create(['guard_name' => 'admin', 'name' => 'dashboard-show']);


        // create roles and assign created permissions
        $role = Role::create(['guard_name' => 'admin', 'name' => 'accounting'])
            ->givePermissionTo(['user-list', 'user-edit', 'user-create']);


        $role = Role::create(['guard_name' => 'admin', 'name' => 'resolution'])
            ->givePermissionTo(['user-list', 'user-create', 'user-create']);

        $role = Role::create(['guard_name' => 'admin', 'name' => 'technical-support'])
            ->givePermissionTo(Spatie\Permission\Models\Permission::where('guard_name', 'admin')->get());


        $role = Role::create(['guard_name' => 'admin', 'name' => 'manager'])
            ->givePermissionTo(
                Spatie\Permission\Models\Permission::where('guard_name', 'admin')
                    ->where('name', '!=', 'role-list')
                    ->where('name', '!=', 'role-create')
                    ->where('name', '!=', 'role-edit')
                    ->where('name', '!=', 'role-delete')
                    ->where('name', '!=', 'permission-list')
                    ->get()
            );


//        $role = Role::create(['name' => 'super-admin']);
//        $role->givePermissionTo(Permission::all());
    }
}
