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
            ['key' => 'home_hero_badge', 'value' => 'EST. 1985', 'type' => 'text'],
            ['key' => 'home_hero_bg', 'value' => 'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?q=80&w=2070&auto=format&fit=crop', 'type' => 'image'],
            // Home Features
            ['key' => 'home_feature_1_title', 'value' => 'Nostalgic Flavors', 'type' => 'text'],
            ['key' => 'home_feature_1_text', 'value' => 'Authentic recipes passed down through generations, bringing back memories of home.', 'type' => 'textarea'],
            ['key' => 'home_feature_2_title', 'value' => 'Botanical Ambience', 'type' => 'text'],
            ['key' => 'home_feature_2_text', 'value' => 'Dine surrounded by lush greenery and fresh air in our carefully curated garden.', 'type' => 'textarea'],
            ['key' => 'home_feature_3_title', 'value' => 'Warm Hospitality', 'type' => 'text'],
            ['key' => 'home_feature_3_text', 'value' => 'Service that feels like family. We treat every guest like they are coming home.', 'type' => 'textarea'],

            // Home Story
            ['key' => 'home_about_label', 'value' => 'Our Heritage', 'type' => 'text'],
            ['key' => 'home_about_title', 'value' => 'More than a restaurant, it\'s a return to simplicity.', 'type' => 'text'],
            ['key' => 'home_about_text', 'value' => 'Inspired by the afternoons spent on Grandma\'s terrace, we created a sanctuary where time slows down. Teras Rumah Nenek serves comfort food crafted with love, using ingredients harvested from our own legacy garden.', 'type' => 'textarea'],
            ['key' => 'home_about_image_1', 'value' => 'https://images.unsplash.com/photo-1559339352-11d035aa65de?q=80&w=1974&auto=format&fit=crop', 'type' => 'image'],
            ['key' => 'home_about_image_2', 'value' => 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?q=80&w=2070&auto=format&fit=crop', 'type' => 'image'],

            // Home CTA
            ['key' => 'home_cta_tagline', 'value' => 'Private Events & Weddings', 'type' => 'text'],
            ['key' => 'home_cta_title', 'value' => 'The Legacy Garden', 'type' => 'text'],
            ['key' => 'home_cta_text', 'value' => 'Create timeless memories in our enchanting botanical venue. Perfect for intimate weddings, family gatherings, and celebrations.', 'type' => 'textarea'],
            ['key' => 'home_cta_bg', 'value' => 'https://images.unsplash.com/photo-1519741497674-611481863552?q=80&w=2070&auto=format&fit=crop', 'type' => 'image'],

            // Home Menu & Gallery sections
            ['key' => 'home_menu_label', 'value' => 'From the Kitchen', 'type' => 'text'],
            ['key' => 'home_menu_title', 'value' => 'Signature Dishes', 'type' => 'text'],
            ['key' => 'home_gallery_label', 'value' => 'Follow Our Journey', 'type' => 'text'],
            ['key' => 'home_gallery_title', 'value' => 'Captured Moments', 'type' => 'text'],

            // Home Booking
            ['key' => 'home_booking_title', 'value' => 'Book a Table', 'type' => 'text'],
            ['key' => 'home_booking_text', 'value' => 'Walk-ins are always welcome. However, if you prefer to secure a table in advance, please fill out the form below.', 'type' => 'textarea'],
            ['key' => 'home_booking_image', 'value' => 'https://images.unsplash.com/photo-1542534759-05f6c34a9e63?q=80&w=2070&auto=format&fit=crop', 'type' => 'image'],

            // Home Ramadan Promo
            ['key' => 'home_ramadan_enabled', 'value' => 'no', 'type' => 'text'],
            ['key' => 'home_ramadan_badge', 'value' => 'Ramadan Special', 'type' => 'text'],
            ['key' => 'home_ramadan_title', 'value' => "Booking Buka Puasa\ndi Teras Rumah Nenek", 'type' => 'textarea'],
            ['key' => 'home_ramadan_text', 'value' => 'Nikmati momen berbuka puasa bersama keluarga & sahabat dengan suasana hangat khas rumah nenek. Pesan tempat sekarang untuk pengalaman buka puasa yang tak terlupakan.', 'type' => 'textarea'],
            ['key' => 'home_ramadan_url', 'value' => 'https://www.booking.terasrumahnenek.com', 'type' => 'text'],
            ['key' => 'home_ramadan_note', 'value' => 'Tempat terbatas — segera amankan meja Anda!', 'type' => 'text'],
            ['key' => 'home_ramadan_card_title', 'value' => 'Paket Buka Puasa', 'type' => 'text'],
            ['key' => 'home_ramadan_features', 'value' => "Menu spesial Ramadan\nTakjil & minuman segar\nSuasana nyaman & asri\nTersedia untuk rombongan", 'type' => 'textarea'],

            // Menu Page Hero
            ['key' => 'menu_hero_title', 'value' => 'Authentic Flavors', 'type' => 'text'],
            ['key' => 'menu_hero_subtitle', 'value' => 'of Home', 'type' => 'text'],
            ['key' => 'menu_hero_badge', 'value' => 'Since 1985', 'type' => 'text'],
            ['key' => 'menu_hero_description', 'value' => 'Experience traditional recipes passed down through generations, served in our comforting botanical garden terrace.', 'type' => 'textarea'],
            ['key' => 'menu_hero_bg', 'value' => 'https://images.unsplash.com/photo-1678199342080-b2cb380fa49c?q=80&w=2070&auto=format&fit=crop', 'type' => 'image'],

            // Gallery Page
            ['key' => 'gallery_title', 'value' => 'Gallery', 'type' => 'text'],
            ['key' => 'gallery_subtitle', 'value' => 'Glimpses of our little paradise. From the lush gardens to the savory dishes.', 'type' => 'textarea'],

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
            ['key' => 'legacy_feature_1_title', 'value' => 'Capacity', 'type' => 'text'],
            ['key' => 'legacy_feature_1_text', 'value' => 'Comfortably hosts up to 300 guests standing or 150 seated guests.', 'type' => 'textarea'],
            ['key' => 'legacy_feature_2_title', 'value' => 'Ample Parking', 'type' => 'text'],
            ['key' => 'legacy_feature_2_text', 'value' => 'Dedicated parking area for up to 80 cars with valet service available.', 'type' => 'textarea'],
            ['key' => 'legacy_feature_3_title', 'value' => 'Bridal Suite', 'type' => 'text'],
            ['key' => 'legacy_feature_3_text', 'value' => 'Private, air-conditioned preparation room for the bride and family.', 'type' => 'textarea'],
            ['key' => 'legacy_feature_4_title', 'value' => 'In-House Catering', 'type' => 'text'],
            ['key' => 'legacy_feature_4_text', 'value' => 'Authentic Indonesian & International buffet menus from our kitchen.', 'type' => 'textarea'],
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
                'key' => 'legacy_inquiry_whatsapp', 
                'value' => '6281298765432', 
                'type' => 'text'
            ],
            [
                'key' => 'legacy_inquiry_email', 
                'value' => 'events@terasrumahnenek.com', 
                'type' => 'text'
            ],
            [
                'key' => 'legacy_social_instagram', 
                'value' => 'https://instagram.com/legacygarden', 
                'type' => 'text'
            ],
            [
                'key' => 'legacy_social_tiktok', 
                'value' => 'https://tiktok.com/@legacygarden', 
                'type' => 'text'
            ],
            [
                'key' => 'legacy_social_facebook', 
                'value' => 'https://facebook.com/legacygarden', 
                'type' => 'text'
            ],
            [
                'key' => 'legacy_brochure_link',
                'value' => '',
                'type' => 'text'
            ],
            // Global Contact & Socials
            ['key' => 'google_analytics_id', 'value' => '', 'type' => 'text'],
            ['key' => 'site_footer_tagline', 'value' => 'A sanctuary of nature and taste. Experienced the warmth of home in every bite.', 'type' => 'textarea'],
            ['key' => 'contact_address', 'value' => 'Jl. Pangeran Antasari No. 88, Cipete Selatan, Jakarta Selatan 12410', 'type' => 'textarea'],
            ['key' => 'contact_maps_link', 'value' => 'https://maps.app.goo.gl/8cCxYkC8nBwDc6C36', 'type' => 'text'],
            ['key' => 'contact_phone', 'value' => '+62 21 765 4321', 'type' => 'text'],
            ['key' => 'contact_whatsapp', 'value' => '6281298765432', 'type' => 'text'],
            ['key' => 'contact_email', 'value' => 'hello@terasrumahnenek.com', 'type' => 'text'],
            ['key' => 'contact_hours_weekdays', 'value' => 'Mon - Fri: 10:00 - 22:00', 'type' => 'text'],
            ['key' => 'contact_hours_weekends', 'value' => 'Sat - Sun: 08:00 - 23:00', 'type' => 'text'],
            ['key' => 'social_instagram', 'value' => 'https://instagram.com/terasrumahnenek', 'type' => 'text'],
            ['key' => 'social_tiktok', 'value' => 'https://tiktok.com/@terasrumahnenek', 'type' => 'text'],
            ['key' => 'social_facebook', 'value' => 'https://facebook.com/terasrumahnenek', 'type' => 'text'],
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
