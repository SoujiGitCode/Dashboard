<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvidersSeeder extends Seeder
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
                'user_id'=>'5',
                'hotels'=>'01, 02',
                'alias'=>'alias-reinaldo',
                'status'=>'1',
                'created_by'=>'vip',
                'created_at' => now()
            ],
            [
                'user_id'=>'6',
                'hotels'=>'03, 04, 05',
                'alias'=>'alias-569',
                'status'=>'0',
                'created_by'=>'vip',
                'created_at' => now()
            ],

        ];

        DB::table('providers')->insert($data);
    }
}
