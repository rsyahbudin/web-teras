<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PageContent;

class MenuController extends Controller
{
    public function index()
    {
        $content = PageContent::where('key', 'like', 'menu_hero_%')->pluck('value', 'key');
        $categories = \App\Models\MenuCategory::with('items')->get();
        
        return view('menu', [
            'categories' => $categories,
            'hero_title' => $content['menu_hero_title'] ?? 'Authentic Flavors',
            'hero_subtitle' => $content['menu_hero_subtitle'] ?? 'of Home',
            'hero_bg' => $content['menu_hero_bg'] ?? 'https://images.unsplash.com/photo-1678199342080-b2cb380fa49c?q=80&w=2070&auto=format&fit=crop',
        ]);
    }
}
