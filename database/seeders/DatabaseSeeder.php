<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Family;
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
        Role::create(['name' => 'super admin']);
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'user']);
        Role::create(['name' => 'guest']);
        
        // Permission::create(['name' => 'edit articles']);
        $malik = User::create([
            'name'=>'Malik',
            'email'=>'m@m.m',
            'jk'=>'laki-laki',
            'password'=>bcrypt('password'),
        ]);
        $malik->assignRole('super admin');
        $malik->assignRole('admin');
        $userpa = User::create([
            'name'=>'admin_pa',
            'email'=>'secret_pa@bakid.com',
            'jk'=>'laki-laki',
            'password'=>bcrypt('p455w0rd'),
        ]);
        $userpa->assignRole('admin');
        $userpi = User::create([
            'name'=>'admin_pi',
            'email'=>'secret_pi@bakid.com',
            'jk'=>'perempuan',
            'password'=>bcrypt('p455w0rd'),
        ]);
        $userpi->assignRole('admin');

        // membuat dummy data
        $users = Family::factory(3)->create();
        // memberi role dummy data
        $role = Role::findByName('user');
        $role->users()->attach($users);
    }
}
