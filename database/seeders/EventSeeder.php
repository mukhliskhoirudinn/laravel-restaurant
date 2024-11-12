<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event::insert([
            [
                'uuid' => Str::uuid(),
                'name' => 'Wedding Party',
                'description' => 'Wedding Party Description',
                'price' => 150000,
                'image' => 'gambar1.png'
            ],
            [
                'uuid' => Str::uuid(),
                'name' => 'Birthday Party',
                'description' => 'Birthday Party Description',
                'price' => 50000,
                'image' => 'gambar1.png'
            ],
        ]);
    }
}
