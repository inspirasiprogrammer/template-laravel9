<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Hash;
use Str;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super = User::create([
            'role' => 'admin',
            'avatar' => 'uploads/avatar.png',
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
        ]);

        $roleSuperAdmin = Role::create(['name' => 'superadmin']);
        //create permission
        $permissions = [
            [
                'group_name' => 'Data',
                'permissions' => [
                    'satuan',
                ]
            ],
            [
                'group_name' => 'Site Settings',
                'permissions' => [
                    'admin',
                    'developer-settings',
                    'roles',
                ]
            ],
        ];

        //assign permission

        foreach ($permissions as $key => $row) {
            foreach ($row['permissions'] as $per) {
                $permission = Permission::create(['name' => $per, 'group_name' => $row['group_name']]);
                $roleSuperAdmin->givePermissionTo($permission);
                $permission->assignRole($roleSuperAdmin);
                $super->assignRole($roleSuperAdmin);
            }
        }
    }
}
