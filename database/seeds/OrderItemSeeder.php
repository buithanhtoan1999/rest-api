<?php

use Illuminate\Database\Seeder;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
         DB::statement('SET foreign_key_checks = 0');
         DB::table('files')->truncate();
         DB::statement('SET foreign_key_checks = 1');
         $data=[
             [
                 'product_id'=>6,
                 'order_id'=>3,
                 'count'=>2,
             ],
             [
                 'product_id'=>7,
                 'order_id'=>2,
                 'count'=>3,
             ],
             [
                 'product_id'=>10,
                 'order_id'=>2,
                 'count'=>3,
             ],
             [
                 'product_id'=>9,
                 'order_id'=>3,
                 'count'=>2,
             ],
             [
                 'product_id'=>12,
                 'order_id'=>2,
                 'count'=>3,
             ], [
                 'product_id'=>11,
                 'order_id'=>2,
                 'count'=>3,
             ], [
                 'product_id'=>10,
                 'order_id'=>3,
                 'count'=>2,
             ], [
                 'product_id'=>10,
                 'order_id'=>3,
                 'count'=>2,
             ], [
                 'product_id'=>6,
                 'order_id'=>4,
                 'count'=>1,
             ], [
                 'product_id'=>5,
                 'order_id'=>3,
                 'count'=>2,
             ], [
                 'product_id'=>3,
                 'order_id'=>4,
                 'count'=>2,
             ], [
                 'product_id'=>2,
                 'order_id'=>2,
                 'count'=>2,
             ], [
                 'product_id'=>3,
                 'order_id'=>2,
                 'count'=>5,
             ], [
                 'product_id'=>4,
                 'order_id'=>3,
                 'count'=>2,
             ], [
                 'product_id'=>4,
                 'order_id'=>1,
                 'count'=>3,
             ], [
                 'product_id'=>2,
                 'order_id'=>3,
                 'count'=>2,
             ], [
                 'product_id'=>3,
                 'order_id'=>2,
                 'count'=>5,
             ], [
                 'product_id'=>1,
                 'order_id'=>2,
                 'count'=>4,
             ], [
                 'product_id'=>2,
                 'order_id'=>4,
                 'count'=>4,
             ], [
                 'product_id'=>2,
                 'order_id'=>3,
                 'count'=>2,
             ], [
                 'product_id'=>4,
                 'order_id'=>1,
                 'count'=>3,
             ], [
                 'product_id'=>2,
                 'order_id'=>3,
                 'count'=>3,
             ], [
                 'product_id'=>1,
                 'order_id'=>3,
                 'count'=>3,
             ], [
                 'product_id'=>1,
                 'order_id'=>3,
                 'count'=>4,
             ], [
                 'product_id'=>2,
                 'order_id'=>3,
                 'count'=>4,
             ], [
                 'product_id'=>4,
                 'order_id'=>2,
                 'count'=>4,
             ], [
                 'product_id'=>3,
                 'order_id'=>1,
                 'count'=>3,
             ], [
                 'product_id'=>2,
                 'order_id'=>2,
                 'count'=>2,
             ], [
                 'product_id'=>4,
                 'order_id'=>1,
                 'count'=>1,
             ], [
                 'product_id'=>5,
                 'order_id'=>1,
                 'count'=>1,
             ], [
                 'product_id'=>4,
                 'order_id'=>1,
                 'count'=>3,
             ], [
                 'product_id'=>3,
                 'order_id'=>1,
                 'count'=>2,
             ],
         ];
        DB::table('orderItems')->insert($data);
    }
}
