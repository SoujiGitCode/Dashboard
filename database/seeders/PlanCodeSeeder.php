<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanCodeSeeder extends Seeder
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
                'name'=>'Basic',
                'max_hotels' => 5,
                'max_users' => 5,
                'description'=>'plan basico',
                'code' => 11,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name'=>'Standard',
                'max_hotels' => 10,
                'max_users' => 10,
                'description'=>'plan estandar',
                'code' => 22,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name'=>'Premium',
                'max_hotels' => 15,
                'max_users' => 15,
                'description'=>'plan premium',
                'code' => 33,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name'=>'Custom',
                'max_hotels' => null,
                'max_users' => null,
                'description'=>'plan personalizado',
                'code' => 44,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        DB::table('plan_codes')->insert($data);
    }
}
