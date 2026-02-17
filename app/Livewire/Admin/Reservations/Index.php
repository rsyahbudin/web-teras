<?php

namespace App\Livewire\Admin\Reservations;

use App\Models\Reservation;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.admin.reservations.index', [
            'reservations' => Reservation::latest()->paginate(10)
        ]);
    }
}
