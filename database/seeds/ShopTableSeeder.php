<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ShopTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            DB::table('shops')->insert([
                'address' => "住所{$i}",
                'shop_name' => "お店{$i}",
                'kakakutai' => "{$i}",
                'keyword' => '居酒屋',
                'time' => '3',
                'distance' => '2',
                'telephone' => '123-222-222',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null, ]);
        }
        for ($i = 1; $i <= 5; $i++) {
            DB::table('shops')->insert([
                'address' => "住所1{$i}",
                'shop_name' => "お店{$i}",
                'kakakutai' => "{$i}",
                'keyword' => '居酒屋 寿司',
                'time' => '3',
                'distance' => '2',
                'telephone' => '123-222-222',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null, ]);
        }
        for ($i = 1; $i <= 5; $i++) {
            DB::table('shops')->insert([
                'address' => "住所2{$i}",
                'shop_name' => "お店{$i}",
                'kakakutai' => "{$i}",
                'keyword' => '寿司',
                'time' => '3',
                'distance' => '2',
                'telephone' => '123-222-222',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => null, ]);
        }
    }
}
