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
                'created_at' => now()
            ],
            [
                'user_id'=>'6',
                'created_at' => now()
            ],
            [
                'user_id'=>'7',
                'created_at' => now()
            ],


            [
                'user_id'=>'8',
                'created_at' => now()
            ],
            [
                'user_id'=>'9',
                'created_at' => now()
            ],
            [
                'user_id'=>'10',
                'created_at' => now()
            ],

            [
                'user_id'=>'11',
                'created_at' => now()
            ],
            [
                'user_id'=>'12',
                'created_at' => now()
            ],
            [
                'user_id'=>'13',
                'created_at' => now()
            ],






        ];

        DB::table('providers')->insert($data);
    }
}
