<?php

namespace Database\Seeders;

use App\Models\BillType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BillTypeSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        $data = [
            [
                'name'=>'Pendaftaran',
                'amount'=>450000
            ],
            [
                'name'=>'Syahriah',
                'amount'=>300000
            ],
            [
                'name'=>'Haflah',
                'amount'=>60000
            ],
            [
                'name'=>'Kalender',
                'amount'=>15000
            ],
        ];
        foreach ($data as $ok) {
            BillType::create($ok);
        }
    }
}
