<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET foreign_key_checks = 0');
        DB::table('users')->truncate();
        DB::statement('SET foreign_key_checks = 1');

        $data = [[
            'id' => 1,
            'name' => 'Bùi Thanh Toan',
            'email' => 'toanbt@gmail.com',
            'password' => Hash::make('123456'),
            'position' => 2,
            'department_id' => null,
            'phone' => '0963545568',
            'gender' => 'Nam',
            'address' => 'hn',
            'created_at' => Carbon::now(),
        ],
            [
                'id' => 2,
                'name' => 'Nguyen Van Hieu ',
                'email' => 'hieunv@gmail.com',
                'password' => Hash::make('123456'),
                'position' => 1,
                'department_id' => null,
                'phone' => '033030068',
                'gender' => 'Nam',
                'address' => 'hn',
                'created_at' => Carbon::now(),
            ],
            [
                'id' => 3,
                'name' => 'Bùi Thanh T',
                'email' => 'toanbt17384@gmail.com',
                'password' => Hash::make('123456'),
                'position' => 0,
                'department_id' => null,
                'phone' => '083838388',
                'gender' => 'Nam',
                'address' => 'hn',
                'created_at' => Carbon::now(),
            ]];
        DB::table('users')->insert($data);
    }
}
