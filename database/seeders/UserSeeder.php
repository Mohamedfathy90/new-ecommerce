<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { 
        User::create([
            'name' => "Admin",
            'username' => "admin",
            'email' => 'admin@gmail.com',
            'role'  => 'admin',
            'password' => Hash::make('password'),
        ]);
        
        User::create([
            'name' => "Vendor",
            'username' => "vendor",
            'email' => 'vendor@gmail.com',
            'role'  => 'vendor',
            'password' => Hash::make('password'),
        ]);
        
        User::create([
            'name' => "User",
            'username' => "user",
            'email' => 'user@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
