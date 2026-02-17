<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GalleryController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/menu', [MenuController::class, 'index'])->name('menu');
Route::get('/legacy-garden', [EventController::class, 'index'])->name('legacy-garden');
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

use App\Livewire\Admin\Menu\Index as MenuIndex;
use App\Livewire\Admin\Events\Index as EventsIndex;
use App\Livewire\Admin\Gallery\Index as GalleryIndex;
use App\Livewire\Admin\Content\Index as ContentIndex;

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/menu', MenuIndex::class)->name('menu');
    Route::get('/events', EventsIndex::class)->name('events');
    Route::get('/gallery', GalleryIndex::class)->name('gallery');
    Route::get('/content', ContentIndex::class)->name('content');
});

require __DIR__.'/settings.php';
