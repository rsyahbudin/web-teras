<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Reservation;
use App\Models\Inquiry;
use Carbon\Carbon;

class Dashboard extends Component
{
    public function render()
    {
        $stats = [
            'reservations' => [
                'total' => Reservation::count(),
                'pending' => Reservation::where('status', 'pending')->count(),
                'today' => Reservation::whereDate('date', Carbon::today())->count(),
            ],
            'inquiries' => [
                'total' => Inquiry::count(),
                'pending' => Inquiry::where('status', 'pending')->count(),
                'recent' => Inquiry::where('created_at', '>=', Carbon::now()->subDays(7))->count(),
            ],
        ];

        return view('livewire.admin.dashboard', [
            'stats' => $stats
        ]);
    }
}
