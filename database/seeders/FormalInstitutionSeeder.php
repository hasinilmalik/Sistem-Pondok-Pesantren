<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FormalInstitution;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FormalInstitutionSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        DB::table('formal_institutions')->insert([
            [
                'name' =>'MI (Madrasah Ibtidaiyah)',
            ],
            [
                'name' =>'MTs 1 (Madrasah Tsanawiyah)',
            ],
            [
                'name' =>'MTs 2 (Madrasah Tsanawiyah)',
            ],
            [
                'name' =>'MA 1 (Madrasah Aliyah 1)',
            ],
            [
                'name' =>'MA 2 (Madrasah Aliyah 2)',
            ],
            [
                'name' =>'STIS (Perguruan Tinggi)',
            ],
        ]);
    }
}
