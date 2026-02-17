<?php

namespace App\Livewire\Admin\Menu;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\MenuCategory;
use App\Models\MenuItem;
use Illuminate\Support\Str;

class Index extends Component
{
    use WithFileUploads, WithPagination;

    // Item State
    public $showItemModal = false;
    public $itemId;
    public $menu_category_id;
    public $name;
    public $description;
    public $price;
    public $image;
    public $newImage;
    public $is_available = true;
    public $is_featured = false;

    // Category State
    public $showCategoryModal = false;
    public $managingCategory = false; // Toggle for category list vs form
    public $categoryId;
    public $categoryName;
    public $categoryDescription;

    protected $rules = [
        'menu_category_id' => 'required|exists:menu_categories,id',
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric|min:0',
        'is_available' => 'boolean',
        'is_featured' => 'boolean',
        'newImage' => 'nullable|image|max:1024', // 1MB Max
    ];

    public function render()
    {
        $items = MenuItem::with('category')->latest()->paginate(10);
        $categories = MenuCategory::all();

        return view('livewire.admin.menu.index', [
            'items' => $items,
            'categories' => $categories,
        ]);
    }

    // --- ITEM ACTIONS ---

    public function createItem()
    {
        $this->resetItemForm();
        $this->showItemModal = true;
    }

    public function editItem($id)
    {
        $item = MenuItem::findOrFail($id);
        $this->itemId = $item->id;
        $this->menu_category_id = $item->menu_category_id;
        $this->name = $item->name;
        $this->description = $item->description;
        $this->price = $item->price;
        $this->image = $item->image;
        $this->is_available = (bool) $item->is_available;
        $this->is_featured = (bool) $item->is_featured;
        
        $this->showItemModal = true;
    }

    public function saveItem()
    {
        $this->validate();

        $data = [
            'menu_category_id' => $this->menu_category_id,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'is_available' => $this->is_available,
            'is_featured' => $this->is_featured,
        ];

        if ($this->newImage) {
            $path = $this->newImage->store('menu-items', 'public');
            $data['image'] = '/storage/' . $path;
        }

        if ($this->itemId) {
            MenuItem::where('id', $this->itemId)->update($data);
        } else {
            MenuItem::create($data);
        }

        $this->showItemModal = false;
        $this->resetItemForm();
    }

    public function deleteItem($id)
    {
        MenuItem::destroy($id);
    }

    public function resetItemForm()
    {
        $this->reset(['itemId', 'menu_category_id', 'name', 'description', 'price', 'image', 'newImage', 'is_available', 'is_featured']);
        $this->is_available = true;
    }

    // --- CATEGORY ACTIONS ---

    public function manageCategories()
    {
        $this->showCategoryModal = true;
        $this->resetCategoryForm();
    }

    public function editCategory($id)
    {
        $category = MenuCategory::findOrFail($id);
        $this->categoryId = $category->id;
        $this->categoryName = $category->name;
        $this->categoryDescription = $category->description;
    }

    public function saveCategory()
    {
        $this->validate([
            'categoryName' => 'required|string|max:255',
            'categoryDescription' => 'nullable|string',
        ]);

        $data = [
            'name' => $this->categoryName,
            'slug' => Str::slug($this->categoryName),
            'description' => $this->categoryDescription,
        ];

        if ($this->categoryId) {
            MenuCategory::where('id', $this->categoryId)->update($data);
        } else {
            MenuCategory::create($data);
        }

        $this->resetCategoryForm();
    }

    public function deleteCategory($id)
    {
        // Optional: Check if category has items before deleting
        if(MenuItem::where('menu_category_id', $id)->exists()) {
            // Check for flash/toast capability, for now just return
            return; 
        }
        MenuCategory::destroy($id);
    }

    public function resetCategoryForm()
    {
        $this->reset(['categoryId', 'categoryName', 'categoryDescription']);
    }
}
