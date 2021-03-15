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
                'plan_code_id'=>'1',
                'provider_id'=>'1',
                'max_hotels'=>'5',
                'max_users'=>'5',
                'description' => 'text descp',
                'created_at' => now()
            ],
            [
                'plan_code_id'=>'2',
                'provider_id'=>'2',
                'max_hotels'=>'10',
                'max_users'=>'10',
                'description' => 'text test',
                'created_at' => now()
            ],
            [
                'plan_code_id'=>'2',
                'provider_id'=>'3',
                'max_hotels'=>'10',
                'max_users'=>'10',
                'description' => 'text test',
                'created_at' => now()
            ],
            [
                'plan_code_id'=>'2',
                'provider_id'=>'4',
                'max_hotels'=>'10',
                'max_users'=>'10',
                'description' => 'text test',
                'created_at' => now()
            ],
            [
                'plan_code_id'=>'2',
                'provider_id'=>'5',
                'max_hotels'=>'10',
                'max_users'=>'10',
                'description' => 'text test',
                'created_at' => now()
            ],
            [
                'plan_code_id'=>'2',
                'provider_id'=>'6',
                'max_hotels'=>'10',
                'max_users'=>'10',
                'description' => 'text test',
                'created_at' => now()
            ],
            [
                'plan_code_id'=>'2',
                'provider_id'=>'7',
                'max_hotels'=>'10',
                'max_users'=>'10',
                'description' => 'text test',
                'created_at' => now()
            ],
            [
                'plan_code_id'=>'2',
                'provider_id'=>'8',
                'max_hotels'=>'10',
                'max_users'=>'10',
                'description' => 'text test',
                'created_at' => now()
            ],
            [
                'plan_code_id'=>'2',
                'provider_id'=>'9',
                'max_hotels'=>'10',
                'max_users'=>'10',
                'description' => 'text test',
                'created_at' => now()
            ],




        ];

        DB::table('plans')->insert($data);
    }
}
