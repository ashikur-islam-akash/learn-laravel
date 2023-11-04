<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class UserPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('permissions')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $permissions = [
            // ['name' => 'Page'],
            // ['name' => 'Page edit'],
            // ['name' => 'Page store'],
            // ['name' => 'Page delete'],

        ];

        foreach ($permissions as $permission) {
            DB::table('permissions')->insert([
                [
                    'name' => $permission['name'],
                    'guard_name' => 'web',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]
            ]);
        }
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12311'),
        ]);

        Role::create(["name" => "Super admin"])->givePermissionTo(Permission::all());
        $user->assignRole('Super admin');
    }
}
