<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locations')->insert([
            ['id'=> 1, 'name' => 'Hồ Chí Minh', 'slug' => 'Ho-Chi-Minh'],
            ['id'=> 2, 'name' => 'Hà Nội', 'slug' => 'Ha-Noi']
        ]);

        $product_1 = [];
        for($i=1; $i<=5; $i++){
            $product_1[$i] = [
                'id' => $i,
                'name' => 'Máy tính_' . $i,
                'price' => 500000,
                'sold_amount' => 10,
                'location_id' => 1
            ];
        }
        $product_2 = [];
        for($i=6; $i<=10; $i++){
            $product_2[$i] = [
                'id' => $i,
                'name' => 'Laptop_' . $i,
                'price' => 1000000,
                'sold_amount' => 5,
                'location_id' => 2
            ];
        }
        $arrMerge = array_merge($product_1, $product_2);

        DB::table('products')->insert(
            $arrMerge
        );

    }
}
