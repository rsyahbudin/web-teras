<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PageContent;
use App\Models\MenuItem;
use App\Models\MenuCategory;

class ThemeSeeder extends Seeder
{
    public function run()
    {
        // 1. Page Content
        $contents = [
            [
                'key' => 'home_hero_greeting',
                'value' => 'Welcome to',
                'type' => 'text'
            ],
            [
                'key' => 'home_hero_brand',
                'value' => 'Teras Rumah Nenek',
                'type' => 'text'
            ],
            [
                'key' => 'home_hero_subtitle',
                'value' => 'A nostalgic culinary escape in the heart of nature. Experience the warmth of Grandma\'s terrace where rustic charm meets unforgettable flavors.',
                'type' => 'text'
            ],
            // Home Features
            ['key' => 'home_feature_1_title', 'value' => 'Nostalgic Flavors', 'type' => 'text'],
            ['key' => 'home_feature_1_text', 'value' => 'Authentic recipes passed down through generations, bringing back memories of home.', 'type' => 'textarea'],
            ['key' => 'home_feature_2_title', 'value' => 'Botanical Ambience', 'type' => 'text'],
            ['key' => 'home_feature_2_text', 'value' => 'Dine surrounded by lush greenery and fresh air in our carefully curated garden.', 'type' => 'textarea'],
            ['key' => 'home_feature_3_title', 'value' => 'Warm Hospitality', 'type' => 'text'],
            ['key' => 'home_feature_3_text', 'value' => 'Service that feels like family. We treat every guest like they are coming home.', 'type' => 'textarea'],

            // Home Story
            ['key' => 'home_about_title', 'value' => 'More than a restaurant, it\'s a return to simplicity.', 'type' => 'text'],
            ['key' => 'home_about_text', 'value' => 'Inspired by the afternoons spent on Grandma\'s terrace, we created a sanctuary where time slows down. Teras Rumah Nenek serves comfort food crafted with love, using ingredients harvested from our own legacy garden.', 'type' => 'textarea'],
            ['key' => 'home_about_image_1', 'value' => 'https://images.unsplash.com/photo-1559339352-11d035aa65de?q=80&w=1974&auto=format&fit=crop', 'type' => 'image'],
            ['key' => 'home_about_image_2', 'value' => 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?q=80&w=2070&auto=format&fit=crop', 'type' => 'image'],

            // Home CTA
            ['key' => 'home_cta_tagline', 'value' => 'Private Events & Weddings', 'type' => 'text'],
            ['key' => 'home_cta_title', 'value' => 'The Legacy Garden', 'type' => 'text'],
            ['key' => 'home_cta_text', 'value' => 'Create timeless memories in our enchanting botanical venue. Perfect for intimate weddings, family gatherings, and celebrations.', 'type' => 'textarea'],
            ['key' => 'home_cta_bg', 'value' => 'https://images.unsplash.com/photo-1519741497674-611481863552?q=80&w=2070&auto=format&fit=crop', 'type' => 'image'],
            // Legacy Garden Defaults
            [
                'key' => 'legacy_hero_title', 
                'value' => 'Where Love Blooms', 
                'type' => 'text'
            ],
            [
                'key' => 'legacy_hero_subtitle', 
                'value' => 'Naturally', 
                'type' => 'text'
            ],
            [
                'key' => 'legacy_hero_text', 
                'value' => 'Jakarta’s hidden botanical sanctuary for your perfect day. Experience the rustic charm and open-air elegance of our Legacy Garden.', 
                'type' => 'textarea'
            ],
            [
                'key' => 'legacy_hero_bg', 
                'value' => 'https://images.unsplash.com/photo-1519225421980-715cb0202128?q=80&w=2070&auto=format&fit=crop', 
                'type' => 'image'
            ],
            [
                'key' => 'legacy_intro_image',  
                'value' => 'https://images.unsplash.com/photo-1511285560982-1356c11d4606?q=80&w=1974&auto=format&fit=crop', 
                'type' => 'image'
            ],
            [
                'key' => 'legacy_intro_quote', 
                'value' => 'The most magical setting we could have asked for. Truly a hidden gem.', 
                'type' => 'textarea'
            ],
            [
                'key' => 'legacy_intro_author', 
                'value' => 'Sarah & Dimas', 
                'type' => 'text'
            ],
            [
                'key' => 'legacy_intro_title', 
                'value' => 'A Rustic Sanctuary in the Heart of the City', 
                'type' => 'text'
            ],
            [
                'key' => 'legacy_intro_text', 
                'value' => 'Teras Rumah Nenek began as a family home filled with warmth and laughter. Today, we open our doors to share that same intimate atmosphere with you. The Legacy Garden is an extension of our love for nature—a sprawling outdoor space designed to host your most cherished memories.', 
                'type' => 'textarea'
            ],
            [
                'key' => 'legacy_features_title', 
                'value' => 'Venue Features & Amenities', 
                'type' => 'text'
            ],
            [
                'key' => 'legacy_features_subtitle', 
                'value' => 'Everything you need to make your event seamless and unforgettable.', 
                'type' => 'text'
            ],
            [
                'key' => 'legacy_inquiry_title', 
                'value' => 'Start Planning Your Dream Day', 
                'type' => 'text'
            ],
            [
                'key' => 'legacy_inquiry_text', 
                'value' => 'Dates fill up quickly, especially for weekend events. Reach out to our event specialists today to check availability and schedule a private tour of the Legacy Garden.', 
                'type' => 'textarea'
            ],
            [
                'key' => 'legacy_inquiry_phone', 
                'value' => '+62 812-3456-7890', 
                'type' => 'text'
            ],
            [
                'key' => 'legacy_inquiry_email', 
                'value' => 'events@terasrumahnenek.com', 
                'type' => 'text'
            ],
        ];

        foreach ($contents as $content) {
            PageContent::updateOrCreate(['key' => $content['key']], $content);
        }

        // Menu Categories
        $categories = [
            ['name' => 'Main Course', 'slug' => 'main-course'],
            ['name' => 'Snacks', 'slug' => 'snacks'],
            ['name' => 'Drinks', 'slug' => 'drinks'],
        ];

        foreach ($categories as $cat) {
            \App\Models\MenuCategory::firstOrCreate(
                ['slug' => $cat['slug']],
                ['name' => $cat['name']]
            );
        }

        // Menu Items
        try {
            $mainCourse = \App\Models\MenuCategory::where('slug', 'main-course')->firstOrFail();
            
            \App\Models\MenuItem::firstOrCreate([
                'name' => 'Nasi Goreng Kampung',
                'menu_category_id' => $mainCourse->id
            ], [
                'description' => 'Fried rice with traditional spices, chicken, and egg.',
                'price' => 35000,
                'image' => 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?q=80&w=2070&auto=format&fit=crop',
                'is_featured' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

             \App\Models\MenuItem::firstOrCreate([
                'name' => 'Pasta Aglio Olio',
                'menu_category_id' => $mainCourse->id
            ], [
                'description' => 'Spaghetti with garlic, olive oil, and chili flakes.',
                'price' => 40000,
                'image' => 'https://images.unsplash.com/photo-1563379926898-05f4575a45d8?q=80&w=2070&auto=format&fit=crop',
                'is_featured' => true,
                 'created_at' => now(),
                'updated_at' => now(),
            ]);

            $drinks = \App\Models\MenuCategory::where('slug', 'drinks')->firstOrFail();
            
             \App\Models\MenuItem::firstOrCreate([
                'name' => 'Iced Coffee Milk',
                'menu_category_id' => $drinks->id
            ], [
                'description' => 'Signature house blend coffee with milk and palm sugar.',
                'price' => 25000,
                'image' => 'https://images.unsplash.com/photo-1600093463592-8e36ae95ef56?q=80&w=2070&auto=format&fit=crop',
                'is_featured' => true,
                 'created_at' => now(),
                'updated_at' => now(),
            ]);
        } catch (\Exception $e) {
            $this->command->error("Failed to seed menu items: " . $e->getMessage());
        }
        // 2. Menu Categories & Items
        $mainCourse = MenuCategory::firstOrCreate(
            ['slug' => 'main-course'],
            ['name' => 'Main Course', 'description' => 'Hearty meals']
        );
        $beverages = MenuCategory::firstOrCreate(
            ['slug' => 'beverages'],
            ['name' => 'Beverages', 'description' => 'Refreshing drinks']
        );
        $desserts = MenuCategory::firstOrCreate(
            ['slug' => 'desserts'],
            ['name' => 'Desserts', 'description' => 'Sweet treats']
        );

        $items = [
            [
                'name' => 'Nasi Goreng Nenek',
                'description' => 'Our famous traditional fried rice with secret family spices and satay.',
                'price' => 35000,
                'menu_category_id' => $mainCourse->id,
                'image' => 'https://images.unsplash.com/photo-1600093463592-8e36ae95ef56?q=80&w=2070&auto=format&fit=crop',
                'is_available' => true,
            ],
            [
                'name' => 'Ayam Bakar Madu',
                'description' => 'Grilled free-range chicken glazed with organic wild honey and fresh herbs.',
                'price' => 45000,
                'menu_category_id' => $mainCourse->id,
                'image' => 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?q=80&w=2080&auto=format&fit=crop', // Replaced with valid image
                'is_available' => true,
            ],
            [
                'name' => 'Es Teh Manis Sereh',
                'description' => 'Refreshing iced tea infused with fresh lemongrass from our garden.',
                'price' => 15000,
                'menu_category_id' => $beverages->id,
                'image' => 'https://images.unsplash.com/photo-1554118811-1e0d58224f24?q=80&w=2047&auto=format&fit=crop',
                'is_available' => true,
            ],
            [
                'name' => 'Klepon Lumer',
                'description' => 'Sweet rice balls filled with liquid palm sugar and coated in coconut.',
                'price' => 12000,
                'menu_category_id' => $desserts->id,
                'image' => 'https://images.unsplash.com/photo-1511795409834-ef04bbd61622?q=80&w=2069&auto=format&fit=crop', // Placeholder for klepon
                'is_available' => true,
            ],
        ];

        foreach ($items as $item) {
            MenuItem::updateOrCreate(['name' => $item['name']], $item);
        }
    }
}
