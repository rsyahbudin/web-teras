<?php

namespace App\Livewire\Admin\Inquiries;

use App\Models\Inquiry;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.admin.inquiries.index', [
            'inquiries' => Inquiry::latest()->paginate(10)
        ]);
    }
}
