<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Teras Rumah Nenek' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@100;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>
<body class="flex min-h-screen flex-col bg-stone-100 font-sans text-stone-800 antialiased selection:bg-stone-200 selection:text-stone-900">
        
        <x-social-sidebar />

    <!-- Navigation -->
    <header class="sticky top-0 z-50 w-full border-b border-stone-200 bg-white/95 backdrop-blur supports-[backdrop-filter]:bg-white/60 shadow-sm transition-all duration-300">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex h-20 items-center justify-between">
                <div class="flex-shrink-0 flex items-center gap-2">
                    <a href="{{ route('home') }}" class="font-serif text-2xl font-bold text-primary tracking-tight">
                        Teras Rumah Nenek
                    </a>
                </div>
                
                <nav class="hidden md:flex space-x-8">
                    <a href="{{ route('home') }}" class="text-wood-dark hover:text-primary transition-colors font-medium">Home</a>
                    <a href="{{ route('menu') }}" class="text-wood-dark hover:text-primary transition-colors font-medium">Menu</a>
                    <a href="{{ route('legacy-garden') }}" class="text-wood-dark hover:text-primary transition-colors font-medium">Legacy Garden</a>
                    <a href="{{ route('gallery') }}" class="text-wood-dark hover:text-primary transition-colors font-medium">Gallery</a>
                </nav>

                <div class="flex items-center space-x-4">
                     <a href="{{ route('legacy-garden') }}#book" class="hidden md:inline-flex items-center justify-center px-6 py-2.5 border border-transparent rounded-full shadow-sm text-sm font-bold text-white bg-primary hover:bg-primary-hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-all hover:shadow-md">
                        Book Event
                    </a>
                    <!-- Mobile menu button -->
                    <button type="button" class="md:hidden inline-flex items-center justify-center p-2 rounded-md text-wood-dark hover:text-primary focus:outline-none" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                         <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Mobile Menu (Hidden by default) -->
        <div class="md:hidden hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-white border-t border-wood/10">
                <a href="{{ route('home') }}" class="block px-3 py-2 rounded-md text-base font-medium text-wood-dark hover:text-primary hover:bg-cream/50">Home</a>
                <a href="{{ route('menu') }}" class="block px-3 py-2 rounded-md text-base font-medium text-wood-dark hover:text-primary hover:bg-cream/50">Menu</a>
                <a href="{{ route('legacy-garden') }}" class="block px-3 py-2 rounded-md text-base font-medium text-wood-dark hover:text-primary hover:bg-cream/50">Legacy Garden</a>
                <a href="{{ route('gallery') }}" class="block px-3 py-2 rounded-md text-base font-medium text-wood-dark hover:text-primary hover:bg-cream/50">Gallery</a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow">
        {{ $slot }}
    </main>

    @unless(request()->routeIs('legacy-garden'))
    <!-- Footer -->
    <footer class="bg-primary text-cream pt-16 pb-8 mt-auto">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
                <!-- Brand & Description -->
                <div>
                    <h3 class="font-serif text-2xl font-bold mb-6">Teras Rumah Nenek</h3>
                    <p class="text-cream/80 leading-relaxed mb-6">
                        A sanctuary of nature and taste. Experienced the warmth of home in every bite.
                    </p>
                    <!-- Social Media -->
                    <!-- Social Media -->
                    <div class="flex space-x-4">
                        @php
                            $isLegacy = request()->routeIs('legacy-garden');
                            $instagramKey = $isLegacy ? 'legacy_social_instagram' : 'social_instagram';
                            $tiktokKey = $isLegacy ? 'legacy_social_tiktok' : 'social_tiktok';
                            $facebookKey = $isLegacy ? 'legacy_social_facebook' : 'social_facebook'; // Assuming legacy facebook key exists
                        @endphp

                        @if(!empty($global_contact[$instagramKey]))
                        <a href="{{ $global_contact[$instagramKey] }}" target="_blank" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-white/20 transition-colors text-white">
                            <i class="fa-brands fa-instagram"></i>
                            <span class="sr-only">Instagram</span>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.069-4.85.069-3.204 0-3.584-.012-4.849-.069-3.225-.149-4.771-1.664-4.919-4.919-.058-1.265-.069-1.644-.069-4.849 0-3.204.012-3.584.069-4.849.149-3.225 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                        @endif
                        @if(!empty($global_contact[$tiktokKey]))
                        <a href="{{ $global_contact[$tiktokKey] }}" target="_blank" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-white/20 transition-colors text-white">
                            <span class="sr-only">TikTok</span>
                             <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.63 2.58-4.9 2.09-1.81 5.13-2.01 7.41-.47.11.08.19.2.22.34v4.06c-1.05-.66-2.25-1.06-3.51-.96-1.57.14-2.99 1.25-3.36 2.79-.31 1.32.16 2.73 1.15 3.66.97.92 2.45 1.16 3.69.6 1.14-.52 1.89-1.65 1.91-2.91.02-1.89.01-3.78.01-5.67v-8.23z"/></svg>
                        </a>
                        @endif
                        @if(!empty($global_contact[$facebookKey]))
                        <a href="{{ $global_contact[$facebookKey] }}" target="_blank" class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-white/20 transition-colors text-white">
                            <span class="sr-only">Facebook</span>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                        </a>
                        @endif
                    </div>
                </div>
                
                <!-- Quick Links -->
                <div>
                    <h4 class="font-bold text-lg mb-6 text-accent">Quick Links</h4>
                    <ul class="space-y-3">
                        <li><a href="{{ route('home') }}" class="text-cream/80 hover:text-white transition-colors flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-accent/50"></span>Home</a></li>
                        <li><a href="{{ route('menu') }}" class="text-cream/80 hover:text-white transition-colors flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-accent/50"></span>Menu</a></li>
                        <li><a href="{{ route('legacy-garden') }}" class="text-cream/80 hover:text-white transition-colors flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-accent/50"></span>Legacy Garden</a></li>
                        <li><a href="{{ route('gallery') }}" class="text-cream/80 hover:text-white transition-colors flex items-center gap-2"><span class="w-1.5 h-1.5 rounded-full bg-accent/50"></span>Gallery</a></li>
                    </ul>
                </div>

                <!-- Opening Hours -->
                <div>
                     <h4 class="font-bold text-lg mb-6 text-accent">Opening Hours</h4>
                     <ul class="space-y-4 text-cream/80">
                        <li class="flex items-start gap-3">
                            <span class="material-symbols-outlined text-accent mt-0.5">schedule</span>
                            <div>
                                <span class="block font-medium text-white mb-1">Weekdays</span>
                                <span>{{ $global_contact['contact_hours_weekdays'] ?? '10:00 - 22:00' }}</span>
                            </div>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="material-symbols-outlined text-accent mt-0.5">history_toggle_off</span>
                            <div>
                                <span class="block font-medium text-white mb-1">Weekends</span>
                                <span>{{ $global_contact['contact_hours_weekends'] ?? '08:00 - 23:00' }}</span>
                            </div>
                        </li>
                     </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h4 class="font-bold text-lg mb-6 text-accent">Contact Us</h4>
                    <ul class="space-y-4 text-cream/80">
                        <li class="flex items-start gap-3">
                             <span class="material-symbols-outlined text-accent mt-0.5">location_on</span>
                             <div class="flex flex-col">
                                 <span>{!! $global_contact['contact_address'] ?? 'Jalan Mawar No. 123' !!}</span>
                                 @if(!empty($global_contact['contact_maps_link']))
                                 <a href="{{ $global_contact['contact_maps_link'] }}" target="_blank" class="text-accent text-sm hover:underline mt-1">View on Maps</a>
                                 @endif
                             </div>
                        </li>
                        <li class="flex items-center gap-3">
                           <span class="material-symbols-outlined text-accent">call</span>
                            <span>{{ $global_contact['contact_phone'] ?? '+62 812 3456 7890' }}</span>
                        </li>
                        <li class="flex items-center gap-3">
                             <span class="material-symbols-outlined text-accent">mail</span>
                            <span>{{ $global_contact['contact_email'] ?? 'info@terasrumahnenek.com' }}</span>
                        </li>
                        @if(!empty($global_contact['contact_whatsapp']))
                        <li class="pt-2">
                             <a href="https://wa.me/{{ $global_contact['contact_whatsapp'] }}" target="_blank" class="inline-flex items-center justify-center gap-2 bg-[#25D366] hover:bg-[#20bd5a] text-white px-4 py-2 rounded-full font-bold transition-colors w-full">
                                <span class="material-symbols-outlined">chat</span>
                                Chat WhatsApp
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-cream/20 pt-8 text-center text-cream/60 text-sm">
                &copy; {{ date('Y') }} Teras Rumah Nenek. All rights reserved.
            </div>
        </div>
    </footer>
    @endunless

    <script>
        // Simple mobile menu toggle
        const btn = document.querySelector('button[aria-controls="mobile-menu"]');
        const menu = document.querySelector('#mobile-menu');
        
        btn.addEventListener('click', () => {
            const expanded = btn.getAttribute('aria-expanded') === 'true' || false;
            btn.setAttribute('aria-expanded', !expanded);
            menu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
