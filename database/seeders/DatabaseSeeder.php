<?php

namespace Database\Seeders;

use App\Models\Family;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    //    User::factory(10)->create();
    //    Student::factory(10)->create();
       Family::factory(10)->create();
    }
}