<x-layouts.web title="Teras Rumah Nenek - Menu">
    <!-- Hero Section -->
    <section class="relative w-full h-[60vh] min-h-[500px] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img alt="Rustic outdoor dining table with lush greenery" class="w-full h-full object-cover sepia-[0.2] brightness-75" src="{{ $hero_bg }}"/>
            <div class="absolute inset-0 bg-gradient-to-b from-wood-dark/60 via-wood-dark/30 to-menu-bg-light dark:to-menu-bg-dark"></div>
        </div>
        <div class="relative z-10 text-center px-4 max-w-4xl mx-auto mt-10">
            <span class="inline-block py-1 px-3 rounded-full bg-menu-accent/20 text-[#e8dacd] border border-menu-accent/40 backdrop-blur-md text-xs font-bold tracking-wider mb-4 uppercase">
                Since 1985
            </span>
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-black text-[#f4f1ea] leading-tight mb-6 drop-shadow-sm">
                {{ $hero_title }} <br/> <span class="text-menu-accent-light italic font-serif">{{ $hero_subtitle }}</span>
            </h1>
            <p class="text-[#e8e0d5] text-lg md:text-xl font-medium max-w-2xl mx-auto mb-8 drop-shadow-md">
                Experience traditional recipes passed down through generations, served in our comforting botanical garden terrace.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#menu-content" class="bg-menu-primary text-white px-8 py-3 rounded-full font-bold text-base hover:bg-[#f4f1ea] hover:text-menu-primary transition-all shadow-lg shadow-menu-primary/30 flex items-center justify-center gap-2 border border-transparent">
                    <span class="material-symbols-outlined text-xl">restaurant_menu</span>
                    View Full Menu
                </a>
                <a href="{{ route('legacy-garden') }}" class="bg-wood-dark/40 backdrop-blur-md border border-[#e8e0d5]/30 text-[#f4f1ea] px-8 py-3 rounded-full font-bold text-base hover:bg-[#f4f1ea] hover:text-wood-dark transition-all flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined text-xl">calendar_month</span>
                    Book an Event
                </a>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main id="menu-content" class="layout-container flex flex-col items-center w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 relative">
        
        <!-- Sticky Category Nav -->
        <div class="sticky top-[73px] z-40 w-full bg-menu-bg-light/95 dark:bg-menu-bg-dark/95 backdrop-blur-lg border-y border-wood-medium/20 py-2 mb-12 shadow-sm">
            <div class="flex overflow-x-auto no-scrollbar gap-8 md:justify-center px-4 py-2 w-full">
                @foreach($categories as $category)
                    <a href="#{{ $category->slug }}" class="whitespace-nowrap pb-1 border-b-2 border-transparent hover:border-wood-medium/50 text-wood-medium dark:text-menu-wood-light/70 hover:text-wood-dark dark:hover:text-menu-wood-light font-bold text-sm uppercase tracking-wide transition-colors">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>
        </div>

        <!-- Background Decor -->
        <div class="absolute top-20 left-0 -z-10 opacity-10 dark:opacity-5 pointer-events-none hidden xl:block">
            <img alt="leaf pattern" class="w-64 h-64 rotate-12 sepia grayscale contrast-50" src="https://images.unsplash.com/photo-1550583724-b2692b85b150?q=80&w=1000&auto=format&fit=crop"/>
        </div>

        <div class="w-full flex flex-col gap-20">
            @foreach($categories as $index => $category)
                <section class="scroll-mt-40" id="{{ $category->slug }}">
                    <div class="flex items-center gap-4 mb-8">
                        <h2 class="text-3xl font-black text-wood-dark dark:text-menu-wood-light tracking-tight font-serif">{{ $category->name }}</h2>
                        <div class="h-px bg-wood-medium/30 dark:bg-wood-medium flex-grow"></div>
                        <span class="material-symbols-outlined text-menu-accent dark:text-menu-wood-light/50">restaurant</span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        @foreach($category->items as $item)
                            @if($loop->parent->first && $loop->index < 2 && $item->is_featured) 
                                <!-- Special Featured Card Style for top items if desired, essentially matching the user's "Nasi Goreng Kampung Special" large card -->
                                <div class="col-span-1 md:col-span-2 bg-white dark:bg-wood-dark/40 rounded-2xl overflow-hidden shadow-sm border border-wood-light/30 dark:border-wood-medium/20 flex flex-col md:flex-row">
                                    <div class="w-full md:w-2/5 h-64 md:h-auto overflow-hidden">
                                        <img src="{{ $item->image ?? 'https://via.placeholder.com/600x400' }}" alt="{{ $item->name }}" class="w-full h-full object-cover"/>
                                    </div>
                                    <div class="p-6 md:p-8 flex flex-col justify-center flex-1 bg-paper dark:bg-wood-dark/30">
                                        <div class="flex justify-between items-start mb-2">
                                            <h3 class="text-2xl font-bold text-wood-dark dark:text-[#f4f1ea] font-serif">{{ $item->name }}</h3>
                                            <span class="text-xl font-bold text-menu-accent">{{ number_format($item->price, 0, ',', '.') }}</span>
                                        </div>
                                        <p class="text-wood-medium dark:text-menu-wood-light/70 mb-6">{{ $item->description }}</p>
                                        <div class="flex gap-3 mb-6">
                                            <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-medium bg-red-50 text-red-800 dark:bg-red-900/40 dark:text-red-200 border border-red-100 dark:border-red-900">
                                                <span class="material-symbols-outlined text-[14px]">local_fire_department</span> Best Seller
                                            </span>
                                        </div>
                                        <button class="w-full md:w-auto bg-menu-primary text-white font-bold py-3 px-6 rounded-lg hover:bg-menu-primary-dark transition-colors flex items-center justify-center gap-2 shadow-sm">
                                            Add to Order
                                        </button>
                                    </div>
                                </div>
                            @else
                                <!-- Standard Card Style -->
                                <div class="group flex gap-4 p-4 rounded-xl bg-white/50 hover:bg-white dark:bg-white/5 dark:hover:bg-white/10 transition-colors border border-wood-light/30 hover:border-wood-medium/30 dark:border-wood-medium/10">
                                    <div class="shrink-0 w-24 h-24 rounded-lg bg-menu-wood-light/20 overflow-hidden relative">
                                        <img src="{{ $item->image ?? 'https://via.placeholder.com/150' }}" alt="{{ $item->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"/>
                                        @if($item->is_featured)
                                        <div class="absolute top-1 left-1 bg-white/90 dark:bg-black/80 p-1 rounded-md shadow-sm">
                                            <span class="material-symbols-outlined text-xs text-orange-700">star</span>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="flex flex-col flex-grow justify-between">
                                        <div>
                                            <div class="flex justify-between items-start mb-1">
                                                <h3 class="font-bold text-lg text-wood-dark dark:text-[#f4f1ea] group-hover:text-menu-primary transition-colors">{{ $item->name }}</h3>
                                                <span class="font-bold text-menu-accent">{{ number_format($item->price, 0, ',', '.') }}</span>
                                            </div>
                                            <p class="text-sm text-wood-medium dark:text-menu-wood-light/60 line-clamp-2">{{ $item->description }}</p>
                                        </div>
                                        <button class="mt-2 text-xs font-bold uppercase tracking-wider text-wood-medium hover:text-menu-accent self-start flex items-center gap-1">
                                            Add to Order <span class="material-symbols-outlined text-sm">add</span>
                                        </button>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </section>

                @if($index == 0)
                    <!-- Chef's Recommendation Banner (Inserted after first category) -->
                    <div class="w-full h-64 md:h-80 rounded-2xl overflow-hidden relative my-4 group shadow-lg">
                        <img alt="Dark moody food photography of a feast" class="w-full h-full object-cover brightness-[0.8]" src="https://images.unsplash.com/photo-1544025162-d76690b67f61?q=80&w=2070&auto=format&fit=crop"/>
                        <div class="absolute inset-0 bg-wood-dark/50 flex items-center justify-center transition-colors group-hover:bg-wood-dark/40">
                            <div class="text-center p-8 bg-[#f4f1ea]/10 backdrop-blur-md rounded-xl border border-[#f4f1ea]/20 max-w-lg mx-4">
                                <h3 class="text-3xl font-serif italic text-[#f4f1ea] mb-3">Chef's Recommendation</h3>
                                <p class="text-[#e8e0d5]">Try our signature Nasi Liwet this weekend</p>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </main>

    <!-- Scroll Spy & Sticky Nav Script -->
    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const navLinks = document.querySelectorAll('.sticky a');
            const sections = document.querySelectorAll('section[id]');

            const observerOptions = {
                root: null,
                rootMargin: '-100px 0px -40% 0px', 
                threshold: 0
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        navLinks.forEach(link => {
                            link.classList.remove('text-menu-accent', 'border-menu-accent');
                            link.classList.add('text-wood-medium', 'dark:text-menu-wood-light/70', 'border-transparent');
                        });

                        const activeLink = document.querySelector(`.sticky a[href="#${entry.target.id}"]`);
                        if (activeLink) {
                            activeLink.classList.remove('text-wood-medium', 'dark:text-menu-wood-light/70', 'border-transparent');
                            activeLink.classList.add('text-menu-accent', 'border-menu-accent');
                            activeLink.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
                        }
                    }
                });
            }, observerOptions);

            sections.forEach(section => observer.observe(section));
        });
    </script>
    @endpush
</x-layouts.web>
