<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PageContent;
use App\Models\MenuItem;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch all home-related content
        $content = PageContent::where('key', 'like', 'home_%')->pluck('value', 'key');
        
        $featured_items = MenuItem::where('is_featured', true)->take(4)->get();

        return view('home', [
            // Hero
            'hero_greeting' => $content['home_hero_greeting'] ?? 'Welcome to',
            'hero_brand' => $content['home_hero_brand'] ?? 'Teras Rumah Nenek',
            'hero_subtitle' => $content['home_hero_subtitle'] ?? 'A nostalgic culinary escape...',
            'hero_bg' => $content['home_hero_bg'] ?? 'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?q=80&w=2070&auto=format&fit=crop',
            
            // Features
            'feature_1_title' => $content['home_feature_1_title'] ?? 'Nostalgic Flavors',
            'feature_1_text' => $content['home_feature_1_text'] ?? 'Authentic recipes passed down...',
            'feature_2_title' => $content['home_feature_2_title'] ?? 'Botanical Ambience',
            'feature_2_text' => $content['home_feature_2_text'] ?? 'Dine surrounded by lush greenery...',
            'feature_3_title' => $content['home_3_title'] ?? 'Warm Hospitality',
            'feature_3_text' => $content['home_3_text'] ?? 'Service that feels like family...',

            // Story / About
            'story_title' => $content['home_about_title'] ?? 'More than a restaurant...',
            'story_text' => $content['home_about_text'] ?? 'Inspired by the afternoons...',
            'story_image_1' => $content['home_about_image_1'] ?? 'https://images.unsplash.com/photo-1559339352-11d035aa65de?q=80&w=1974&auto=format&fit=crop',
            'story_image_2' => $content['home_about_image_2'] ?? 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?q=80&w=2070&auto=format&fit=crop',

            // CTA
            'cta_tagline' => $content['home_cta_tagline'] ?? 'Private Events & Weddings',
            'cta_title' => $content['home_cta_title'] ?? 'The Legacy Garden',
            'cta_text' => $content['home_cta_text'] ?? 'Create timeless memories...',
            'cta_bg' => $content['home_cta_bg'] ?? 'https://images.unsplash.com/photo-1519741497674-611481863552?q=80&w=2070&auto=format&fit=crop',

            'featured_items' => $featured_items,
            'gallery_preview' => \App\Models\Gallery::latest()->take(6)->get()
        ]);
    }
}
