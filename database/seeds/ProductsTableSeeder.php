<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
            'id' => 1,
            'category_id' => 1,
            'subcategory_id' => 1,
            'brand_id' => 1,
            'product_name' => 'テスト商品',
            'product_code' => 'abc',
            'product_quantity' => 11,
            'product_details' => 'これはテストです',
            'main_slider' => 1,
            'hot_deal' => 1,
            'buyone_getone' => 1,
            'best_rated' => 1,
            'mid_slider' => 1,
            'hot_new' => 1,
            'trend' => 1,
            'selling_price' => 1000,
            'image_one' => 'media/product/1655653679254831.png',
            'image_two' => 'media/product/1655653679365681.png',
            'image_three' => 'media/product/1655653679516457.png',
            'status' => 1,
            'created_at' => '2021/01/01 11:11:11',
        ],
        [
            'id' => 2,
            'category_id' => 2,
            'subcategory_id' => 2,
            'brand_id' => 2,
            'product_name' => '2テスト商品',
            'product_code' => 'def',
            'product_quantity' => 22,
            'product_details' => '2これはテストです',
            'main_slider' => 1,
            'hot_deal' => 1,
            'buyone_getone' => 1,
            'best_rated' => 1,
            'mid_slider' => 1,
            'hot_new' => 1,
            'trend' => 1,
            'selling_price' => 2000,
            'image_one' => 'media/product/1656190056885969.png',
            'image_two' => 'media/product/1656190058045915.png',
            'image_three' => 'media/product/1656190058130287.png',
            'status' => 1,
            'created_at' => '2021/01/01 11:11:11',
        ],
        [
            'id' => 3,
            'category_id' => 3,
            'subcategory_id' => 3,
            'brand_id' => 3,
            'product_name' => '2テスト商品',
            'product_code' => 'ghi',
            'product_quantity' => 33,
            'product_details' => '3これはテストです',
            'main_slider' => 1,
            'hot_deal' => 1,
            'buyone_getone' => 1,
            'best_rated' => 1,
            'mid_slider' => 1,
            'hot_new' => 1,
            'trend' => 1,
            'selling_price' => 3000,
            'image_one' => 'media/product/1656190716473481.png',
            'image_two' => 'media/product/1656190716599076.png',
            'image_three' => 'media/product/1656190716728600.png',
            'status' => 1,
            'created_at' => '2021/01/01 11:11:11',
        ],

        ]);
    }
}
