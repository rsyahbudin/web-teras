<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Gallery;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $query = Gallery::latest();

        if ($request->has('category') && $request->category !== 'All') {
            $query->where('category', $request->category);
        }

        $galleries = $query->paginate(12);
        
        // Get unique categories for the filter
        $categories = Gallery::select('category')->distinct()->pluck('category');

        return view('gallery', compact('galleries', 'categories'));
    }
}
