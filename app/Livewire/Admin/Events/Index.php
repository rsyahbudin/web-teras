<?php

namespace App\Livewire\Admin\Events;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\EventPackage;
use Illuminate\Support\Str;

class Index extends Component
{
    use WithFileUploads, WithPagination;

    public $showModal = false;
    public $packageId;
    public $name;
    public $description;
    public $price;
    public $features = ''; // String for textarea (newline separated)
    public $image;
    public $newImage;
    public $is_featured = true;

    protected $rules = [
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric|min:0',
        'features' => 'nullable|string',
        'newImage' => 'nullable|image|max:1024',
        'is_featured' => 'boolean',
    ];

    public function render()
    {
        $packages = EventPackage::latest()->paginate(10);
        return view('livewire.admin.events.index', compact('packages'));
    }

    public function create()
    {
        $this->resetForm();
        $this->showModal = true;
    }

    public function edit($id)
    {
        $package = EventPackage::findOrFail($id);
        $this->packageId = $package->id;
        $this->name = $package->name;
        $this->description = $package->description;
        $this->price = $package->price;
        // Convert array to newline separated string
        $this->features = is_array($package->features) ? implode("\n", $package->features) : '';
        $this->image = $package->image;
        $this->is_featured = $package->is_featured;
        
        $this->showModal = true;
    }

    public function save()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'description' => $this->description,
            'price' => $this->price,
            // Convert newline separated string to array, filtering empty lines
            'features' => array_values(array_filter(array_map('trim', explode("\n", $this->features)))),
            'is_featured' => $this->is_featured,
        ];

        if ($this->newImage) {
            $path = $this->newImage->store('events', 'public');
            $data['image'] = '/storage/' . $path;
        }

        if ($this->packageId) {
            EventPackage::where('id', $this->packageId)->update($data);
        } else {
            EventPackage::create($data);
        }

        $this->showModal = false;
        $this->resetForm();
    }

    public function delete($id)
    {
        EventPackage::destroy($id);
    }

    public function resetForm()
    {
        $this->reset(['packageId', 'name', 'description', 'price', 'features', 'image', 'newImage', 'is_featured']);
        $this->is_featured = true; // Default to true
    }
}
