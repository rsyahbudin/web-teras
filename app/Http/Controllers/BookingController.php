<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Inquiry;
use App\Models\PageContent;

class BookingController extends Controller
{
    public function storeReservation(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'guests' => 'required',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
        ]);

        // Add default time since it was removed from frontend
        $validated['time'] = '00:00:00'; // Default value or Handle appropriately
        
        $reservation = Reservation::create($validated);

        // Get WhatsApp Number from Global Settings
        $waNumber = PageContent::where('key', 'contact_whatsapp')->value('value') ?? '6281298765432';

        // Format Message
        $message = "Halo Teras Rumah Nenek, saya ingin reservasi meja:\n\n" .
                   "Nama: {$validated['name']}\n" .
                   "Tanggal: {$validated['date']}\n" .
                   "Jumlah Tamu: {$validated['guests']}\n" .
                   "No HP: {$validated['phone']}\n\n" .
                   "Mohon konfirmasinya. Terima kasih.";

        $url = "https://wa.me/{$waNumber}?text=" . urlencode($message);

        return redirect()->away($url);
    }

    public function storeInquiry(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'event_type' => 'required|string',
            'event_date' => 'required|date',
            'guest_count' => 'required',
            'message' => 'required|string',
        ]);

        $inquiry = Inquiry::create($validated);

        // Get Legacy Garden WhatsApp Number
        $waNumber = PageContent::where('key', 'legacy_inquiry_whatsapp')->value('value') ?? '6281298765432';

        // Format Message
        $message = "Halo Legacy Garden, saya tertarik untuk mengadakan event:\n\n" .
                   "Nama: {$validated['first_name']} {$validated['last_name']}\n" .
                   "Email: {$validated['email']}\n" .
                   "Jenis Event: {$validated['event_type']}\n" .
                   "Tanggal Event: {$validated['event_date']}\n" .
                   "Jumlah Tamu: {$validated['guest_count']}\n" .
                   "Pesan: {$validated['message']}\n\n" .
                   "Mohon info lebih lanjut. Terima kasih.";

        $url = "https://wa.me/{$waNumber}?text=" . urlencode($message);

        return redirect()->away($url);
    }
}
