<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::Table('roles')->insert([
            'name'=>'super-admin',
            'slug'=>'vip',
            'description'=>'highest role',
            'code'=>'99',
            'created_at' => now()
            ]);

        DB::Table('roles')->insert([
            'name'=>'admin',
            'slug'=>'admin',
            'description'=>'admin role',
            'code'=>'88',
            'created_at' => now()
        ]);

        DB::Table('roles')->insert([
            'name'=>'distributor',
            'slug'=>'dist',
            'description'=>'distributor role',
            'code'=>'77',
            'created_at' => now()
        ]);

        DB::Table('roles')->insert([
            'name'=>'hotel',
            'slug'=>'hotel',
            'description'=>'hotel role',
            'code'=>'66',
            'created_at' => now()
        ]);
    }
}
