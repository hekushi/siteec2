<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
            [
            'id' => 1,
            'brand_name' => 'ここにブランド名が入ります',
            'brand_logo' => 'media/brand/190120_20_05_27.png',
            'created_at' => '2021/01/01 11:11:11',
        ],
        [
            'id' => 2,
            'brand_name' => '2ここにブランド名が入ります',
            'brand_logo' => 'media/brand/190120_20_11_26.png',
            'created_at' => '2021/01/01 11:11:11',
        ],
        [
            'id' => 3,
            'brand_name' => '3ここにブランド名が入ります',
            'brand_logo' => 'media/brand/190120_20_17_27.png',
            'created_at' => '2021/01/01 11:11:11',
        ],
            
        ]);
    }
}
