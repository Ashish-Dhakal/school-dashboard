<?php

namespace Database\Seeders;

use App\Models\PostType;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'ashish@test.com',
        ]);

        PostType::create([
            'name'=>'Program',
            'slug' =>'program'
        ]);

        PostType::create([
            'name'=>'About Us',
            'slug' =>'about-us'
        ]);

        PostType::create([
            'name'=>'Notice',
            'slug' =>'notice'
        ]);

        PostType::create([
            'name'=>'Event',
            'slug' =>'event'
        ]);

        
        
    }
}
