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
        $categories = GalleryCategory::orderBy('name')->get();

        return view('gallery', compact('galleries', 'categories'));
    }
}
