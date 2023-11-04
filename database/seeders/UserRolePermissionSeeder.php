<?php

namespace Database\Seeders;

//use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Sazzad Bin Ashique',
            'email' => 'admin@gmail.com',
            'phone' => '01744938010',
            'password' => bcrypt('1234567890'),
        ]);

        $account_person = User::create([
            'name' => 'Account person',
            'email' => 'account@gmail.com',
            'phone' => '01744938011',
            'password' => bcrypt('1234567890'),
        ]);
        // permission create
        $permissions = [
            'user-access',
            'user-lists',
            'user-create',
            'user-edit',
            'user-show',
            'user-delete',
            'user-profile',
            'role-permission-access',
            'role-permission-lists',
            'role-permission-create',
            'role-permission-edit',
            'role-permission-show',
            'role-permission-delete',
            'permission-assign',
        ];
        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name'=>$permission,
            ]);
        }

        $adminRole = Role::create(['name' => 'Admin', 'guard_name' => 'web'])
            ->givePermissionTo([
                'user-access',
                'user-lists',
                'user-create',
                'user-edit',
                'user-show',
                'user-delete',
                'user-profile',
                'role-permission-access',
                'role-permission-lists',
                'role-permission-create',
                'role-permission-edit',
                'role-permission-show',
                'role-permission-delete',
                'permission-assign',

            ]);
        $acountRole = Role::create(['name' => 'Account Person', 'guard_name' => 'web'])
            ->givePermissionTo([
                'user-access',
                'user-lists',
                'user-show',
                'user-profile',
            ]);

        // user role assign
        $admin->assignRole([$adminRole->id]);
        $account_person->assignRole([$acountRole->id]);

    }
}
