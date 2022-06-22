<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'admin',
                'display_name' => 'Admin',
                'description' => 'Can access all features!'
            ],
            [
                'name' => 'master_admin',
                'display_name' => 'Master Admin',
                'description' => 'Can access limited features!'
            ],
            [
                'name' => 'master_distributer',
                'display_name' => 'Master Distributer',
                'description' => 'Can access limited features!'
            ],
            [
                'name' => 'distributer',
                'display_name' => 'Distributer',
                'description' => 'Can access limited features!'
            ],
            [
                'name' => 'retailer',
                'display_name' => ' Retailer',
                'description' => 'Can access limited features!'
            ],
        ];

        foreach ($roles as $key => $value) {
            $role = Role::create([
                'name' => $value['name'],
                'display_name' => $value['display_name'],
                'description' => $value['description']
            ]);

            User::first()->attachRole($role);
        }
    }
}
