<?php

use Illuminate\Database\Seeder;

class FileSeeder extends Seeder
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

        $data = [
            [
            'id' => 1,
            'name' => 'Anh1',
            "path"=>"files/ao9.jpg",
            "product_id"=>1
        ],[
            'id' => 2,
            'name' => 'Anh2',
            "path"=>"files/ao10.jpg",
            "product_id"=>2
        ],
            [
                'id' => 3,
                'name' => 'Anh3',
                "path"=>"files/anh3.jpg",
                "product_id"=>3
            ],  [
                'id' => 4,
                'name' => 'Anh4',
                "path"=>"files/anh4.jpg",
                "product_id"=>4
            ],[
                'id' => 5,
                'name' => 'Anh5',
                "path"=>"files/anh5.jpg",
                "product_id"=>5
            ],
            [
                'id' => 6,
                'name' => 'Anh6',
                "path"=>"files/anh6.jpg",
                "product_id"=>6
            ],
            [
                'id' => 7,
                'name' => 'Anh7',
                "path"=>"files/anh44.jpg",
                "product_id"=>7
            ],
            [
                'id' => 8,
                'name' => 'Anh8',
                "path"=>"files/anh8.jpg",
                "product_id"=>8
            ],
            [
                'id' => 9,
                'name' => 'quan1',
                "path"=>"files/quan1.jpg",
                "product_id"=>9
            ],
            [
                'id' => 10,
                'name' => 'quan2',
                "path"=>"files/quan2.jpg",
                "product_id"=>10
            ],
            [
                'id' => 11,
                'name' => 'quan3',
                "path"=>"files/quan3.jpg",
                "product_id"=>11
            ],
            [
                'id' => 12,
                'name' => 'quan4',
                "path"=>"files/quan4.jpg",
                "product_id"=>12
            ],
            [
                'id' => 13,
                'name' => 'quan5',
                "path"=>"files/quan5.jpg",
                "product_id"=>13
            ],
            [
                'id' => 14,
                'name' => 'quan6',
                "path"=>"files/quan6.jpg",
                "product_id"=>14
            ],
            [

                'id' => 15,
                'name' => 'quan7',
                "path"=>"files/quan7.jpg",
                "product_id"=>15
            ],

            [

                'id' => 16,
                'name' => 'quan8',
                "path"=>"files/quan8.jpg",
                "product_id"=>16
            ],
            [

                'id' => 17,
                'name' => 'anh9',
                "path"=>"files/anh9.jpg",
                "product_id"=>17
            ],

            [

                'id' => 18,
                'name' => 'anh11',
                "path"=>"files/anh11.jpg",
                "product_id"=>18
            ],
            [

                'id' => 19,
                'name' => 'anh12',
                "path"=>"files/anh12.jpg",
                "product_id"=>19
            ],
            [

                'id' => 20,
                'name' => 'anh13',
                "path"=>"files/anh13.jpg",
                "product_id"=>20
            ],
            [

                'id' => 21,
                'name' => 'anh14',
                "path"=>"files/anh14.jpg",
                "product_id"=>21
            ],
            [

                'id' => 22,
                'name' => 'anh15',
                "path"=>"files/anh15.jpg",
                "product_id"=>22
            ],
            [

                'id' => 23,
                'name' => 'anh16',
                "path"=>"files/anh16.jpg",
                "product_id"=>23
            ],
            [

                'id' => 24,
                'name' => 'anh17',
                "path"=>"files/anh17.jpg",
                "product_id"=>24
            ],
            [

                'id' => 25,
                'name' => 'anh18',
                "path"=>"files/anh18.jpg",
                "product_id"=>25
            ],
            [

                'id' => 26,
                'name' => 'anh19',
                "path"=>"files/anh19.jpg",
                "product_id"=>26
            ],
            [

                'id' => 27,
                'name' => 'anh20',
                "path"=>"files/anh20.jpg",
                "product_id"=>27
            ],
            [

                'id' => 28,
                'name' => 'anh21',
                "path"=>"files/anh21.jpg",
                "product_id"=>28
            ],
            [

                'id' => 29,
                'name' => 'anh22',
                "path"=>"files/anh22.jpg",
                "product_id"=>29
            ],
            [

                'id' => 30,
                'name' => 'anh23',
                "path"=>"files/anh23.jpg",
                "product_id"=>30
            ],
            [

                'id' => 31,
                'name' => 'anh24',
                "path"=>"files/anh24.jpg",
                "product_id"=>31
            ],
            [

                'id' => 32,
                'name' => 'anh25',
                "path"=>"files/anh25.jpg",
                "product_id"=>32
            ],
            [

                'id' => 33,
                'name' => 'anh26',
                "path"=>"files/anh26.jpg",
                "product_id"=>33
            ],
            [

                'id' => 34,
                'name' => 'anh27',
                "path"=>"files/anh27.jpg",
                "product_id"=>34
            ],
            [

                'id' => 35,
                'name' => 'anh28',
                "path"=>"files/anh28.jpg",
                "product_id"=>35
            ],
            [

                'id' => 36,
                'name' => 'anh29',
                "path"=>"files/anh29.jpg",
                "product_id"=>36
            ],
            [

                'id' => 37,
                'name' => 'anh30',
                "path"=>"files/anh30.jpg",
                "product_id"=>37
            ],
            [

                'id' => 38,
                'name' => 'anh31',
                "path"=>"files/anh31.jpg",
                "product_id"=>38
            ],
            [

                'id' => 39,
                'name' => 'anh32',
                "path"=>"files/anh32.jpg",
                "product_id"=>39
            ],
            [

                'id' => 40,
                'name' => 'anh33',
                "path"=>"files/anh33.jpg",
                "product_id"=>40
            ],
            [

                'id' => 41,
                'name' => 'anh34',
                "path"=>"files/anh34.jpg",
                "product_id"=>16
            ],
            [

                'id' => 42,
                'name' => 'anh35',
                "path"=>"files/anh35.jpg",
                "product_id"=>42
            ],
            [

                'id' => 43,
                'name' => 'anh36',
                "path"=>"files/anh36.jpg",
                "product_id"=>43
            ],

            [

                'id' => 44,
                'name' => 'anh39',
                "path"=>"files/anh39.jpg",
                "product_id"=>44
            ],
            [

                'id' => 45,
                'name' => 'anh40',
                "path"=>"files/anh41.jpg",
                "product_id"=>45
            ],
            [

                'id' => 46,
                'name' => 'anh41',
                "path"=>"files/anh41.jpg",
                "product_id"=>46
            ],
            [

                'id' => 47,
                'name' => 'anh42',
                "path"=>"files/anh42.jpg",
                "product_id"=>47
            ],
            [

                'id' => 48,
                'name' => 'anh43',
                "path"=>"files/anh43.jpg",
                "product_id"=>16
            ],




        ];
        DB::table('files')->insert($data);
    }



}
