<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET foreign_key_checks = 0');
        DB::table('categories')->truncate();
        DB::statement('SET foreign_key_checks = 1');

        $data = [[
            'id' =>1,
           'name' => "ÁO SƠ MI",
            'level' => 'ÁO',
        ], [
            'id' =>2,
            'name' => "ÁO POLO",
            'level' => 'ÁO',
        ], [
            'id' =>3,
            'name' => "ÁO THUN",
            'level' => 'ÁO',
        ],[
            'id' =>4,
            'name' => "QUẦN BÒ",
            'level' => 'QUẦN',
        ],
            [
                'id' =>5,
                'name' => "QUẦN JEANS",
                'level' => 'QUẦN',
            ],  [
                'id' =>6,
                'name' => "QUẦN ÂU",
                'level' => 'QUẦN',
            ],[
                'id' =>7,
                'name' => "GIÀY THỂ THAO",
                'level' => 'GIÀY DÉP',
            ],
            [
                'id' =>8,
                'name' => "GIÀY CAO GÓT",
                'level' => 'GIÀY DÉP',
            ],
            [
                'id' =>9,
                'name' => "THẮT LƯNG",
                'level' => 'PHỤ KIỆN KHÁC',
            ],
            [
                'id' =>10,
                'name' => "VÍ DA",
                'level' => 'PHỤ KIỆN KHÁC',
            ],
            [
                'id' =>11,
                'name' => "TÚI XÁCH",
                'level' => 'PHỤ KIỆN KHÁC',
            ],
        ];
        DB::table('categories')->insert($data);
    }
}
