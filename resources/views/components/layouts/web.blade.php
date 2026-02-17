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
<body class="bg-white text-wood-dark font-sans antialiased min-h-screen flex flex-col selection:bg-accent-green selection:text-white">

    <!-- Navigation -->
    <header class="sticky top-0 z-50 w-full bg-cream/90 backdrop-blur-md border-b border-wood/10">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <div class="flex-shrink-0 flex items-center gap-2">
                    <a href="{{ route('home') }}" class="font-serif text-2xl font-bold text-primary tracking-tight">
                        Teras Rumah Nenek
                    </a>
                </div>
                
                <nav class="hidden md:flex space-x-8">
                    <a href="{{ route('home') }}" class="text-secondary hover:text-primary transition-colors font-medium">Home</a>
                    <a href="{{ route('menu') }}" class="text-secondary hover:text-primary transition-colors font-medium">Menu</a>
                    <a href="{{ route('legacy-garden') }}" class="text-secondary hover:text-primary transition-colors font-medium">Legacy Garden</a>
                    <a href="{{ route('gallery') }}" class="text-secondary hover:text-primary transition-colors font-medium">Gallery</a>
                </nav>

                <div class="flex items-center space-x-4">
                     <a href="{{ route('legacy-garden') }}#book" class="hidden md:inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-full shadow-sm text-sm font-medium text-white bg-primary hover:bg-primary-hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-colors">
                        Book Event
                    </a>
                    <!-- Mobile menu button -->
                    <button type="button" class="md:hidden inline-flex items-center justify-center p-2 rounded-md text-secondary hover:text-primary focus:outline-none" aria-controls="mobile-menu" aria-expanded="false">
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
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-cream border-t border-wood/10">
                <a href="{{ route('home') }}" class="block px-3 py-2 rounded-md text-base font-medium text-secondary hover:text-primary hover:bg-beige/50">Home</a>
                <a href="{{ route('menu') }}" class="block px-3 py-2 rounded-md text-base font-medium text-secondary hover:text-primary hover:bg-beige/50">Menu</a>
                <a href="{{ route('legacy-garden') }}" class="block px-3 py-2 rounded-md text-base font-medium text-secondary hover:text-primary hover:bg-beige/50">Legacy Garden</a>
                <a href="{{ route('gallery') }}" class="block px-3 py-2 rounded-md text-base font-medium text-secondary hover:text-primary hover:bg-beige/50">Gallery</a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-primary text-cream py-12 mt-auto">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Brand -->
                <div>
                    <h3 class="font-serif text-2xl font-bold mb-4">Teras Rumah Nenek</h3>
                    <p class="text-cream/80 max-w-xs">
                        A sanctuary of nature and taste. Experienced the warmth of home in every bite.
                    </p>
                </div>
                
                <!-- Quick Links -->
                <div>
                    <h4 class="font-bold text-lg mb-4 text-accent">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="text-cream/80 hover:text-white transition-colors">Home</a></li>
                        <li><a href="{{ route('menu') }}" class="text-cream/80 hover:text-white transition-colors">Menu</a></li>
                        <li><a href="{{ route('legacy-garden') }}" class="text-cream/80 hover:text-white transition-colors">Legacy Garden</a></li>
                        <li><a href="{{ route('gallery') }}" class="text-cream/80 hover:text-white transition-colors">Gallery</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h4 class="font-bold text-lg mb-4 text-accent">Contact Us</h4>
                    <ul class="space-y-2 text-cream/80">
                        <li class="flex items-start gap-2">
                             <svg class="w-5 h-5 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                             <span>{!! $global_contact['contact_address'] ?? 'Jalan Mawar No. 123<br>Jakarta Selatan' !!}</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            <span>{{ $global_contact['contact_phone'] ?? '+62 812 3456 7890' }}</span>
                        </li>
                        <li class="flex items-center gap-2">
                            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            <span>{{ $global_contact['contact_email'] ?? 'info@terasrumahnenek.com' }}</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-cream/20 mt-12 pt-8 text-center text-cream/60 text-sm">
                &copy; {{ date('Y') }} Teras Rumah Nenek. All rights reserved.
            </div>
        </div>
    </footer>

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
