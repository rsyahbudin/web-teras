<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PageContent;

class EventController extends Controller
{
    public function index()
    {
        $content = PageContent::pluck('value', 'key');

        return view('legacy-garden', [
            'hero_title' => $content['legacy_hero_title'] ?? 'Where Love Blooms',
            'hero_subtitle' => $content['legacy_hero_subtitle'] ?? 'Naturally',
            'hero_text' => $content['legacy_hero_text'] ?? 'Jakarta’s hidden botanical sanctuary...',
            'hero_bg' => $content['legacy_hero_bg'] ?? 'https://images.unsplash.com/photo-1519225421980-715cb0202128?q=80&w=2070&auto=format&fit=crop',
            'intro_image' => $content['legacy_intro_image'] ?? 'https://images.unsplash.com/photo-1511285560982-1356c11d4606?q=80&w=1974&auto=format&fit=crop',
            'intro_quote' => $content['legacy_intro_quote'] ?? 'The most magical setting...',
            'intro_author' => $content['legacy_intro_author'] ?? 'Sarah & Dimas',
            'intro_title' => $content['legacy_intro_title'] ?? 'A Rustic Sanctuary...',
            'intro_text' => $content['legacy_intro_text'] ?? 'Teras Rumah Nenek began...',
            'features_title' => $content['legacy_features_title'] ?? 'Venue Features',
            'features_subtitle' => $content['legacy_features_subtitle'] ?? 'Everything you need...',
            'inquiry_title' => $content['legacy_inquiry_title'] ?? 'Start Planning...',
            'inquiry_text' => $content['legacy_inquiry_text'] ?? 'Dates fill up quickly...',
            'inquiry_phone' => $content['legacy_inquiry_phone'] ?? '+62 812...',
            'inquiry_email' => $content['legacy_inquiry_email'] ?? 'events@terasrumahnenek.com',
        ]);
    }
}
