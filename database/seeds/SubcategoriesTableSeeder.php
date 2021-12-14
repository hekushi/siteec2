<?php

use Illuminate\Database\Seeder;

class SubcategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subcategories')->insert([
            ['id' => 1,
            'category_id' => 1,
            'subcategory_name' => '1ここにサブカテゴリー名が入ります',
            'created_at' => '2021/01/01 11:11:11',
        ],
        ['id' => 2,
            'category_id' => 2,
            'subcategory_name' => '2ここにサブカテゴリー名が入ります',
            'created_at' => '2021/01/01 11:11:11',
        ],
        ['id' => 3,
            'category_id' => 3,
            'subcategory_name' => '3ここにサブカテゴリー名が入ります',
            'created_at' => '2021/01/01 11:11:11',
        ],
        ['id' => 4,
            'category_id' => 1,
            'subcategory_name' => '11ここにサブカテゴリー名が入ります',
            'created_at' => '2021/01/01 11:11:11',
        ],
        ['id' => 5,
            'category_id' => 2,
            'subcategory_name' => '22ここにサブカテゴリー名が入ります',
            'created_at' => '2021/01/01 11:11:11',
        ],
        ['id' => 6,
            'category_id' => 3,
            'subcategory_name' => '33ここにサブカテゴリー名が入ります',
            'created_at' => '2021/01/01 11:11:11',
        ],
            
            
        ]);
    }
    
}
