<?php

namespace App\Livewire\Admin\Content;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\PageContent;

class Index extends Component
{
    use WithFileUploads;

    public $activeSection = null;
    public $modalOpen = false; // Separate state for modal visibility
    public $sectionData = []; // Buffer for form inputs
    public $newImages = []; // Buffer for new image uploads

    // Define the structure of the website content
    public $sections = [
        // ... (lines 18-126 unchanged, but I need to be careful with replace)
    ];

    public function render()
    {
        return view('livewire.admin.content.index');
    }

    public function editSection($sectionKey)
    {
        if (!array_key_exists($sectionKey, $this->sections)) return;

        $this->activeSection = $sectionKey;
        $this->modalOpen = true;
        $this->sectionData = [];
        $this->newImages = [];

        // Load existing values for this section's fields
        foreach ($this->sections[$sectionKey]['fields'] as $field) {
            $content = PageContent::where('key', $field['key'])->first();
            $this->sectionData[$field['key']] = $content ? $content->value : '';
        }
    }

    public function saveSection()
    {
        if (!$this->activeSection) return;

        $currentSection = $this->sections[$this->activeSection];

        foreach ($currentSection['fields'] as $field) {
            $key = $field['key'];
            $value = $this->sectionData[$key] ?? '';

            // Handle Image Uploads
            if ($field['type'] === 'image' && isset($this->newImages[$key])) {
                $path = $this->newImages[$key]->store('content', 'public');
                $value = '/storage/' . $path;
                // Update the section data to show the new image immediately
                $this->sectionData[$key] = $value;
            }

            PageContent::updateOrCreate(
                ['key' => $key],
                [
                    'value' => $value,
                    'type' => $field['type']
                ]
            );
        }
        
        // Clear new images after save
        $this->newImages = [];
        
        // Close modal
        $this->modalOpen = false;
        $this->activeSection = null;
    }

    public function cancelEdit()
    {
        $this->modalOpen = false;
        $this->activeSection = null;
        $this->sectionData = [];
        $this->newImages = [];
    }
}
