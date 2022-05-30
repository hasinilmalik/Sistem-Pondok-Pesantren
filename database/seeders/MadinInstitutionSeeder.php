<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MadinInstitutionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('madin_institutions')->insert([
            [
                'id'=>1,
                'name' =>'Belum diterapkan',
            ],
            [
                'id'=>2,
                'name' =>'Sifir',
            ],
            [
                'id'=>3,
                'name' =>'1 MID',
            ],
            [
                'id'=>4,
                'name' =>'2 MID',
            ],
            [
                'id'=>5,
                'name' =>'3 MID',
            ],
            [
                'id'=>6,
                'name' =>'4 MID',
            ],
            [
                'id'=>7,
                'name' =>'5 MID',
            ],
            [
                'id'=>8,
                'name' =>'6 MID',
            ],
           
            [
                'id'=>9,
                'name' =>'1 MTSD',
            ],
            [
                'id'=>10,
                'name' =>'2 MTSD',
            ],
            [
                'id'=>11,
                'name' =>'3 MTSD',
            ],

        ]);
    }
}
