<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlansSeeders extends Seeder
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
                'plan_code_id'=>'2',
                'provider_id'=>'1',
                'max_hotels'=>'5',
                'max_users'=>'3',
                'description' => 'text descp',
                'created_at' => now()
            ],
            [
                'plan_code_id'=>'3',
                'provider_id'=>'2',
                'max_hotels'=>'6',
                'max_users'=>'6',
                'description' => 'text test',
                'created_at' => now()
            ],

        ];

        DB::table('plans')->insert($data);
    }
}
