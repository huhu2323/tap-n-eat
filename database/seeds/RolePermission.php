<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()['cache']->forget('spatie.permission.cache');

        // pos permissions
        Permission::create(['name' => 'view-pos-record']);
        Permission::create(['name' => 'delete-pos-record']);
        Permission::create(['name' => 'update-pos-record']);

        // product category permissions
        Permission::create(['name' => 'create-pcategory']);
        Permission::create(['name' => 'view-pcategory']);
        Permission::create(['name' => 'update-pcategory']);
        Permission::create(['name' => 'delete-pcategory']);

        // product premission
        Permission::create(['name' => 'create-product']);
        Permission::create(['name' => 'view-product']);
        Permission::create(['name' => 'update-product']);
        Permission::create(['name' => 'delete-product']);

        // member permission
        Permission::create(['name' => 'create-member']);
        Permission::create(['name' => 'view-member']);
        Permission::create(['name' => 'update-member']);
        Permission::create(['name' => 'delete-member']);

        // user permission
        Permission::create(['name' => 'create-role']);
        Permission::create(['name' => 'view-role']);
        Permission::create(['name' => 'update-role']);
        Permission::create(['name' => 'delete-role']);

        // users
        Permission::create(['name' => 'create-user']);
        Permission::create(['name' => 'view-user']);
        Permission::create(['name' => 'update-user']);
        Permission::create(['name' => 'delete-user']);

         // set-us
        Permission::create(['name' => 'cashier']);
        Permission::create(['name' => 'chef']);


        //cashier



        // create roles and assign created permissions
        $role = Role::create(['name' => 'Super Admin']);
        $role->givePermissionTo(Permission::all());


        $role = Role::create(['name' => 'Head Cashier']);
        $role->givePermissionTo('cashier');
        $role->givePermissionTo('chef');


        $role = Role::create(['name' => 'Manager']);
        $role->givePermissionTo('view-pos-record');
        $role->givePermissionTo('create-product');
        $role->givePermissionTo('view-product');
        $role->givePermissionTo('update-product');
        $role->givePermissionTo('delete-product');
        $role->givePermissionTo('create-member');
        $role->givePermissionTo('view-member');
        $role->givePermissionTo('update-member');
        $role->givePermissionTo('delete-member');

        $user = User::find(1);
        $user->assignRole('Super Admin');

    }
}
