<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET foreign_key_checks = 0');
        DB::table('products')->truncate();
        DB::statement('SET foreign_key_checks = 1');

        $data = [[
            'id' => 1,
            'name' => 'Áo Sơmi Simwood Denim 1295',
            'description' => '',
            'price' => '105.000đ',
            'discount' => '',
            'category_id' => 10,
            'status' => 1,
            "quantity"=>30
        ], [
            'id' => 2,
            'name' => 'Áo sơmi Logic Memory Center 1277',
            'description' => '',
            'price' => '155.000đ',
            'discount' => '',
            'category_id' => 10,
            'status' => 1,
            "quantity"=>30
        ], [
            'id' => 3,
            'name' => 'Áo sơmi Suarobert team 1247',
            'description' => '',
            'price' => '235.000đ',
            'discount' => '18',
            'category_id' => 10,
            'status' => 2,
            "quantity"=>30
        ],[
            'id' => 4,
            'name' => 'Áo sơmi H2T Han mermer 1246',
            'description' => '',
            'price' => '165.000đ',
            'discount' => '18',
            'category_id' => 10,
            'status' => 2,
            "quantity"=>0
        ],
            [
                'id' => 5,
                'name' => 'Áo sơ mi công sở nam SM - 1030',
                'description' => '',
                'price' => '165.000đ',
                'discount' => '',
                'category_id' => 10,
                'status' => 0,
                "quantity"=>30
            ],  [
                'id' => 6,
                'name' => 'Sơ mi công sở trắng SM - 1034',
                'description' => '',
                'price' => '453.000đ',
                'discount' => '50',
                'category_id' => 10,
                'status' => 2,
                "quantity"=>0
            ],[
                'id' => 7,
                'name' => 'Áo sơ mi thu đông SMS0 - 1220',
                'description' => '',
                'price' => '395.000đ',
                'discount' => '',
                'category_id' => 10,
                'status' => 1,
                "quantity"=>30
            ],
            [
                'id' => 8,
                'name' => 'Áo Sơ Mi Dài Tay 0820',
                'description' => '',
                'price' => '395.000đ',
                'discount' => '50',
                'category_id' => 10,
                'status' => 2,
                "quantity"=>30
            ],
            [
                'id' => 9,
                'name' => 'Áo Sơ Mi Dài Tay 0820',
                'description' => '',
                'price' => '395.000đ',
                'discount' => '50',
                'category_id' => 10,
                'status' => 2,
                "quantity"=>30
            ],
            [
                'id' => 10,
                'name' => 'Áo sơ mi Oxford SMT0 - 1094',
                'description' => '',
                'price' => '235.000đ',
                'discount' => '',
                'category_id' => 10,
                'status' => 0,
                'quantity' => 35
            ],
            [
                'id' => 11,
                'name' => 'Áo sơmi H2T Han mermer 1246',
                'description' => '',
                'price' => '195.000đ',
                'discount' => '10',
                'category_id' => 10,
                'status' => 0,
                'quantity' => 35
            ],
            [
                'id' => 12,
                'name' => 'Áo thun in hình ATT0 - 1107',
                'description' => '',
                'price' => '295.000đ',
                'discount' => '',
                'category_id' => 3,
                'status' => 0,
                'quantity' => 35
            ],
            [
                'id' => 13,
                'name' => 'Áo Thun GRAND wash 1208',
                'description' => '',
                'price' => '320.000đ',
                'discount' => '',
                'category_id' => 3,
                'status' => 0,
                'quantity' => 35
            ],
            [
                'id' => 14,
                'name' => 'Áo thun nam ATC0 - 1210',
                'description' => '',
                'price' => '295,000₫',
                'discount' => '',
                'category_id' => 3,
                'status' => 0,
                'quantity' => 35
            ],
            [
                'id' => 15,
                'name' => 'Áo thun nam in hình ATV0 - 1169',
                'description' => '',
                'price' => '250.000đ',
                'discount' => '30',
                'category_id' => 3,
                'status' => 2,
                'quantity' => 35
            ],
            [
                'id' => 16,
                'name' => 'Áo thun nam basic ATN0 - 1122',
                'description' => '',
                'price' => '295.000đ',
                'discount' => '50',
                'category_id' => 3,
                'status' => 2,
                'quantity' => 35
            ],
            [
                'id' => 17,
                'name' => 'Áo Thun MUSLAND stripes 0922',
                'description' => '',
                'price' => '320.000đ',
                'discount' => '50',
                'category_id' => 3,
                'status' => 0,
                'quantity' => 35
            ],

            [
                'id' => 18,
                'name' => 'Áo Thun Musland 0907',
                'description' => '',
                'price' => '230.000đ',
                'discount' => '30',
                'category_id' => 3,
                'status' => 2,
                'quantity' => 35
            ],
            [
                'id' => 19,
                'name' => 'Áo Thun Collective basic 0917',
                'description' => '',
                'price' => '260.000đ',
                'discount' => '',
                'category_id' => 3,
                'status' => 1,
                'quantity' => 35
            ],
            [
                'id' => 20,
                'name' => 'Áo thun kẻ ngang AT - 1072',
                'description' => '',
                'price' => '250.000đ',
                'discount' => '',
                'category_id' => 3,
                'status' => 1,
                'quantity' => 35
            ],
            [
                'id' => 21,
                'name' => 'Áo thun nam ATC0 - 1212',
                'description' => '',
                'price' => '290.000đ',
                'discount' => '',
                'category_id' => 3,
                'status' => 1,
                'quantity' => 35
            ],
            [
                'id' => 22,
                'name' => 'Áo thun nam ATC0 - 1217',
                'description' => '',
                'price' => '200.000đ',
                'discount' => '',
                'category_id' => 3,
                'status' => 1,
                'quantity' => 35
            ],
            [
                'id' => 23,
                'name' => 'Áo thun nam ATC0 - 1214',
                'description' => '',
                'price' => '250.000đ',
                'discount' => '',
                'category_id' => 3,
                'status' => 1,
                'quantity' => 35
            ],
            [
                'id' => 24,
                'name' => 'Áo thun kẻ ngang AT - 1072',
                'description' => '',
                'price' => '250.000đ',
                'discount' => '',
                'category_id' => 3,
                'status' => 1,
                'quantity' => 35
            ],
            [
                'id' => 25,
                'name' => 'Áo Polo H2T basic 0714',
                'description' => '',
                'price' => '520.000đ',
                'discount' => '',
                'category_id' => 2,
                'status' => 0,
                'quantity' => 35
            ],
            [
                'id' => 26,
                'name' => 'Áo Polo Len S.M.E 1236',
                'description' => '',
                'price' => '420.000đ',
                'discount' => '',
                'category_id' => 2,
                'status' => 0,
                'quantity' => 35
            ],
            [
                'id' => 27,
                'name' => 'Áo phông polo nam AP - 0640',
                'description' => '',
                'price' => '260.000đ',
                'discount' => '',
                'category_id' => 2,
                'status' => 0,
                'quantity' => 35
            ],
            [
                'id' => 28,
                'name' => 'Áo phông polo AP - 1038',
                'description' => '',
                'price' => '255.000đ',
                'discount' => '',
                'category_id' => 2,
                'status' => 0,
                'quantity' => 35
            ],
            [
                'id' => 29,
                'name' => 'Áo polo dáng xuông AP - 0825',
                'description' => '',
                'price' => '520.000đ',
                'discount' => '',
                'category_id' => 2,
                'status' => 0,
                'quantity' => 35
            ],
            [
                'id' => 30,
                'name' => 'Áo Polo Originals stripes 1063',
                'description' => '',
                'price' => '520.000đ',
                'discount' => '',
                'category_id' => 2,
                'status' => 0,
                'quantity' => 35
            ],
            [
                'id' => 31,
                'name' => 'Áo phông polo kẻ ngang AP - 1037',
                'description' => '',
                'price' => '240.000đ',
                'discount' => '',
                'category_id' => 2,
                'status' => 0,
                'quantity' => 35
            ],
            [
                'id' => 32,
                'name' => 'Áo phông polo rosie APF0 - 1100',
                'description' => '',
                'price' => '430.000đ',
                'discount' => '',
                'category_id' => 2,
                'status' => 0,
                'quantity' => 35
            ],
            [
                'id' => 33,
                'name' => 'Áo phông polo cao cấp AP - 0712',
                'description' => '',
                'price' => '650.000đ',
                'discount' => '',
                'category_id' => 2,
                'status' => 1,
                'quantity' => 35
            ],
            [
                'id' => 34,
                'name' => 'Áo phông polo AP - 1054',
                'description' => '',
                'price' => '620.000đ',
                'discount' => '',
                'category_id' => 2,
                'status' => 1,
                'quantity' => 35
            ],
            [
                'id' => 35,
                'name' => 'Áo polo nam họa tiết AP - 1027',
                'description' => '',
                'price' => '650.000đ',
                'discount' => '',
                'category_id' => 2,
                'status' => 1,
                'quantity' => 35
            ],
            [
                'id' => 36,
                'name' => 'Áo Polo H2T Custom Fit 0761',
                'description' => '',
                'price' => '235.000đ',
                'discount' => '',
                'category_id' => 2,
                'status' => 1,
                'quantity' => 35
            ],
            [
                'id' => 37,
                'name' => 'Áo phông polo cao cấp AP - 0291',
                'description' => '',
                'price' => '650.000đ',
                'discount' => '30',
                'category_id' => 2,
                'status' => 2,
                'quantity' => 35
            ],
            [
                'id' => 38,
                'name' => 'Áo Polo Lacoste polka dots 0749',
                'description' => '',
                'price' => '520.000đ',
                'discount' => '40',
                'category_id' => 2,
                'status' => 2,
                'quantity' => 35
            ],
            [
                'id' => 39,
                'name' => 'Áo Polo Nam APS19 - 0625',
                'description' => '',
                'price' => '350.000đ',
                'discount' => '50',
                'category_id' => 2,
                'status' => 2,
                'quantity' => 35
            ],
            [
                'id' => 40,
                'name' => 'Áo phông custoom fit 2928',
                'description' => '',
                'price' => '350.000đ',
                'discount' => '',
                'category_id' => 2,
                'status' => 2,
                'quantity' => 35
            ],
            [
                'id' => 41,
                'name' => 'Quần Jeans Simwood Denim 1290',
                'description' => '',
                'price' => '520.000đ',
                'discount' => '',
                'category_id' => 5,
                'status' => 0,
                'quantity' => 35
            ],
            [
                'id' => 42,
                'name' => 'Quần Jeans S.D light blue 1276',
                'description' => '',
                'price' => '520.000đ',
                'discount' => '',
                'category_id' => 5,
                'status' => 0,
                'quantity' => 35
            ],
            [
                'id' => 43,
                'name' => 'Quần Jeans S.D blue ripped 1235',
                'description' => '',
                'price' => '420.000đ',
                'discount' => '',
                'category_id' => 5,
                'status' => 0,
                'quantity' => 35
            ],
            [
                'id' => 44,
                'name' => 'Quần Jeans S.D black ripped 1234',
                'description' => '',
                'price' => '580.000đ',
                'discount' => '',
                'category_id' => 5,
                'status' => 0,
                'quantity' => 35
            ],
            [
                'id' => 45,
                'name' => 'Quần Jeans S.D black ripped 1234',
                'description' => '',
                'price' => '570.000đ',
                'discount' => '',
                'category_id' => 5,
                'status' => 1,
                'quantity' => 35
            ],
            [
                'id' => 46,
                'name' => 'Quần Jeans MIIX Denim Q - 1025',
                'description' => '',
                'price' => '520.000đ',
                'discount' => '',
                'category_id' => 5,
                'status' => 1,
                'quantity' => 35
            ],
            [
                'id' => 47,
                'name' => 'Quần Jeans S.D black ripped 1234',
                'description' => '',
                'price' => '570.000đ',
                'discount' => '',
                'category_id' => 5,
                'status' => 1,
                'quantity' => 35
            ],
            [
                'id' => 48,
                'name' => 'Quần jeans nam Q - 0978',
                'description' => '',
                'price' => '420.000đ',
                'discount' => '',
                'category_id' => 5,
                'status' => 1,
                'quantity' => 35
            ],
            [
                'id' => 49,
                'name' => 'Quần jeans nam đen Q - 1013',
                'description' => '',
                'price' => '430.000đ',
                'discount' => '40',
                'category_id' => 5,
                'status' => 2,
                'quantity' => 35
            ],
            [
                'id' => 50,
                'name' => 'Quần jeans nam rách Q - 0775',
                'description' => '',
                'price' => '440.000đ',
                'discount' => '50',
                'category_id' => 5,
                'status' => 2,
                'quantity' => 35
            ],
            [
                'id' => 51,
                'name' => 'Quần jeans nam Q - 0844',
                'description' => '',
                'price' => '430.000đ',
                'discount' => '40',
                'category_id' => 5,
                'status' => 2,
                'quantity' => 35
            ],
            [
                'id' => 52,
                'name' => 'Quần jeans Nam QJD0 - 1198',
                'description' => '',
                'price' => '430.000đ',
                'discount' => '20',
                'category_id' => 5,
                'status' => 2,
                'quantity' => 35
            ],
            [
                'id' => 53,
                'name' => 'Quần Short MIIX túi hộp 0743',
                'description' => '',
                'price' => '430.000đ',
                'discount' => '',
                'category_id' => 4,
                'status' => 0,
                'quantity' => 35
            ],
            [
                'id' => 54,
                'name' => 'Quần short nam thể thao Q - 1036',
                'description' => '',
                'price' => '230.000đ',
                'discount' => '',
                'category_id' => 4,
                'status' => 0,
                'quantity' => 35
            ],
            [
                'id' => 55,
                'name' => 'Quần short đũi nam QSS0 - 1188',
                'description' => '',
                'price' => '360.000đ',
                'discount' => '',
                'category_id' => 4,
                'status' => 0,
                'quantity' => 35
            ],
            [
                'id' => 56,
                'name' => 'Quần short nam QSY0 - 1108',
                'description' => '',
                'price' => '430.000đ',
                'discount' => '30',
                'category_id' => 4,
                'status' => 2,
                'quantity' => 0
            ],
            [
                'id' => 57,
                'name' => 'Quần jeans nam xanh Q - 1243',
                'description' => '',
                'price' => '430.000đ',
                'discount' => '',
                'category_id' => 4,
                'status' => 1,
                'quantity' => 35
            ],
            [
                'id' => 58,
                'name' => 'Quần jeans nam xanh Q - 1243',
                'description' => '',
                'price' => '230.000đ',
                'discount' => '',
                'category_id' => 4,
                'status' => 1,
                'quantity' => 35
            ],
            [
                'id' => 59,
                'name' => 'Quần jeans cạp chun xanh Q - 0282',
                'description' => '',
                'price' => '240.000đ',
                'discount' => '',
                'category_id' => 4,
                'status' => 1,
                'quantity' => 35
            ],
            [
                'id' => 60,
                'name' => 'Quần short nam QS20 - 2733',
                'description' => '',
                'price' => '230.000đ',
                'discount' => '50',
                'category_id' => 4,
                'status' => 2,
                'quantity' => 35
            ],
            [
                'id' => 61,
                'name' => 'Quần short đùi QS00 - 2838',
                'description' => '',
                'price' => '230.000đ',
                'discount' => '50',
                'category_id' => 4,
                'status' => 2,
                'quantity' => 35
            ],
        ];
        DB::table('products')->insert($data);
    }
}
