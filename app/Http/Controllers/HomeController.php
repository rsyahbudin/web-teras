<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PageContent;
use App\Models\MenuItem;

class HomeController extends Controller
{
    public function index()
    {
        $content = PageContent::where('key', 'like', 'home_%')->pluck('value', 'key');

        $featured_items = MenuItem::where('is_featured', true)
            ->where('is_available', true)
            ->take(4)
            ->get();

        return view('home', [
            // Hero
            'hero_greeting' => $content['home_hero_greeting'] ?? 'Welcome to',
            'hero_brand' => $content['home_hero_brand'] ?? 'Teras Rumah Nenek',
            'hero_subtitle' => $content['home_hero_subtitle'] ?? 'A nostalgic culinary escape...',
            'hero_bg' => $content['home_hero_bg'] ?? 'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?q=80&w=2070&auto=format&fit=crop',
            'hero_badge' => $content['home_hero_badge'] ?? 'EST. 1985',

            // Features
            'feature_1_title' => $content['home_feature_1_title'] ?? 'Nostalgic Flavors',
            'feature_1_text' => $content['home_feature_1_text'] ?? 'Authentic recipes passed down...',
            'feature_2_title' => $content['home_feature_2_title'] ?? 'Botanical Ambience',
            'feature_2_text' => $content['home_feature_2_text'] ?? 'Dine surrounded by lush greenery...',
            'feature_3_title' => $content['home_feature_3_title'] ?? 'Warm Hospitality',
            'feature_3_text' => $content['home_feature_3_text'] ?? 'Service that feels like family...',

            // Ramadan promo
            'ramadan_enabled' => ($content['home_ramadan_enabled'] ?? 'no') === 'yes',
            'ramadan_badge' => $content['home_ramadan_badge'] ?? 'Ramadan Special',
            'ramadan_title' => $content['home_ramadan_title'] ?? 'Booking Buka Puasa di Teras Rumah Nenek',
            'ramadan_text' => $content['home_ramadan_text'] ?? 'Nikmati momen berbuka puasa bersama keluarga & sahabat dengan suasana hangat khas rumah nenek. Pesan tempat sekarang untuk pengalaman buka puasa yang tak terlupakan.',
            'ramadan_url' => $content['home_ramadan_url'] ?? 'https://www.booking.terasrumahnenek.com',
            'ramadan_note' => $content['home_ramadan_note'] ?? 'Tempat terbatas — segera amankan meja Anda!',
            'ramadan_card_title' => $content['home_ramadan_card_title'] ?? 'Paket Buka Puasa',
            'ramadan_features' => array_filter(array_map('trim', explode("\n", $content['home_ramadan_features'] ?? "Menu spesial Ramadan\nTakjil & minuman segar\nSuasana nyaman & asri\nTersedia untuk rombongan"))),

            // Story / About
            'story_label' => $content['home_about_label'] ?? 'Our Heritage',
            'story_title' => $content['home_about_title'] ?? 'More than a restaurant...',
            'story_text' => $content['home_about_text'] ?? 'Inspired by the afternoons...',
            'story_image_1' => $content['home_about_image_1'] ?? 'https://images.unsplash.com/photo-1559339352-11d035aa65de?q=80&w=1974&auto=format&fit=crop',
            'story_image_2' => $content['home_about_image_2'] ?? 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?q=80&w=2070&auto=format&fit=crop',

            // Menu section
            'menu_label' => $content['home_menu_label'] ?? 'From the Kitchen',
            'menu_title' => $content['home_menu_title'] ?? 'Signature Dishes',

            // CTA
            'cta_tagline' => $content['home_cta_tagline'] ?? 'Private Events & Weddings',
            'cta_title' => $content['home_cta_title'] ?? 'The Legacy Garden',
            'cta_text' => $content['home_cta_text'] ?? 'Create timeless memories...',
            'cta_bg' => $content['home_cta_bg'] ?? 'https://images.unsplash.com/photo-1519741497674-611481863552?q=80&w=2070&auto=format&fit=crop',

            // Gallery section
            'gallery_label' => $content['home_gallery_label'] ?? 'Follow Our Journey',
            'gallery_title' => $content['home_gallery_title'] ?? 'Captured Moments',

            // Booking section
            'booking_title' => $content['home_booking_title'] ?? 'Book a Table',
            'booking_text' => $content['home_booking_text'] ?? 'Walk-ins are always welcome. However, if you prefer to secure a table in advance, please fill out the form below.',
            'booking_image' => $content['home_booking_image'] ?? 'https://images.unsplash.com/photo-1542534759-05f6c34a9e63?q=80&w=2070&auto=format&fit=crop',

            'featured_items' => $featured_items,
            'gallery_preview' => \App\Models\Gallery::with('category')->latest()->take(6)->get(),
        ]);
    }
}
