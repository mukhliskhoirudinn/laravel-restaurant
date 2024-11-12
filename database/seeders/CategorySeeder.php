<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::insert([
            [
                'uuid' => Str::uuid(),
                'title' => 'Starters',
                'slug' => 'starters'
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Breakfast',
                'slug' => 'breakfast'
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Lunch',
                'slug' => 'lunch'
            ],
            [
                'uuid' => Str::uuid(),
                'title' => 'Dinner',
                'slug' => 'dinner'
            ],
        ]);
    }
}
