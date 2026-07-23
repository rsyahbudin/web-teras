<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Gallery;
use App\Models\GalleryCategory;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $query = Gallery::with('category')->latest();

        if ($request->has('category') && $request->category !== 'All') {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        $galleries = $query->paginate(12);
        
        // Get all categories for filter
        $categories = GalleryCategory::orderBy('position')->get();

        $content = \App\Models\PageContent::whereIn('key', ['gallery_title', 'gallery_subtitle'])->pluck('value', 'key');

        return view('gallery', [
            'galleries' => $galleries,
            'categories' => $categories,
            'page_title' => $content['gallery_title'] ?? 'Gallery',
            'page_subtitle' => $content['gallery_subtitle'] ?? 'Glimpses of our little paradise. From the lush gardens to the savory dishes.',
        ]);
    }
}
