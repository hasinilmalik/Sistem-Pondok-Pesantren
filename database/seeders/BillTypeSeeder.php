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
                'name'=>'pendaftaran',
                'amount'=>450000
            ],
            [
                'name'=>'syahriah',
                'amount'=>300000
            ],
            [
                'name'=>'haflah',
                'amount'=>60000
            ],
            [
                'name'=>'kalender',
                'amount'=>15000
            ],
        ];
        foreach ($data as $ok) {
            BillType::create($ok);
        }
    }
}
