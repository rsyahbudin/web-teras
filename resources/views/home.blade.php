<x-layouts.web title="Teras Rumah Nenek - Nostalgic Culinary Escape">
    <!-- Hero Section -->
    <section class="relative flex min-h-[600px] w-full items-center justify-center overflow-hidden bg-wood-dark">
        <div class="absolute inset-0 z-0">
            <img alt="Lush outdoor restaurant garden seating" class="h-full w-full object-cover opacity-60 grayscale-20 sepia-10" src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?q=80&w=2070&auto=format&fit=crop" />
            <div class="absolute inset-0 bg-linear-to-t from-wood-dark/95 via-wood-dark/50 to-transparent"></div>
        </div>
        <div class="relative z-10 container mx-auto px-6 text-center">
            <span class="mb-4 inline-block rounded-full bg-accent-green/30 px-4 py-1.5 text-sm font-bold text-cream backdrop-blur-sm border border-accent-green/40">
                EST. 1985
            </span>
            <h1 class="mb-6 text-4xl font-black leading-tight tracking-tight text-cream md:text-6xl lg:text-7xl drop-shadow-lg">
                {{ $hero_greeting }} <br class="hidden md:block"/> <span class="text-accent-sage">{{ $hero_brand }}</span>
            </h1>
            <p class="mx-auto mb-10 max-w-2xl text-lg font-light leading-relaxed text-sand md:text-xl">
                {{ $hero_subtitle }}
            </p>
            <div class="flex flex-col items-center justify-center gap-4 sm:flex-row">
                <a href="{{ route('menu') }}" class="inline-flex items-center justify-center h-12 min-w-[160px] rounded-lg bg-primary hover:bg-primary-dark px-8 text-base font-bold text-white transition-all transform hover:scale-105 shadow-[0_0_20px_rgba(160,82,45,0.3)]">
                    View Menu
                </a>
                <a href="#" class="inline-flex items-center justify-center h-12 min-w-[160px] rounded-lg border-2 border-cream/30 bg-white/5 px-8 text-base font-bold text-cream backdrop-blur-sm transition-all hover:bg-white/10 hover:border-cream">
                    Our Story
                </a>
            </div>
        </div>
    </section>

    <!-- Features -->
    <section class="relative z-20 -mt-16 px-6 pb-20">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                <!-- Feature 1 -->
                <div class="group flex flex-col gap-4 rounded-xl bg-white dark:bg-background-dark p-6 shadow-xl transition-all hover:-translate-y-1 hover:shadow-2xl border border-sand/50 dark:border-wood-light/20">
                    <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-wood-light/20 text-wood-dark dark:text-cream group-hover:bg-primary group-hover:text-white transition-colors">
                        <span class="material-symbols-outlined">soup_kitchen</span>
                    </div>
                    <div>
                        <h3 class="mb-2 text-xl font-bold text-wood-dark dark:text-cream">{{ $feature_1_title }}</h3>
                        <p class="text-wood-light dark:text-gray-400">{{ $feature_1_text }}</p>
                    </div>
                </div>
                <!-- Feature 2 -->
                <div class="group flex flex-col gap-4 rounded-xl bg-white dark:bg-background-dark p-6 shadow-xl transition-all hover:-translate-y-1 hover:shadow-2xl border border-sand/50 dark:border-wood-light/20">
                    <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-wood-light/20 text-wood-dark dark:text-cream group-hover:bg-accent-green group-hover:text-white transition-colors">
                        <span class="material-symbols-outlined">forest</span>
                    </div>
                    <div>
                        <h3 class="mb-2 text-xl font-bold text-wood-dark dark:text-cream">{{ $feature_2_title }}</h3>
                        <p class="text-wood-light dark:text-gray-400">{{ $feature_2_text }}</p>
                    </div>
                </div>
                <!-- Feature 3 -->
                <div class="group flex flex-col gap-4 rounded-xl bg-white dark:bg-background-dark p-6 shadow-xl transition-all hover:-translate-y-1 hover:shadow-2xl border border-sand/50 dark:border-wood-light/20">
                    <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-wood-light/20 text-wood-dark dark:text-cream group-hover:bg-primary group-hover:text-white transition-colors">
                        <span class="material-symbols-outlined">volunteer_activism</span>
                    </div>
                    <div>
                        <h3 class="mb-2 text-xl font-bold text-wood-dark dark:text-cream">{{ $feature_3_title }}</h3>
                        <p class="text-wood-light dark:text-gray-400">{{ $feature_3_text }}</p>
                    </div>
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
                    <button class="inline-flex items-center gap-2 font-bold text-wood-dark hover:text-primary transition-colors border-b-2 border-primary pb-1">
                        Read our full story
                        <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </button>
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
                    <div class="group cursor-pointer">
                        <div class="relative mb-4 overflow-hidden rounded-2xl aspect-square">
                            <img src="{{ $item->image ?? 'https://via.placeholder.com/400' }}" alt="{{ $item->name }}" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110" />
                            <div class="absolute bottom-4 right-4 rounded-lg bg-cream/90 px-3 py-1 text-sm font-bold text-wood-dark shadow-sm">
                                Rp {{ number_format($item->price, 0, ',', '.') }}
                            </div>
                        </div>
                        <h3 class="mb-1 text-lg font-bold text-wood-dark dark:text-cream group-hover:text-primary transition-colors">{{ $item->name }}</h3>
                        <p class="text-sm text-wood-light dark:text-gray-400 line-clamp-2">{{ $item->description }}</p>
                    </div>
                @empty
                    <!-- Placeholder Items if DB is empty, ensuring the design is visible immediately -->
                    <div class="group cursor-pointer">
                        <div class="relative mb-4 overflow-hidden rounded-2xl aspect-square">
                            <img src="https://images.unsplash.com/photo-1600093463592-8e36ae95ef56?q=80&w=2070&auto=format&fit=crop" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110" />
                            <div class="absolute bottom-4 right-4 rounded-lg bg-cream/90 px-3 py-1 text-sm font-bold text-wood-dark shadow-sm">
                                Rp 35.000
                            </div>
                        </div>
                        <h3 class="mb-1 text-lg font-bold text-wood-dark dark:text-cream group-hover:text-primary transition-colors">Nasi Goreng Nenek</h3>
                        <p class="text-sm text-wood-light dark:text-gray-400">Our famous traditional fried rice with secret family spices.</p>
                    </div>
                    <div class="group cursor-pointer">
                         <div class="relative mb-4 overflow-hidden rounded-2xl aspect-square">
                            <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?q=80&w=2080&auto=format&fit=crop" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110" />
                            <div class="absolute bottom-4 right-4 rounded-lg bg-cream/90 px-3 py-1 text-sm font-bold text-wood-dark shadow-sm">
                                Rp 25.000
                            </div>
                        </div>
                        <h3 class="mb-1 text-lg font-bold text-wood-dark dark:text-cream group-hover:text-primary transition-colors">Garden Salad</h3>
                         <p class="text-sm text-wood-light dark:text-gray-400">Fresh organic vegetables for healthy living.</p>
                    </div>
                    <div class="group cursor-pointer">
                         <div class="relative mb-4 overflow-hidden rounded-2xl aspect-square">
                            <img src="https://images.unsplash.com/photo-1554118811-1e0d58224f24?q=80&w=2047&auto=format&fit=crop" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110" />
                             <div class="absolute bottom-4 right-4 rounded-lg bg-cream/90 px-3 py-1 text-sm font-bold text-wood-dark shadow-sm">
                                Rp 18.000
                            </div>
                        </div>
                        <h3 class="mb-1 text-lg font-bold text-wood-dark dark:text-cream group-hover:text-primary transition-colors">Kopi Tubruk</h3>
                         <p class="text-sm text-wood-light dark:text-gray-400">Traditional unfiltered black coffee.</p>
                    </div>
                     <div class="group cursor-pointer">
                         <div class="relative mb-4 overflow-hidden rounded-2xl aspect-square">
                            <img src="https://images.unsplash.com/photo-1626082927389-6cd097cdc6ec?q=80&w=2070&auto=format&fit=crop" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110" />
                             <div class="absolute bottom-4 right-4 rounded-lg bg-cream/90 px-3 py-1 text-sm font-bold text-wood-dark shadow-sm">
                                Rp 20.000
                            </div>
                        </div>
                        <h3 class="mb-1 text-lg font-bold text-wood-dark dark:text-cream group-hover:text-primary transition-colors">Pisang Goreng</h3>
                         <p class="text-sm text-wood-light dark:text-gray-400">Sweet fried banana with cheese.</p>
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
        
        <div class="flex flex-wrap md:flex-nowrap gap-4 px-4 overflow-hidden justify-center">
            @forelse($gallery_preview as $photo)
                <div class="relative group rounded-xl overflow-hidden h-64 md:h-80 w-full md:w-1/3 flex-none first:md:w-1/4 last:md:w-1/4 hover:w-1/2 transition-all duration-500 ease-in-out cursor-pointer">
                    <img src="{{ $photo->image_path }}" alt="{{ $photo->title }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-black/30 group-hover:bg-black/10 transition-colors"></div>
                    <div class="absolute bottom-4 left-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <span class="text-white font-bold text-lg drop-shadow-md">{{ $photo->title }}</span>
                        <span class="block text-cream/80 text-xs uppercase tracking-wider">{{ $photo->category }}</span>
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
                        <form action="{{ route('book.table') }}" method="POST" class="flex flex-col gap-4">
                            @csrf
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div class="flex flex-col gap-1">
                                    <label class="text-xs font-semibold text-wood-light uppercase">Name</label>
                                    <input name="name" required class="w-full rounded-lg border-0 bg-white/10 p-3 text-cream placeholder-wood-light focus:ring-2 focus:ring-primary" type="text" placeholder="Your Name"/>
                                </div>
                                <div class="flex flex-col gap-1">
                                    <label class="text-xs font-semibold text-wood-light uppercase">Phone</label>
                                    <input name="phone" required class="w-full rounded-lg border-0 bg-white/10 p-3 text-cream placeholder-wood-light focus:ring-2 focus:ring-primary" type="tel" placeholder="0812..."/>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div class="flex flex-col gap-1">
                                    <label class="text-xs font-semibold text-wood-light uppercase">Date</label>
                                    <input name="date" required class="w-full rounded-lg border-0 bg-white/10 p-3 text-cream placeholder-wood-light focus:ring-2 focus:ring-primary" type="date"/>
                                </div>
                                <div class="flex flex-col gap-1">
                                    <label class="text-xs font-semibold text-wood-light uppercase">Guests</label>
                                    <input name="guests" required class="w-full rounded-lg border-0 bg-white/10 p-3 text-cream placeholder-wood-light focus:ring-2 focus:ring-primary" type="number" min="1" placeholder="Number of people"/>
                                </div>
                            </div>
                            <!-- Time field removed as per request -->
                            <button class="mt-4 rounded-lg bg-primary py-4 font-bold text-white hover:bg-white hover:text-wood-dark transition-colors" type="submit">
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
