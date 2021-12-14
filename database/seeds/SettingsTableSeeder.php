<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'id' => 1,
            'vat' => 0.1,
            'shipping_charge' => '800',
            'email' => 'test@gmail.com',
            'phone' => 0300000000,
            'adderss' => '東京',
            'shopname' => 'テストショップ',
            'created_at' => '2021/01/01 11:11:11',
        ]);
    }
}
