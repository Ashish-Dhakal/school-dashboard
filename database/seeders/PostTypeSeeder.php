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
            ['name' => 'Program', 'slug' => 'program', 'is_pinned' => true],
            ['name' => 'About Us', 'slug' => 'about-us','is_pinned' => true],
            ['name' => 'Notice', 'slug' => 'notice', 'is_pinned' => true],
            ['name' => 'Event', 'slug' => 'event', 'is_pinned' => true],
            ['name' => 'Blogs', 'slug' => 'blogs', 'is_pinned' => true],
        ];

        PostType::insert($postTypes);

        
    }
}
