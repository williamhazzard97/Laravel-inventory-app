<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Item;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Permission::create(['name' => 'create-users']);
        Permission::create(['name' => 'edit-users']);
        Permission::create(['name' => 'delete-users']);

        Permission::create(['name' => 'add-items']);
        Permission::create(['name' => 'edit-items']);
        Permission::create(['name' => 'delete-items']);

        $adminRole = Role::create(['name' => 'Admin']);
        $guestRole = Role::create(['name' => 'Guest']);

        $adminRole->givePermissionTo([
            'create-users',
            'edit-users',
            'delete-users',
            'add-items',
            'edit-items',
            'delete-items',
        ]);

        // $guestRole->givePermissionTo([
        //     'add-items',
        //     'edit-items',
        //     'delete-items',
        // ]);
    }
}
