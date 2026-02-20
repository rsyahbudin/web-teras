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
        'home_hero' => [
            'label' => 'Home: Hero Section',
            'description' => 'The main banner area on the home page.',
            'fields' => [
                ['key' => 'home_hero_greeting', 'label' => 'Greeting Text', 'type' => 'text'],
                ['key' => 'home_hero_brand', 'label' => 'Brand Name', 'type' => 'text'],
                ['key' => 'home_hero_subtitle', 'label' => 'Subtitle', 'type' => 'textarea'],
                ['key' => 'home_hero_bg', 'label' => 'Background Image', 'type' => 'image', 'hint' => 'Recommended: 1920x1080px (High Quality Landscape)'],
            ]
        ],
        'home_about' => [
            'label' => 'Home: Story / Heritage',
            'description' => 'The heritage/story section on the home page.',
            'fields' => [
                ['key' => 'home_about_title', 'label' => 'Title', 'type' => 'text'],
                ['key' => 'home_about_text', 'label' => 'Description', 'type' => 'textarea'],
                ['key' => 'home_about_image_1', 'label' => 'Main Image', 'type' => 'image', 'hint' => 'Recommended: 1200x900px (Aspect Ratio 4:3)'],
                ['key' => 'home_about_image_2', 'label' => 'Small Image', 'type' => 'image', 'hint' => 'Recommended: 800x800px (Square 1:1)'],
            ]
        ],
        'home_features' => [
            'label' => 'Home: Features',
            'description' => 'Three key features displayed on the home page.',
            'fields' => [
                ['key' => 'home_feature_1_title', 'label' => 'Feature 1 Title', 'type' => 'text'],
                ['key' => 'home_feature_1_text', 'label' => 'Feature 1 Text', 'type' => 'textarea'],
                ['key' => 'home_feature_2_title', 'label' => 'Feature 2 Title', 'type' => 'text'],
                ['key' => 'home_feature_2_text', 'label' => 'Feature 2 Text', 'type' => 'textarea'],
                ['key' => 'home_feature_3_title', 'label' => 'Feature 3 Title', 'type' => 'text'],
                ['key' => 'home_feature_3_text', 'label' => 'Feature 3 Text', 'type' => 'textarea'],
            ]
        ],
        'home_cta' => [
            'label' => 'Home: Legacy Garden CTA',
            'description' => 'Call to action section for the venue.',
            'fields' => [
                ['key' => 'home_cta_tagline', 'label' => 'Tagline (Small)', 'type' => 'text'],
                ['key' => 'home_cta_title', 'label' => 'Main Title', 'type' => 'text'],
                ['key' => 'home_cta_text', 'label' => 'Description', 'type' => 'textarea'],
                ['key' => 'home_cta_bg', 'label' => 'Background Image', 'type' => 'image', 'hint' => 'Recommended: 1920x800px (Wide Landscape)'],
            ]
        ],
        'menu_hero' => [
            'label' => 'Menu: Hero Section',
            'description' => 'Banner area on the menu page.',
            'fields' => [
                ['key' => 'menu_hero_title', 'label' => 'Title', 'type' => 'text'],
                ['key' => 'menu_hero_subtitle', 'label' => 'Subtitle', 'type' => 'text'],
                ['key' => 'menu_hero_bg', 'label' => 'Hero Image', 'type' => 'image', 'hint' => 'Recommended: 1920x600px (Wide banner)'],
            ]
        ],
        'legacy_garden_hero' => [
            'label' => 'Legacy Garden: Hero',
            'description' => 'Main banner for the venue page.',
            'fields' => [
                ['key' => 'legacy_hero_title', 'label' => 'Main Title', 'type' => 'text'],
                ['key' => 'legacy_hero_subtitle', 'label' => 'Highlight Word', 'type' => 'text'],
                ['key' => 'legacy_hero_text', 'label' => 'Description', 'type' => 'textarea'],
                ['key' => 'legacy_hero_bg', 'label' => 'Background Image', 'type' => 'image', 'hint' => 'Recommended: 1920x1080px'],
            ]
        ],
        'legacy_garden_intro' => [
            'label' => 'Legacy Garden: Intro',
            'description' => 'Introduction section with the rotating image.',
            'fields' => [
                ['key' => 'legacy_intro_image', 'label' => 'Feature Image', 'type' => 'image', 'hint' => 'Recommended: 1000x1200px (Portrait)'],
                ['key' => 'legacy_intro_quote', 'label' => 'Testimonial Quote', 'type' => 'textarea'],
                ['key' => 'legacy_intro_author', 'label' => 'Quote Author', 'type' => 'text'],
                ['key' => 'legacy_intro_title', 'label' => 'Main Heading', 'type' => 'text'],
                ['key' => 'legacy_intro_text', 'label' => 'Description', 'type' => 'textarea'],
            ]
        ],
        'legacy_garden_features' => [
            'label' => 'Legacy Garden: Features',
            'description' => 'Section listing venue amenities.',
            'fields' => [
                ['key' => 'legacy_features_title', 'label' => 'Section Title', 'type' => 'text', 'default' => 'Venue Features'],
                ['key' => 'legacy_features_subtitle', 'label' => 'Subtitle', 'type' => 'text', 'default' => 'Everything you need to host a perfect celebration.'],
                ['key' => 'legacy_feature_1_title', 'label' => 'Feature 1 Title', 'type' => 'text', 'default' => 'Capacity'],
                ['key' => 'legacy_feature_1_text', 'label' => 'Feature 1 Text', 'type' => 'textarea', 'default' => 'Comfortably hosts up to 300 guests standing or 150 seated guests.'],
                ['key' => 'legacy_feature_2_title', 'label' => 'Feature 2 Title', 'type' => 'text', 'default' => 'Ample Parking'],
                ['key' => 'legacy_feature_2_text', 'label' => 'Feature 2 Text', 'type' => 'textarea', 'default' => 'Dedicated parking area for up to 80 cars with valet service available.'],
                ['key' => 'legacy_feature_3_title', 'label' => 'Feature 3 Title', 'type' => 'text', 'default' => 'Bridal Suite'],
                ['key' => 'legacy_feature_3_text', 'label' => 'Feature 3 Text', 'type' => 'textarea', 'default' => 'Private, air-conditioned preparation room for the bride and family.'],
                ['key' => 'legacy_feature_4_title', 'label' => 'Feature 4 Title', 'type' => 'text', 'default' => 'In-House Catering'],
                ['key' => 'legacy_feature_4_text', 'label' => 'Feature 4 Text', 'type' => 'textarea', 'default' => 'Authentic Indonesian & International buffet menus from our kitchen.'],
            ]
        ],
        'legacy_garden_inquiry' => [
            'label' => 'Legacy Garden: Inquiry',
            'description' => 'Contact section at the bottom.',
            'fields' => [
                ['key' => 'legacy_inquiry_title', 'label' => 'Call to Action Title', 'type' => 'text'],
                ['key' => 'legacy_inquiry_text', 'label' => 'Description', 'type' => 'textarea'],
                ['key' => 'legacy_inquiry_phone', 'label' => 'Phone Number', 'type' => 'text'],
                ['key' => 'legacy_inquiry_whatsapp', 'label' => 'WhatsApp Number', 'type' => 'text'],
                ['key' => 'legacy_inquiry_email', 'label' => 'Email Address', 'type' => 'text'],
                ['key' => 'legacy_social_instagram', 'label' => 'Instagram URL', 'type' => 'text'],
                ['key' => 'legacy_social_tiktok', 'label' => 'TikTok URL', 'type' => 'text'],
                ['key' => 'legacy_social_facebook', 'label' => 'Facebook URL', 'type' => 'text'],
                ['key' => 'legacy_brochure_link', 'label' => 'Brochure Download Link (G-Drive)', 'type' => 'text'],
            ]
        ],
        'global_contact' => [
            'label' => 'Global: Contact & Socials',
            'description' => 'Site-wide contact info, hours, and social media.',
            'fields' => [
                ['key' => 'site_logo', 'label' => 'Site Logo (Navbar & Footer)', 'type' => 'image', 'hint' => 'Recommended: 400x160px (Transparent PNG preferred)'],
                ['key' => 'contact_address', 'label' => 'Address', 'type' => 'textarea'],
                ['key' => 'contact_maps_link', 'label' => 'Google Maps Link', 'type' => 'text'],
                ['key' => 'contact_phone', 'label' => 'Phone Number', 'type' => 'text'],
                ['key' => 'contact_whatsapp', 'label' => 'WhatsApp Number', 'type' => 'text'],
                ['key' => 'contact_email', 'label' => 'Email Address', 'type' => 'text'],
                ['key' => 'contact_hours_weekdays', 'label' => 'Hours (Weekdays)', 'type' => 'text'],
                ['key' => 'contact_hours_weekends', 'label' => 'Hours (Weekends)', 'type' => 'text'],
                ['key' => 'social_instagram', 'label' => 'Instagram URL', 'type' => 'text'],
                ['key' => 'social_tiktok', 'label' => 'TikTok URL', 'type' => 'text'],
                ['key' => 'social_facebook', 'label' => 'Facebook URL', 'type' => 'text'],
            ]
        ],
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
            $this->sectionData[$field['key']] = $content ? $content->value : ($field['default'] ?? '');
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
