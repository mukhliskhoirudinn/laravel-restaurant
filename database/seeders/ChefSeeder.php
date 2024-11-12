<?php

namespace Database\Seeders;

use App\Models\Chef;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ChefSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Chef::insert([
            [
                'uuid' => Str::uuid(),
                'name' => 'Chef 1',
                'position' => 'Master Chef',
                'description' => 'Chef 1 Description',
                'insta_link' => 'https://www.instagram.com/chef1/',
                'linked_link' => 'https://www.linkedin.com/in/chef1/'
            ],
            [
                'uuid' => Str::uuid(),
                'name' => 'Chef 2',
                'position' => 'Patissier',
                'description' => 'Chef 2 Description',
                'insta_link' => 'https://www.instagram.com/chef2/',
                'linked_link' => 'https://www.linkedin.com/in/chef2/'
            ],
        ]);
    }
}
