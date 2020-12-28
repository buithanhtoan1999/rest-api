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
                 'product_id'=>1,
                 'order_id'=>1,
                 'count'=>1,
             ],
             [
                 'product_id'=>1,
                 'order_id'=>1,
                 'count'=>1,
             ],
             [
                 'product_id'=>1,
                 'order_id'=>1,
                 'count'=>1,
             ],
             [
                 'product_id'=>1,
                 'order_id'=>1,
                 'count'=>1,
             ],
             [
                 'product_id'=>1,
                 'order_id'=>1,
                 'count'=>1,
             ], [
                 'product_id'=>1,
                 'order_id'=>1,
                 'count'=>1,
             ], [
                 'product_id'=>1,
                 'order_id'=>1,
                 'count'=>1,
             ], [
                 'product_id'=>1,
                 'order_id'=>1,
                 'count'=>1,
             ], [
                 'product_id'=>1,
                 'order_id'=>1,
                 'count'=>1,
             ], [
                 'product_id'=>1,
                 'order_id'=>1,
                 'count'=>1,
             ], [
                 'product_id'=>1,
                 'order_id'=>1,
                 'count'=>1,
             ], [
                 'product_id'=>1,
                 'order_id'=>1,
                 'count'=>1,
             ], [
                 'product_id'=>1,
                 'order_id'=>1,
                 'count'=>1,
             ], [
                 'product_id'=>1,
                 'order_id'=>1,
                 'count'=>1,
             ], [
                 'product_id'=>1,
                 'order_id'=>1,
                 'count'=>1,
             ], [
                 'product_id'=>1,
                 'order_id'=>1,
                 'count'=>1,
             ], [
                 'product_id'=>1,
                 'order_id'=>1,
                 'count'=>1,
             ], [
                 'product_id'=>1,
                 'order_id'=>1,
                 'count'=>1,
             ], [
                 'product_id'=>1,
                 'order_id'=>1,
                 'count'=>1,
             ], [
                 'product_id'=>1,
                 'order_id'=>1,
                 'count'=>1,
             ], [
                 'product_id'=>1,
                 'order_id'=>1,
                 'count'=>1,
             ], [
                 'product_id'=>1,
                 'order_id'=>1,
                 'count'=>1,
             ], [
                 'product_id'=>1,
                 'order_id'=>1,
                 'count'=>1,
             ], [
                 'product_id'=>1,
                 'order_id'=>1,
                 'count'=>1,
             ], [
                 'product_id'=>1,
                 'order_id'=>1,
                 'count'=>1,
             ], [
                 'product_id'=>1,
                 'order_id'=>1,
                 'count'=>1,
             ], [
                 'product_id'=>1,
                 'order_id'=>1,
                 'count'=>1,
             ], [
                 'product_id'=>1,
                 'order_id'=>1,
                 'count'=>1,
             ], [
                 'product_id'=>1,
                 'order_id'=>1,
                 'count'=>1,
             ], [
                 'product_id'=>1,
                 'order_id'=>1,
                 'count'=>1,
             ], [
                 'product_id'=>1,
                 'order_id'=>1,
                 'count'=>1,
             ], [
                 'product_id'=>1,
                 'order_id'=>1,
                 'count'=>1,
             ],
         ];
        DB::table('files')->insert($data);
    }
}
