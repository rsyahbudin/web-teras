<x-layouts.web title="Teras Rumah Nenek - Nostalgic Culinary Escape">
    <!-- Hero Section -->
    <section x-data="{ show: false }" x-init="setTimeout(() => show = true, 100)" class="relative flex min-h-[600px] w-full items-center justify-center overflow-hidden bg-wood-dark">
        <div class="absolute inset-0 z-0">
            <img alt="Lush outdoor restaurant garden seating" class="h-full w-full object-cover opacity-60 grayscale-20 sepia-10 transition-transform duration-[20s] ease-linear hover:scale-110" src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?q=80&w=2070&auto=format&fit=crop" />
            <div class="absolute inset-0 bg-gradient-to-t from-wood-dark/95 via-wood-dark/50 to-transparent"></div>
        </div>
        <div class="relative z-10 container mx-auto px-6 text-center"
             x-show="show"
             x-transition:enter="transition ease-out duration-1000"
             x-transition:enter-start="opacity-0 translate-y-12"
             x-transition:enter-end="opacity-100 translate-y-0">
            <span class="mb-4 inline-block rounded-full bg-accent-green/30 px-4 py-1.5 text-sm font-bold text-cream backdrop-blur-sm border border-accent-green/40 shadow-lg">
                EST. 1985
            </span>
            <h1 class="mb-6 text-4xl font-black leading-tight tracking-tight text-cream md:text-6xl lg:text-7xl drop-shadow-xl">
                {{ $hero_greeting }} <br class="hidden md:block"/> <span class="text-accent-sage">{{ $hero_brand }}</span>
            </h1>
            <p class="mx-auto mb-10 max-w-2xl text-lg font-light leading-relaxed text-sand md:text-xl drop-shadow-md">
                {{ $hero_subtitle }}
            </p>
            <!-- <div class="flex flex-col items-center justify-center gap-4 sm:flex-row ">
                <a href="{{ route('menu') }}" class="inline-flex items-center justify-center h-14 min-w-[180px] rounded-full bg-primary hover:bg-primary-dark px-8 text-base font-bold text-white transition-all transform hover:-translate-y-1 hover:shadow-lg shadow-md duration-300">
                    View Menu
                </a>
                <a href="#" class="inline-flex items-center justify-center h-14 min-w-[180px] rounded-full border border-cream/30 bg-white/5 px-8 text-base font-bold text-cream backdrop-blur-md transition-all hover:bg-white/10 hover:border-cream hover:-translate-y-1 shadow-md duration-300">
                    Our Story
                </a>
            </div> -->
        </div>
    </section>

    <!-- Features -->
    <section class="relative z-20 -mt-16 px-6 pb-20">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                <!-- Feature 1 -->
                <div class="group relative flex flex-col gap-4 rounded-2xl bg-white dark:bg-background-dark p-8 shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-transparent hover:border-wood-medium/20">
                    <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-gradient-to-br from-wood-light/20 to-wood-light/5 text-wood-dark dark:text-cream group-hover:from-primary group-hover:to-primary-dark group-hover:text-white transition-all duration-300 shadow-sm">
                        <span class="material-symbols-outlined text-3xl">soup_kitchen</span>
                    </div>
                    <div>
                        <h3 class="mb-3 text-xl font-bold text-wood-dark dark:text-cream tracking-tight">{{ $feature_1_title }}</h3>
                        <p class="text-wood-light dark:text-gray-400 whitespace-pre-line leading-relaxed">{{ $feature_1_text }}</p>
                    </div>
                </div>
                <!-- Feature 2 -->
                <div class="group relative flex flex-col gap-4 rounded-2xl bg-white dark:bg-background-dark p-8 shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-transparent hover:border-wood-medium/20">
                    <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-gradient-to-br from-wood-light/20 to-wood-light/5 text-wood-dark dark:text-cream group-hover:from-accent-green group-hover:to-accent-green/80 group-hover:text-white transition-all duration-300 shadow-sm">
                        <span class="material-symbols-outlined text-3xl">forest</span>
                    </div>
                    <div>
                        <h3 class="mb-3 text-xl font-bold text-wood-dark dark:text-cream tracking-tight">{{ $feature_2_title }}</h3>
                        <p class="text-wood-light dark:text-gray-400 whitespace-pre-line leading-relaxed">{{ $feature_2_text }}</p>
                    </div>
                </div>
                <!-- Feature 3 -->
                <div class="group relative flex flex-col gap-4 rounded-2xl bg-white dark:bg-background-dark p-8 shadow-xl hover:shadow-2xl transition-all duration-300 hover:-translate-y-2 border border-transparent hover:border-wood-medium/20">
                    <div class="flex h-14 w-14 items-center justify-center rounded-xl bg-gradient-to-br from-wood-light/20 to-wood-light/5 text-wood-dark dark:text-cream group-hover:from-primary group-hover:to-primary-dark group-hover:text-white transition-all duration-300 shadow-sm">
                        <span class="material-symbols-outlined text-3xl">volunteer_activism</span>
                    </div>
                    <div>
                        <h3 class="mb-3 text-xl font-bold text-wood-dark dark:text-cream tracking-tight">{{ $feature_3_title }}</h3>
                        <p class="text-wood-light dark:text-gray-400 whitespace-pre-line leading-relaxed">{{ $feature_3_text }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Booking Puasa Section (Temporary) -->
    <section x-data="{ show: false }" x-init="setTimeout(() => show = true, 300)" class="relative py-20 px-6 overflow-hidden">
        <!-- Background gradient -->
        <div class="absolute inset-0 bg-gradient-to-br from-emerald-900 via-emerald-800 to-teal-900"></div>

        <!-- Decorative pattern overlay -->
        <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg width=&quot;60&quot; height=&quot;60&quot; viewBox=&quot;0 0 60 60&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot;%3E%3Cg fill=&quot;none&quot; fill-rule=&quot;evenodd&quot;%3E%3Cg fill=&quot;%23ffffff&quot; fill-opacity=&quot;0.4&quot;%3E%3Cpath d=&quot;M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z&quot;/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>

        <!-- Decorative crescent moon -->
        <div class="absolute top-8 right-8 md:top-12 md:right-16 opacity-20">
            <svg class="w-24 h-24 md:w-32 md:h-32 text-yellow-300" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c1.82 0 3.53-.5 5-1.35-2.99-1.73-5-4.95-5-8.65s2.01-6.92 5-8.65C15.53 2.5 13.82 2 12 2z"/>
            </svg>
        </div>

        <!-- Decorative stars -->
        <div class="absolute top-16 left-12 md:top-10 md:left-24 animate-pulse">
            <svg class="w-4 h-4 md:w-5 md:h-5 text-yellow-300/50" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2l2.09 6.26L20.18 9l-5.09 3.74L16.18 19 12 15.27 7.82 19l1.09-6.26L3.82 9l6.09-.74z"/>
            </svg>
        </div>
        <div class="absolute bottom-20 right-24 animate-pulse" style="animation-delay: 0.5s;">
            <svg class="w-3 h-3 md:w-4 md:h-4 text-yellow-300/40" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2l2.09 6.26L20.18 9l-5.09 3.74L16.18 19 12 15.27 7.82 19l1.09-6.26L3.82 9l6.09-.74z"/>
            </svg>
        </div>
        <div class="absolute top-1/3 left-1/4 animate-pulse" style="animation-delay: 1s;">
            <svg class="w-3 h-3 text-yellow-300/30" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2l2.09 6.26L20.18 9l-5.09 3.74L16.18 19 12 15.27 7.82 19l1.09-6.26L3.82 9l6.09-.74z"/>
            </svg>
        </div>

        <!-- Content -->
        <div class="relative z-10 container mx-auto"
             x-show="show"
             x-transition:enter="transition ease-out duration-700"
             x-transition:enter-start="opacity-0 translate-y-8"
             x-transition:enter-end="opacity-100 translate-y-0">

            <div class="flex flex-col lg:flex-row items-center gap-10 lg:gap-16">
                <!-- Left: Text Content -->
                <div class="lg:w-3/5 text-center lg:text-left">
                    <div class="inline-flex items-center gap-2 mb-4 rounded-full bg-yellow-400/15 px-4 py-1.5 border border-yellow-400/25 backdrop-blur-sm">
                        <span class="material-symbols-outlined text-yellow-300 text-sm">restaurant</span>
                        <span class="text-xs font-bold uppercase tracking-widest text-yellow-200">Ramadan Special</span>
                    </div>

                    <h2 class="text-3xl md:text-4xl lg:text-5xl font-black text-white leading-tight mb-4">
                        Booking <span class="text-yellow-300">Buka Puasa</span>
                        <br class="hidden md:block"/>di Teras Rumah Nenek
                    </h2>

                    <p class="text-emerald-100/80 text-lg leading-relaxed mb-8 max-w-xl mx-auto lg:mx-0">
                        Nikmati momen berbuka puasa bersama keluarga & sahabat dengan suasana hangat khas rumah nenek. Pesan tempat sekarang untuk pengalaman buka puasa yang tak terlupakan.
                    </p>

                    <a href="https://www.booking.terasrumahnenek.com"
                       target="_blank"
                       class="group inline-flex items-center gap-3 bg-yellow-400 hover:bg-yellow-300 text-emerald-900 font-bold px-10 py-4.5 rounded-full shadow-lg shadow-yellow-400/25 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-yellow-400/30 active:scale-95 text-lg">
                        <span class="material-symbols-outlined text-xl">calendar_month</span>
                        <span>Booking Sekarang</span>
                        <span class="material-symbols-outlined text-lg transition-transform duration-300 group-hover:translate-x-1">arrow_forward</span>
                    </a>
                    <p class="mt-4 text-emerald-200/60 text-sm flex items-center gap-1.5 justify-center lg:justify-start">
                        <span class="material-symbols-outlined text-yellow-400/70 text-sm">info</span>
                        Tempat terbatas — segera amankan meja Anda!
                    </p>
                </div>

                <!-- Right: Decorative Card -->
                <div class="lg:w-2/5 w-full max-w-sm mx-auto"
                     x-show="show"
                     x-transition:enter="transition ease-out duration-700 delay-300"
                     x-transition:enter-start="opacity-0 scale-90"
                     x-transition:enter-end="opacity-100 scale-100">
                    <a href="https://www.booking.terasrumahnenek.com" target="_blank" class="block group">
                        <div class="relative bg-white/10 backdrop-blur-md rounded-3xl p-8 border border-white/20 shadow-2xl transition-all duration-500 group-hover:bg-white/15 group-hover:border-yellow-400/30 group-hover:shadow-yellow-400/10 group-hover:-translate-y-1">
                            <!-- Glow effect -->
                            <div class="absolute -inset-1 bg-gradient-to-r from-yellow-400/20 via-emerald-400/10 to-yellow-400/20 rounded-3xl blur-lg transition-opacity duration-500 opacity-60 group-hover:opacity-100"></div>

                            <div class="relative">
                                <!-- Crescent icon -->
                                <div class="flex justify-center mb-6">
                                    <div class="w-20 h-20 rounded-full bg-gradient-to-br from-yellow-300 to-yellow-500 flex items-center justify-center shadow-lg shadow-yellow-400/30 transition-transform duration-500 group-hover:scale-110">
                                        <svg class="w-10 h-10 text-emerald-900" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c1.82 0 3.53-.5 5-1.35-2.99-1.73-5-4.95-5-8.65s2.01-6.92 5-8.65C15.53 2.5 13.82 2 12 2z"/>
                                        </svg>
                                    </div>
                                </div>

                                <h3 class="text-center text-white font-bold text-xl mb-6">Paket Buka Puasa</h3>

                                <ul class="space-y-3 mb-6">
                                    <li class="flex items-center gap-3 text-emerald-100">
                                        <span class="material-symbols-outlined text-yellow-300 text-lg">check_circle</span>
                                        <span class="text-sm">Menu spesial Ramadan</span>
                                    </li>
                                    <li class="flex items-center gap-3 text-emerald-100">
                                        <span class="material-symbols-outlined text-yellow-300 text-lg">check_circle</span>
                                        <span class="text-sm">Takjil & minuman segar</span>
                                    </li>
                                    <li class="flex items-center gap-3 text-emerald-100">
                                        <span class="material-symbols-outlined text-yellow-300 text-lg">check_circle</span>
                                        <span class="text-sm">Suasana nyaman & asri</span>
                                    </li>
                                    <li class="flex items-center gap-3 text-emerald-100">
                                        <span class="material-symbols-outlined text-yellow-300 text-lg">check_circle</span>
                                        <span class="text-sm">Tersedia untuk rombongan</span>
                                    </li>
                                </ul>

                                <!-- Single inline CTA indicator -->
                                <div class="flex items-center justify-center gap-2 text-yellow-300 font-semibold text-sm pt-4 border-t border-white/10 transition-colors duration-300 group-hover:text-yellow-200">
                                    <span>Lihat Detail & Booking</span>
                                    <span class="material-symbols-outlined text-base transition-transform duration-300 group-hover:translate-x-1">arrow_forward</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Heritage / Story -->
    <section class="bg-sand/30 dark:bg-wood-dark/40 py-20 px-6">
        <div class="container mx-auto flex flex-col lg:flex-row items-center gap-12 lg:gap-20">
            <div class="lg:w-1/2 relative">
                <div class="absolute -top-4 -left-4 w-full h-full border-2 border-primary rounded-2xl z-0"></div>
                <img alt="Cozy wooden interior" class="relative z-10 w-full rounded-2xl shadow-2xl aspect-[4/3] object-cover sepia-[0.15]" src="{{ $story_image_1 }}" />
                <div class="absolute -bottom-6 -right-6 z-20 hidden md:block">
                    <img alt="Traditional food detail" class="w-48 h-48 rounded-xl object-cover border-4 border-cream shadow-lg" src="{{ $story_image_2 }}" />
                </div>
            </div>
            <div class="lg:w-1/2 flex flex-col gap-6">
                <div class="flex items-center gap-2 text-primary font-bold uppercase tracking-wider text-sm">
                    <span class="h-px w-8 bg-primary"></span>
                    Our Heritage
                </div>
                <h2 class="text-4xl md:text-5xl font-black text-wood-dark dark:text-cream leading-tight">
                    {!! nl2br(e($story_title)) !!}
                </h2>
                <p class="text-lg text-wood-light dark:text-gray-300 leading-relaxed">
                    {{ $story_text }}
                </p>
                <div class="pt-4">
                    <a href="https://maps.app.goo.gl/8cCxYkC8nBwDc6C36" target="_blank" class="inline-flex items-center gap-2 font-bold text-wood-dark hover:text-primary transition-colors border-b-2 border-primary pb-1">
                        See at Google
                        <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Menu Section -->
    <section class="py-20 px-6">
        <div class="container mx-auto">
            <div class="mb-12 flex items-end justify-between">
                <div>
                    <span class="text-accent-green font-bold tracking-wider uppercase text-sm">From the Kitchen</span>
                    <h2 class="mt-2 text-3xl md:text-4xl font-black text-wood-dark dark:text-cream">Signature Dishes</h2>
                </div>
                <a href="{{ route('menu') }}" class="hidden sm:flex items-center gap-1 font-semibold text-wood-light hover:text-primary transition-colors">
                    View Full Menu <span class="material-symbols-outlined text-sm">arrow_forward</span>
                </a>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @forelse($featured_items as $item)
                    <div class="group relative flex flex-col h-full bg-white dark:bg-background-dark rounded-2xl shadow-lg border border-transparent hover:border-wood-medium/20 transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl overflow-hidden cursor-pointer">
                        <div class="relative aspect-square overflow-hidden">
                            <img src="{{ $item->image ?? 'https://via.placeholder.com/400' }}" alt="{{ $item->name }}" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110" />
                            <div class="absolute bottom-4 right-4 rounded-full bg-white/90 px-4 py-1.5 text-sm font-bold text-wood-dark shadow-md backdrop-blur-sm">
                                Rp {{ number_format($item->price, 0, ',', '.') }}
                            </div>
                        </div>
                        <div class="p-6 flex flex-col flex-grow">
                            <h3 class="mb-2 text-xl font-bold text-wood-dark dark:text-cream group-hover:text-primary transition-colors">{{ $item->name }}</h3>
                            <p class="text-sm text-wood-light dark:text-gray-400 line-clamp-2 leading-relaxed">{{ $item->description }}</p>
                        </div>
                    </div>
                @empty
                    <!-- Placeholder Items -->
                    <div class="group relative flex flex-col h-full bg-white dark:bg-background-dark rounded-2xl shadow-lg border border-transparent hover:border-wood-medium/20 transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl overflow-hidden cursor-pointer">
                        <div class="relative aspect-square overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1600093463592-8e36ae95ef56?q=80&w=2070&auto=format&fit=crop" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110" />
                            <div class="absolute bottom-4 right-4 rounded-full bg-white/90 px-4 py-1.5 text-sm font-bold text-wood-dark shadow-md backdrop-blur-sm">
                                Rp 35.000
                            </div>
                        </div>
                         <div class="p-6 flex flex-col flex-grow">
                            <h3 class="mb-2 text-xl font-bold text-wood-dark dark:text-cream group-hover:text-primary transition-colors">Nasi Goreng Nenek</h3>
                            <p class="text-sm text-wood-light dark:text-gray-400 leading-relaxed">Our famous traditional fried rice with secret family spices.</p>
                        </div>
                    </div>
                     <div class="group relative flex flex-col h-full bg-white dark:bg-background-dark rounded-2xl shadow-lg border border-transparent hover:border-wood-medium/20 transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl overflow-hidden cursor-pointer">
                        <div class="relative aspect-square overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?q=80&w=2080&auto=format&fit=crop" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110" />
                            <div class="absolute bottom-4 right-4 rounded-full bg-white/90 px-4 py-1.5 text-sm font-bold text-wood-dark shadow-md backdrop-blur-sm">
                                Rp 25.000
                            </div>
                        </div>
                         <div class="p-6 flex flex-col flex-grow">
                            <h3 class="mb-2 text-xl font-bold text-wood-dark dark:text-cream group-hover:text-primary transition-colors">Garden Salad</h3>
                            <p class="text-sm text-wood-light dark:text-gray-400 leading-relaxed">Fresh organic vegetables for healthy living.</p>
                        </div>
                    </div>
                     <div class="group relative flex flex-col h-full bg-white dark:bg-background-dark rounded-2xl shadow-lg border border-transparent hover:border-wood-medium/20 transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl overflow-hidden cursor-pointer">
                        <div class="relative aspect-square overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1554118811-1e0d58224f24?q=80&w=2047&auto=format&fit=crop" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110" />
                              <div class="absolute bottom-4 right-4 rounded-full bg-white/90 px-4 py-1.5 text-sm font-bold text-wood-dark shadow-md backdrop-blur-sm">
                                Rp 18.000
                            </div>
                        </div>
                         <div class="p-6 flex flex-col flex-grow">
                            <h3 class="mb-2 text-xl font-bold text-wood-dark dark:text-cream group-hover:text-primary transition-colors">Kopi Tubruk</h3>
                            <p class="text-sm text-wood-light dark:text-gray-400 leading-relaxed">Traditional unfiltered black coffee.</p>
                        </div>
                    </div>
                     <div class="group relative flex flex-col h-full bg-white dark:bg-background-dark rounded-2xl shadow-lg border border-transparent hover:border-wood-medium/20 transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl overflow-hidden cursor-pointer">
                        <div class="relative aspect-square overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1626082927389-6cd097cdc6ec?q=80&w=2070&auto=format&fit=crop" class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110" />
                              <div class="absolute bottom-4 right-4 rounded-full bg-white/90 px-4 py-1.5 text-sm font-bold text-wood-dark shadow-md backdrop-blur-sm">
                                Rp 20.000
                            </div>
                        </div>
                         <div class="p-6 flex flex-col flex-grow">
                            <h3 class="mb-2 text-xl font-bold text-wood-dark dark:text-cream group-hover:text-primary transition-colors">Pisang Goreng</h3>
                            <p class="text-sm text-wood-light dark:text-gray-400 leading-relaxed">Sweet fried banana with cheese.</p>
                        </div>
                    </div>
                @endforelse
            </div>
            
            <div class="mt-8 flex justify-center sm:hidden">
                <a href="{{ route('menu') }}" class="w-full rounded-lg border border-wood-light/30 py-3 text-sm font-bold text-wood-dark dark:text-cream text-center">View Full Menu</a>
            </div>
        </div>
    </section>

    <!-- Legacy Garden CTA -->
    <section class="relative py-24">
        <div class="absolute inset-0 z-0">
            <img alt="Outdoor venue" class="h-full w-full object-cover" src="{{ $cta_bg }}" />
            <div class="absolute inset-0 bg-wood-dark/80 mix-blend-multiply"></div>
        </div>
        <div class="relative z-10 container mx-auto px-6 text-center">
            <span class="mb-4 inline-block rounded-full bg-white/10 px-4 py-1.5 text-xs font-bold uppercase tracking-wider text-accent-sage backdrop-blur-md border border-white/20">
                {{ $cta_tagline }}
            </span>
            <h2 class="mb-6 text-4xl font-black text-cream md:text-5xl">{{ $cta_title }}</h2>
            <p class="mx-auto mb-10 max-w-xl text-lg text-sand">
                {{ $cta_text }}
            </p>
            <a href="{{ route('legacy-garden') }}" class="inline-block rounded-lg bg-cream px-8 py-4 text-base font-bold text-wood-dark transition-all hover:bg-primary hover:text-white hover:scale-105 shadow-xl">
                Explore Venue Packages
            </a>
        </div>
    </section>

    <!-- Gallery Preview -->
    <section class="py-20 bg-cream dark:bg-wood-dark/20 overflow-hidden">
        <div class="container mx-auto px-6 mb-12 text-center">
            <span class="text-accent-green font-bold tracking-wider uppercase text-sm">Follow Our Journey</span>
            <h2 class="mt-2 text-3xl md:text-4xl font-black text-wood-dark dark:text-cream">Captured Moments</h2>
        </div>
        
        <div class="flex flex-col md:flex-row gap-4 px-4 overflow-hidden h-[800px] md:h-80">
            @forelse($gallery_preview as $photo)
                <div class="relative group rounded-xl overflow-hidden flex-1 hover:grow-[2] transition-all duration-500 ease-in-out cursor-pointer min-h-[200px] md:min-h-auto {{ $loop->iteration > 3 ? 'hidden md:block' : '' }}">
                    <img src="{{ $photo->image_path }}" alt="{{ $photo->title }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-black/30 group-hover:bg-black/10 transition-colors"></div>
                    <div class="absolute bottom-4 left-4 opacity-100 md:opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <span class="text-white font-bold text-lg drop-shadow-md">{{ $photo->title }}</span>
                        <span class="block text-cream/80 text-xs uppercase tracking-wider">{{ $photo->category->name }}</span>
                    </div>
                </div>
            @empty
                <div class="text-center w-full py-10 text-wood-light">
                    No photos yet.
                </div>
            @endforelse
        </div>
        
        <div class="text-center mt-12">
            <a href="{{ route('gallery') }}" class="inline-flex items-center gap-2 text-wood-dark dark:text-cream font-bold hover:text-primary transition-colors border-b-2 border-transparent hover:border-primary pb-1">
                View Full Gallery <span class="material-symbols-outlined text-sm">arrow_forward</span>
            </a>
        </div>
    </section>

    <!-- Reservation Form -->
    <section class="bg-background-light dark:bg-background-dark py-20 px-6">
        <div class="container mx-auto">
            <div class="overflow-hidden rounded-3xl bg-wood-dark shadow-2xl border border-wood-light/10">
                <div class="flex flex-col md:flex-row">
                    <div class="flex flex-1 flex-col justify-center p-10 md:p-16">
                        <h2 class="mb-6 text-3xl font-bold text-cream">Book a Table</h2>
                        <p class="mb-8 text-sand">
                            Walk-ins are always welcome. However, if you prefer to secure a table in advance, please fill out the form below.
                        </p>
                        <form action="{{ route('book.table') }}" method="POST" class="flex flex-col gap-5">
                            @csrf
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                                <div class="flex flex-col gap-2">
                                    <label class="text-xs font-bold text-wood-light uppercase tracking-wider">Name</label>
                                    <input name="name" required class="w-full rounded-xl border border-white/10 bg-white/5 p-4 text-cream placeholder-wood-light/50 focus:border-primary focus:ring-2 focus:ring-primary/50 transition-all outline-none" type="text" placeholder="Your Name"/>
                                </div>
                                <div class="flex flex-col gap-2">
                                    <label class="text-xs font-bold text-wood-light uppercase tracking-wider">Phone</label>
                                    <input name="phone" required class="w-full rounded-xl border border-white/10 bg-white/5 p-4 text-cream placeholder-wood-light/50 focus:border-primary focus:ring-2 focus:ring-primary/50 transition-all outline-none" type="tel" placeholder="0812..."/>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                                <div class="flex flex-col gap-2">
                                    <label class="text-xs font-bold text-wood-light uppercase tracking-wider">Date</label>
                                    <input name="date" required class="w-full rounded-xl border border-white/10 bg-white/5 p-4 text-cream placeholder-wood-light/50 focus:border-primary focus:ring-2 focus:ring-primary/50 transition-all outline-none" type="date"/>
                                </div>
                                <div class="flex flex-col gap-2">
                                    <label class="text-xs font-bold text-wood-light uppercase tracking-wider">Guests</label>
                                    <input name="guests" required class="w-full rounded-xl border border-white/10 bg-white/5 p-4 text-cream placeholder-wood-light/50 focus:border-primary focus:ring-2 focus:ring-primary/50 transition-all outline-none" type="number" min="1" placeholder="Number of people"/>
                                </div>
                            </div>
                            <!-- Time field removed as per request -->
                            <button class="mt-6 w-full rounded-xl bg-primary py-4 text-lg font-bold text-white shadow-lg shadow-primary/30 transition-all hover:bg-white hover:text-wood-dark hover:shadow-xl hover:-translate-y-1 active:scale-95" type="submit">
                                Find a Table
                            </button>
                        </form>
                    </div>
                    <div class="relative min-h-[300px] md:min-h-full w-full md:w-1/2">
                        <img alt="Waitstaff serving food" class="absolute h-full w-full object-cover sepia-[0.2]" src="https://images.unsplash.com/photo-1542534759-05f6c34a9e63?q=80&w=2070&auto=format&fit=crop" />
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.web>
