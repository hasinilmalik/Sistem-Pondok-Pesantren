<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        DB::table('products')->insert(
            [
                'bill_type_id' => 1,
                'name' => 'Administrasi Santri Baru',
                'amount' => 200000,
            ],
            [
                'bill_type_id' => 1,
                'name' => 'Infaq Gedung',
                'amount' => 250000,
            ],
            [
                'bill_type_id' => 5,
                'name' => 'Administrasi Santri Baru',
                'amount' => 200000,
            ],
            [
                'bill_type_id' => 5,
                'name' => 'Infaq Gedung',
                'amount' => 0,
            ],
            
            [
                'bill_type_id' => 6,
                'name' => 'Administrasi Santri Baru',
                'amount' => 200000,
            ],
            [
                'bill_type_id' => 6,
                'name' => 'Infaq Gedung',
                'amount' => 0,
            ],
        );
    }
}
