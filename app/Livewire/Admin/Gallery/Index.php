<?php

namespace App\Livewire\Admin\Gallery;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\Gallery;
use App\Models\GalleryCategory;
use Illuminate\Support\Str;

class Index extends Component
{
    use WithFileUploads, WithPagination;

    public $showModal = false;
    public $showCategoryModal = false;

    // Gallery Item Props
    public $galleryId;
    public $title;
    public $gallery_category_id;
    public $image;
    public $newImage;

    // Category Props
    public $categoryId;
    public $categoryName;
    public $categoryDescription;

    protected $rules = [
        'title' => 'required|string|max:255',
        'gallery_category_id' => 'required|exists:gallery_categories,id',
        'newImage' => 'nullable|image|max:2048', // 2MB Max
    ];

    public function render()
    {
        $galleries = Gallery::with('category')->latest()->paginate(12);
        $categories = GalleryCategory::orderBy('position')->get();
        return view('livewire.admin.gallery.index', compact('galleries', 'categories'));
    }

    public function updateCategoryOrder($ids)
    {
        foreach ($ids as $index => $id) {
            GalleryCategory::where('id', $id)->update(['position' => $index]);
        }
    }

    public function create()
    {
        $this->resetForm();
        $this->showModal = true;
    }

    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        $this->galleryId = $gallery->id;
        $this->title = $gallery->title;
        $this->gallery_category_id = $gallery->gallery_category_id;
        $this->image = $gallery->image_path; // Model uses image_path
        
        $this->showModal = true;
    }

    public function save()
    {
        $this->validate();

        $data = [
            'title' => $this->title,
            'gallery_category_id' => $this->gallery_category_id,
        ];

        if ($this->newImage) {
            $path = $this->newImage->store('gallery', 'public');
            $data['image_path'] = '/storage/' . $path; // Model uses image_path
        }

        if ($this->galleryId) {
            Gallery::where('id', $this->galleryId)->update($data);
        } else {
            // Require image on create if not present
            if (!$this->newImage && !$this->image) {
                $this->addError('newImage', 'The image field is required.');
                return;
            }
            Gallery::create($data);
        }

        $this->showModal = false;
        $this->resetForm();
    }

    public function manageCategories()
    {
        $this->resetCategoryForm();
        $this->showCategoryModal = true;
    }

    public function saveCategory()
    {
        $this->validate([
            'categoryName' => 'required|string|max:255|unique:gallery_categories,name,' . $this->categoryId,
            'categoryDescription' => 'nullable|string',
        ]);

        $data = [
            'name' => $this->categoryName,
            'slug' => Str::slug($this->categoryName),
            'description' => $this->categoryDescription,
        ];

        if ($this->categoryId) {
            GalleryCategory::where('id', $this->categoryId)->update($data);
        } else {
            GalleryCategory::create($data);
        }

        $this->resetCategoryForm();
    }

    public function editCategory($id)
    {
        $category = GalleryCategory::findOrFail($id);
        $this->categoryId = $category->id;
        $this->categoryName = $category->name;
        $this->categoryDescription = $category->description;
    }

    public function deleteCategory($id)
    {
        // Check if has items
        if (Gallery::where('gallery_category_id', $id)->exists()) {
            // You might want to handle this gracefully, e.g., showing a flash message
            // or preventing deletion. For now, let's just return.
             $this->addError('categoryName', 'Cannot delete category with associated images.');
             return;
        }

        GalleryCategory::destroy($id);
        $this->resetCategoryForm();
    }

    public function resetCategoryForm()
    {
        $this->reset(['categoryId', 'categoryName', 'categoryDescription']);
    }

    public function delete($id)
    {
        Gallery::destroy($id);
    }

    public function resetForm()
    {
        $this->reset(['galleryId', 'title', 'gallery_category_id', 'image', 'newImage']);
    }
}
