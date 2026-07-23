<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EventPackage;

class EventPackageSeeder extends Seeder
{
    public function run()
    {
        $packages = [
            [
                'name' => 'Intimate Garden',
                'slug' => 'intimate-garden',
                'description' => 'Perfect for small gatherings and intimate celebrations.',
                'price' => 15000000,
                'features' => ['Up to 50 guests', 'Garden setup', 'Basic sound system', '4-hour venue access'],
                'image' => 'https://images.unsplash.com/photo-1519225421980-715cb0202128?q=80&w=2070&auto=format&fit=crop',
                'is_featured' => true,
            ],
            [
                'name' => 'Classic Wedding',
                'slug' => 'classic-wedding',
                'description' => 'Our most popular package for a complete wedding celebration.',
                'price' => 35000000,
                'features' => ['Up to 150 guests', 'Full garden decoration', 'Bridal suite access', 'In-house catering options', 'Dedicated event coordinator'],
                'image' => 'https://images.unsplash.com/photo-1519741497674-611481863552?q=80&w=2070&auto=format&fit=crop',
                'is_featured' => true,
            ],
            [
                'name' => 'Grand Celebration',
                'slug' => 'grand-celebration',
                'description' => 'The ultimate experience for large-scale events and receptions.',
                'price' => null,
                'features' => ['Up to 300 guests', 'Premium decoration', 'Full catering package', 'Valet parking', 'Custom event planning'],
                'image' => 'https://images.unsplash.com/photo-1511795409834-ef04bbd61622?q=80&w=2069&auto=format&fit=crop',
                'is_featured' => true,
            ],
        ];

        foreach ($packages as $package) {
            EventPackage::updateOrCreate(['slug' => $package['slug']], $package);
        }
    }
}
