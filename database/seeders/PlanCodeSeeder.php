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
                'code'=>'Basic',
                'description'=>'plan basico',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code'=>'Standard',
                'description'=>'plan estandar',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code'=>'Premium',
                'description'=>'plan premium',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'code'=>'Custom',
                'description'=>'plan personalizado',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        DB::table('plan_codes')->insert($data);
    }
}
