<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DormitorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return DB::table('dormitories')->insert([
            [
                'name'=>'A',
                'gender'=>'laki-laki',
                'rooms'=>16,
            ],
            [
                'name'=>'B',
                'gender'=>'laki-laki',
                'rooms'=>13,
            ],
            [
                'name'=>'C',
                'gender'=>'laki-laki',
                'rooms'=>18,
            ],
            [
                'name'=>'D',
                'gender'=>'laki-laki',
                'rooms'=>26,
            ],
            [
                'name'=>'E',
                'gender'=>'laki-laki',
                'rooms'=>13,
            ],
            [
                'name'=>'F',
                'gender'=>'laki-laki',
                'rooms'=>18,
            ],
            [
                'name'=>'G',
                'gender'=>'laki-laki',
                'rooms'=>21,
            ],
            [
                'name'=>'LPBA',
                'gender'=>'laki-laki',
                'rooms'=>4,
            ],
            [
                'name'=>'A',
                'gender'=>'perempuan',
                'rooms'=>8,
            ],
            [
                'name'=>'B',
                'gender'=>'perempuan',
                'rooms'=>4,
            ],
            [
                'name'=>'C',
                'gender'=>'perempuan',
                'rooms'=>5,
            ],
            [
                'name'=>'D',
                'gender'=>'perempuan',
                'rooms'=>7,
            ],
            [
                'name'=>'E',
                'gender'=>'perempuan',
                'rooms'=>4,
            ],
            [
                'name'=>'F',
                'gender'=>'perempuan',
                'rooms'=>6,
            ],
        ]);
    }
}
