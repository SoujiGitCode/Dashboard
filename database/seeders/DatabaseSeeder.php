<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::Table('roles')->insert([
        'name'=>'super-admin',
        'slug'=>'vip',
        'description'=>'highest role',
        'code'=>'vip-code',
        ]);

        DB::Table('roles')->insert([
            'name'=>'admin',
            'slug'=>'admin',
            'description'=>'admin role',
            'code'=>'admin-code',
        ]);


        DB::Table('roles')->insert([
            'name'=>'distributor',
            'slug'=>'dist',
            'description'=>'distributor role',
            'code'=>'dist-code',
        ]);

        DB::Table('roles')->insert([
            'name'=>'hotel',
            'slug'=>'hotel',
            'description'=>'hotel role',
            'code'=>'hotel-code',
        ]);
    }
}
