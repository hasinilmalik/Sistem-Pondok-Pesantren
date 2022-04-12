<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Family;
use App\Models\FormalInstitution;
use App\Models\MadinInstitution;
use App\Models\Student;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(BillTypeSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(FormalInstitutionSeeder::class);
        $this->call(MadinInstitutionSeeder::class);
    }
}
