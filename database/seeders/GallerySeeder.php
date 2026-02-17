<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gallery;

class GallerySeeder extends Seeder
{
    public function run()
    {
        $images = [
            ['title' => 'Rustic Ambience', 'category' => 'Ambience', 'image_path' => 'https://images.unsplash.com/photo-1559339352-11d035aa65de?q=80&w=1974&auto=format&fit=crop'],
            ['title' => 'Signatue Fried Rice', 'category' => 'Food', 'image_path' => 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?q=80&w=2070&auto=format&fit=crop'],
            ['title' => 'Wedding Setup', 'category' => 'Events', 'image_path' => 'https://images.unsplash.com/photo-1519741497674-611481863552?q=80&w=2070&auto=format&fit=crop'],
            ['title' => 'Afternoon Coffee', 'category' => 'Food', 'image_path' => 'https://images.unsplash.com/photo-1554118811-1e0d58224f24?q=80&w=2047&auto=format&fit=crop'],
            ['title' => 'Lush Greenery', 'category' => 'Ambience', 'image_path' => 'https://images.unsplash.com/photo-1466978913421-dad938661248?q=80&w=2070&auto=format&fit=crop'],
            ['title' => 'Grilled Chicken', 'category' => 'Food', 'image_path' => 'https://images.unsplash.com/photo-1563379926898-05f4575a45d8?q=80&w=2070&auto=format&fit=crop'],
            ['title' => 'Tea Time', 'category' => 'Food', 'image_path' => 'https://images.unsplash.com/photo-1514362545857-3bc16549766b?q=80&w=2070&auto=format&fit=crop'],
            ['title' => 'Evening Lights', 'category' => 'Ambience', 'image_path' => 'https://images.unsplash.com/photo-1582294157582-77298642a8a8?q=80&w=2070&auto=format&fit=crop'],
            ['title' => 'Family Gathering', 'category' => 'Events', 'image_path' => 'https://images.unsplash.com/photo-1511795409834-ef04bbd61622?q=80&w=2069&auto=format&fit=crop'],
            ['title' => 'Garden Details', 'category' => 'Ambience', 'image_path' => 'https://images.unsplash.com/photo-1585320806297-9794b3e4eeae?q=80&w=2032&auto=format&fit=crop'],
            ['title' => 'Fresh Ingredients', 'category' => 'Food', 'image_path' => 'https://images.unsplash.com/photo-1606787366850-de6330128bfc?q=80&w=2070&auto=format&fit=crop'],
            ['title' => 'Romantic Dinner', 'category' => 'Events', 'image_path' => 'https://images.unsplash.com/photo-1519225421980-715cb0202128?q=80&w=2070&auto=format&fit=crop'],
        ];

        foreach ($images as $image) {
            Gallery::firstOrCreate(['title' => $image['title']], $image);
        }
    }
}
