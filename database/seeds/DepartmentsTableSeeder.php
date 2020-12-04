<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET foreign_key_checks = 0');
        DB::table('departments')->truncate();
        DB::statement('SET foreign_key_checks = 1');

        $data = [[
            'id' => 1,
            'name' => 'Phòng nhân sự',
            'created_at' => Carbon::now(),
        ], [
            'id' => 2,
            'name' => 'Phòng kế toán',
            'created_at' => Carbon::now(),
        ], [
            'id' => 3,
            'name' => 'Phòng kỹ thuật',
            'created_at' => Carbon::now(),
        ], [
            'id' => 4,
            'name' => 'Phòng kinh doanh',
            'created_at' => Carbon::now(),
        ]];
        DB::table('departments')->insert($data);
    }
}
