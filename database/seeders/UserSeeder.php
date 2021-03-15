<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => Str::random(10),
                'role_id' => 1,
                'email' => 'vip@gmail.com',
                'password' => Hash::make('password'),
                'avatar' => '/assets/images/users/avatar-1.jpg',
                'created_at' => now()
            ],
            [
                'name' => Str::random(10),
                'role_id' => 2,
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
                'avatar' => '/assets/images/users/avatar-2.jpg',
                'created_at' => now()
            ],
            [
                'name' => Str::random(10),
                'role_id' => 3,
                'email' => 'distributor@gmail.com',
                'password' => Hash::make('password'),
                'avatar' => '/assets/images/users/avatar-3.jpg',
                'created_at' => now()
            ],
            [
                'name' => Str::random(10),
                'role_id' => 4,
                'email' => 'manager@gmail.com',
                'password' => Hash::make('password'),
                'avatar' => '/assets/images/users/avatar-4.jpg',
                'created_at' => now()
            ],

            [
                'name' => Str::random(10),
                'role_id' => 3,
                'email' => 'dist2@gmail.com',
                'password' => Hash::make('password'),
                'avatar' => '/assets/images/users/avatar-4.jpg',
                'created_at' => now()
            ],

            [
                'name' => Str::random(10),
                'role_id' => 3,
                'email' => 'dist3@gmail.com',
                'password' => Hash::make('password'),
                'avatar' => '/assets/images/users/avatar-4.jpg',
                'created_at' => now()
            ],
            [
                'name' => Str::random(10),
                'role_id' => 3,
                'email' => 'dist4@gmail.com',
                'password' => Hash::make('password'),
                'avatar' => '/assets/images/users/avatar-4.jpg',
                'created_at' => now()
            ],
            [
                'name' => Str::random(10),
                'role_id' => 4,
                'email' => 'manager1@gmail.com',
                'password' => Hash::make('password'),
                'avatar' => '/assets/images/users/avatar-4.jpg',
                'created_at' => now()
            ],
            [
                'name' => Str::random(10),
                'role_id' => 4,
                'email' => 'manager2@gmail.com',
                'password' => Hash::make('password'),
                'avatar' => '/assets/images/users/avatar-4.jpg',
                'created_at' => now()
            ],
            [
                'name' => Str::random(10),
                'role_id' => 4,
                'email' => 'manager3@gmail.com',
                'password' => Hash::make('password'),
                'avatar' => '/assets/images/users/avatar-4.jpg',
                'created_at' => now()
            ],
            [
                'name' => Str::random(10),
                'role_id' => 5,
                'email' => 'agent1@gmail.com',
                'password' => Hash::make('password'),
                'avatar' => '/assets/images/users/avatar-4.jpg',
                'created_at' => now()
            ],
            [
                'name' => Str::random(10),
                'role_id' => 5,
                'email' => 'agent2@gmail.com',
                'password' => Hash::make('password'),
                'avatar' => '/assets/images/users/avatar-4.jpg',
                'created_at' => now()
            ],
            [
                'name' => Str::random(10),
                'role_id' => 5,
                'email' => 'agent3@gmail.com',
                'password' => Hash::make('password'),
                'avatar' => '/assets/images/users/avatar-4.jpg',
                'created_at' => now()
            ],
        ];

        DB::table('users')->insert($data);
    }
}
