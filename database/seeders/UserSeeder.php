<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'name' => 'Owner',
                'email' => 'owner@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password123'), // password
                'role' => 'owner'
            ],
            [
                'name' => 'Operator',
                'email' => 'operator@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('password123'), // password
                'role' => 'operator'
            ],
        ]);
    }
}
