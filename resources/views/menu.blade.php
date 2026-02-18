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

    <!-- Main Content with Tabs -->
    <main id="menu-content" 
          class="layout-container flex flex-col items-center w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 relative min-h-screen"
          x-data="{ activeTab: '{{ $categories->first()?->slug }}' }">
        
        <!-- Sticky Tab Navigation -->
        <div class="sticky top-[73px] z-40 w-full bg-menu-bg-light/95 dark:bg-menu-bg-dark/95 backdrop-blur-lg border-y border-wood-medium/20 py-4 mb-12 shadow-sm">
            <div class="flex overflow-x-auto no-scrollbar gap-4 md:justify-center px-4 w-full">
                @foreach($categories as $category)
                    <button 
                        @click="activeTab = '{{ $category->slug }}'"
                        :class="activeTab === '{{ $category->slug }}' 
                            ? 'bg-menu-accent text-white border-menu-accent shadow-md' 
                            : 'bg-transparent text-wood-medium dark:text-menu-wood-light/70 border-transparent hover:bg-wood-light/20 dark:hover:bg-white/5'"
                        class="whitespace-nowrap px-6 py-2 rounded-full font-bold text-sm uppercase tracking-wide transition-all border-2 flex-shrink-0 focus:outline-none focus:ring-2 focus:ring-menu-accent/50">
                        {{ $category->name }}
                    </button>
                @endforeach
            </div>
        </div>

        <!-- Background Decor -->
        <div class="absolute top-20 left-0 -z-10 opacity-10 dark:opacity-5 pointer-events-none hidden xl:block">
            <img alt="leaf pattern" class="w-64 h-64 rotate-12 sepia grayscale contrast-50" src="https://images.unsplash.com/photo-1550583724-b2692b85b150?q=80&w=1000&auto=format&fit=crop"/>
        </div>

        <div class="w-full flex flex-col gap-20">
            @foreach($categories as $index => $category)
                <div x-show="activeTab === '{{ $category->slug }}'"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 translate-y-4"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     class="w-full">
                    
                    <div class="flex items-center gap-4 mb-8">
                        <h2 class="text-3xl font-black text-wood-dark dark:text-menu-wood-light tracking-tight font-serif">{{ $category->name }}</h2>
                        <div class="h-px bg-wood-medium/30 dark:bg-wood-medium flex-grow"></div>
                        <span class="material-symbols-outlined text-menu-accent dark:text-menu-wood-light/50">restaurant</span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        @foreach($category->items as $item)
                            @if($loop->parent->first && $loop->index < 2 && $item->is_featured) 
                                <!-- Special Featured Card Style (No 'Add to Order' button) -->
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
                                        <div class="flex gap-3">
                                            <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-medium bg-red-50 text-red-800 dark:bg-red-900/40 dark:text-red-200 border border-red-100 dark:border-red-900">
                                                <span class="material-symbols-outlined text-[14px]">local_fire_department</span> Best Seller
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <!-- Standard Card Style (No 'Add to Order' button) -->
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
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                @if($index == 0)
                    <!-- Chef's Recommendation Banner (Only shows when first tab is active because inside the x-show loop logic, but actually inside the loop logic it means it's attached to the first category. Wait, if I put it outside the x-show div it might show always. I should check logic.) -->
                    <!-- I need to put this inside the x-show div of the first category to make it only appear when that tab is active. Or maybe the user wants it always? Usually recommendations are category specific or general. The original code had it after the first section. I'll put it INSIDE the x-show div for the first category. -->
                @endif
            @endforeach
            
            <!-- Moving the Chef's Recommendation to be part of the first category flow or separate? -->
            <!-- In the original code, it was `@if($index == 0) ... @endif` inside the loop but outside the section? No, it was inside the loop. -->
            <!-- Let's put it inside the first category's x-show block to keep it associated with the "Main" or first view. -->
             @if($categories->count() > 0)
                <div x-show="activeTab === '{{ $categories->first()->slug }}'" class="w-full mt-8">
                    <div class="w-full h-64 md:h-80 rounded-2xl overflow-hidden relative group shadow-lg">
                        <img alt="Dark moody food photography of a feast" class="w-full h-full object-cover brightness-[0.8]" src="https://images.unsplash.com/photo-1544025162-d76690b67f61?q=80&w=2070&auto=format&fit=crop"/>
                        <div class="absolute inset-0 bg-wood-dark/50 flex items-center justify-center transition-colors group-hover:bg-wood-dark/40">
                            <div class="text-center p-8 bg-[#f4f1ea]/10 backdrop-blur-md rounded-xl border border-[#f4f1ea]/20 max-w-lg mx-4">
                                <h3 class="text-3xl font-serif italic text-[#f4f1ea] mb-3">Chef's Recommendation</h3>
                                <p class="text-[#e8e0d5]">Try our signature Nasi Liwet this weekend</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </main>
</x-layouts.web>
