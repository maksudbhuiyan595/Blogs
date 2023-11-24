<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'id'        => '1',
            'name'      => 'Super-Admin',
            'email'     => 'superadmin@gmail.com',
            'password'  => bcrypt('123456'),
            'role'      =>'1'
        ]);
        User::create([
            'id'        => '2',
            'name'      => 'Admin',
            'email'     => 'admin@gmail.com',
            'password'  => bcrypt('123456'),
            'role'      => '2'
        ]);
        User::create([
            'id'        => '3',
            'name'      => 'user',
            'email'     => 'user@gmail.com',
            'password'  => bcrypt('123456'),
            'role'      =>'0'
        ]);
        
    }
}
