<?php

namespace Database\Seeders;

use App\Models\PostType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $postTypes = [
            ['name' => 'Program', 'slug' => 'program'],
            ['name' => 'About Us', 'slug' => 'about-us'],
            ['name' => 'Notice', 'slug' => 'notice'],
            ['name' => 'Event', 'slug' => 'event'],
            ['name' => 'Blogs', 'slug' => 'blogs'],
        ];

        PostType::insert($postTypes);

        
    }
}
