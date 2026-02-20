<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GalleryController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/menu', [MenuController::class, 'index'])->name('menu');
Route::get('/legacy-garden', [EventController::class, 'index'])->name('legacy-garden');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');

use App\Livewire\Admin\Dashboard;

Route::get('dashboard', Dashboard::class)
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Booking & Inquiry Routes
Route::post('/book-table', [App\Http\Controllers\BookingController::class, 'storeReservation'])->name('book.table');
Route::post('/legacy-inquire', [App\Http\Controllers\BookingController::class, 'storeInquiry'])->name('legacy.inquire');

Route::get('/login', function () {
    return redirect('/admin/login');
});

use App\Livewire\Admin\Menu\Index as MenuIndex;
use App\Livewire\Admin\Events\Index as EventsIndex;
use App\Livewire\Admin\Gallery\Index as GalleryIndex;
use App\Livewire\Admin\Content\Index as ContentIndex;

use App\Livewire\Admin\Reservations\Index as ReservationsIndex;
use App\Livewire\Admin\Inquiries\Index as InquiriesIndex;

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/menu', MenuIndex::class)->name('menu');
    Route::get('/events', EventsIndex::class)->name('events');
    Route::get('/gallery', GalleryIndex::class)->name('gallery');
    Route::get('/content', ContentIndex::class)->name('content');
    Route::get('/reservations', ReservationsIndex::class)->name('reservations');
    Route::get('/inquiries', InquiriesIndex::class)->name('inquiries');
});

require __DIR__.'/settings.php';
