<?php

namespace App\Livewire\Admin\Gallery;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\Gallery;

class Index extends Component
{
    use WithFileUploads, WithPagination;

    public $showModal = false;
    public $galleryId;
    public $title;
    public $category = 'General';
    public $image;
    public $newImage;

    protected $rules = [
        'title' => 'required|string|max:255',
        'category' => 'required|string|max:255',
        'newImage' => 'nullable|image|max:2048', // 2MB Max
    ];

    public function render()
    {
        $galleries = Gallery::latest()->paginate(12);
        return view('livewire.admin.gallery.index', compact('galleries'));
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
        $this->category = $gallery->category;
        $this->image = $gallery->image_path; // Model uses image_path
        
        $this->showModal = true;
    }

    public function save()
    {
        $this->validate();

        $data = [
            'title' => $this->title,
            'category' => $this->category,
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

    public function delete($id)
    {
        Gallery::destroy($id);
    }

    public function resetForm()
    {
        $this->reset(['galleryId', 'title', 'category', 'image', 'newImage']);
        $this->category = 'General';
    }
}
