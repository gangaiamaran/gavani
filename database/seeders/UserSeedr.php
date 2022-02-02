<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class UserSeedr extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usersList = [
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@example.com',
                'password' => Hash::make('password'),
                'time_zone' => 'Asia/Kolkata',
                'roles' => ['Root'],
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'time_zone' => 'Asia/Kolkata',
                'roles' => ['Admin'],
            ],
            [
                'name' => 'User',
                'email' => 'user@example.com',
                'password' => Hash::make('password'),
                'time_zone' => 'Asia/Kolkata',
                'roles' => ['User'],
            ],
        ];

        foreach ($usersList as $eachUser) {
            $user = User::create(Arr::except($eachUser, ['roles']));
            $user->syncRoles(Role::whereIn('name', $eachUser['roles'])->get());
        }
    }
}
