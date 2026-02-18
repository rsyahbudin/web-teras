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
          class="w-full min-h-screen bg-menu-bg-light dark:bg-menu-bg-dark"
          x-data="{ activeTab: '{{ $categories->first()?->slug }}' }">
        
        <!-- Sticky Tab Navigation -->
        <div class="sticky top-[70px] z-40 w-full mb-12">
            <div class="absolute inset-x-0 bottom-0 h-px bg-gradient-to-r from-transparent via-wood-medium/20 to-transparent"></div>
            <div class="bg-menu-bg-light/90 dark:bg-menu-bg-dark/90 backdrop-blur-md py-4 shadow-sm">
                <div class="w-full mx-auto px-4 relative group">
                    <!-- Fade Masks to indicate scroll -->
                    <div class="absolute inset-y-0 left-0 w-12 bg-gradient-to-r from-menu-bg-light dark:from-menu-bg-dark to-transparent z-10 pointer-events-none md:hidden"></div>
                    <div class="absolute inset-y-0 right-0 w-12 bg-gradient-to-l from-menu-bg-light dark:from-menu-bg-dark to-transparent z-10 pointer-events-none md:hidden"></div>
                    
                    <div class="flex overflow-x-auto overflow-y-hidden no-scrollbar gap-3 md:justify-center px-4 md:px-8 w-full scroll-smooth pb-1" id="category-nav">
                        @foreach($categories as $category)
                            <button 
                                @click="activeTab = '{{ $category->slug }}'; document.getElementById('category-nav').scrollLeft = $el.offsetLeft - (window.innerWidth / 2) + ($el.offsetWidth / 2)"
                                :class="activeTab === '{{ $category->slug }}' 
                                    ? 'bg-menu-accent text-white shadow-lg shadow-menu-accent/25 scale-105' 
                                    : 'bg-white dark:bg-white/5 text-wood-medium dark:text-menu-wood-light/70 hover:bg-white/80 dark:hover:bg-white/10 hover:shadow-sm'"
                                class="whitespace-nowrap px-6 py-2.5 rounded-full font-bold text-xs md:text-sm uppercase tracking-wider transition-all duration-300 border border-transparent focus:outline-none ring-offset-2 focus:ring-2 ring-menu-accent/50 selection:bg-transparent">
                                {{ $category->name }}
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Background Decor -->
        <div class="absolute top-20 left-0 -z-10 opacity-10 dark:opacity-5 pointer-events-none hidden xl:block">
            <img alt="leaf pattern" class="w-64 h-64 rotate-12 sepia grayscale contrast-50" src="https://images.unsplash.com/photo-1550583724-b2692b85b150?q=80&w=1000&auto=format&fit=crop"/>
        </div>

        <div class="w-full flex flex-col gap-20 px-4 md:px-8 lg:px-12 max-w-[1920px] mx-auto pb-20">
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

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 md:gap-8">
                        @foreach($category->items as $item)
                            @if($loop->parent->first && $loop->index < 2 && $item->is_featured && $category->items->count() > 4) 
                                <!-- Special Featured Card Style (Spans 2 cols on tablet, but adapts on larger) -->
                                <div class="col-span-1 md:col-span-2 lg:col-span-2 group relative bg-white dark:bg-wood-dark/40 rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl border border-wood-light/10 transition-all duration-500 hover:-translate-y-1 flex flex-col lg:flex-row h-full">
                                    <div class="w-full lg:w-2/5 h-64 lg:h-auto overflow-hidden relative">
                                        <img src="{{ $item->image ?? 'https://via.placeholder.com/600x400' }}" alt="{{ $item->name }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"/>
                                        <div class="absolute inset-0 bg-black/10 group-hover:bg-transparent transition-colors"></div>
                                    </div>
                                    <div class="p-6 lg:p-8 flex flex-col justify-center flex-1 relative overflow-hidden">
                                        <div class="absolute top-0 right-0 p-8 opacity-5">
                                            <span class="material-symbols-outlined text-9xl">restaurant</span>
                                        </div>
                                        <div class="relative z-10">
                                             <div class="flex justify-between items-start mb-3 gap-4">
                                                <h3 class="text-2xl font-black text-wood-dark dark:text-[#f4f1ea] font-serif group-hover:text-menu-accent transition-colors leading-tight">{{ $item->name }}</h3>
                                                <span class="text-lg font-bold text-menu-accent bg-menu-accent/10 px-3 py-1 rounded-lg whitespace-nowrap">{{ number_format($item->price, 0, ',', '.') }}</span>
                                            </div>
                                            <p class="text-wood-medium dark:text-menu-wood-light/70 mb-6 leading-relaxed text-sm lg:text-base">{{ $item->description }}</p>
                                            <div class="flex gap-3">
                                                <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider bg-orange-50 text-orange-700 dark:bg-orange-900/30 dark:text-orange-200 border border-orange-100 dark:border-orange-800">
                                                    <span class="material-symbols-outlined text-[16px]">local_fire_department</span> Best Seller
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <!-- Standard Card Style -->
                                <div class="group relative flex flex-col p-5 rounded-2xl bg-white dark:bg-white/5 hover:bg-white dark:hover:bg-white/10 transition-all duration-300 shadow-sm hover:shadow-xl border border-wood-light/20 hover:border-menu-accent/30 hover:-translate-y-1 h-full">
                                    <div class="w-full aspect-square rounded-xl overflow-hidden relative mb-4 shadow-inner">
                                        <img src="{{ $item->image ?? 'https://via.placeholder.com/300' }}" alt="{{ $item->name }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"/>
                                        @if($item->is_featured && !($loop->parent->first && $loop->index < 2 && $category->items->count() > 4))
                                        <div class="absolute top-2 left-2 bg-white/90 dark:bg-black/80 px-2 py-1 rounded-lg shadow-sm backdrop-blur-sm">
                                            <span class="flex items-center gap-1 text-[10px] font-bold uppercase tracking-wider text-orange-600">
                                                <span class="material-symbols-outlined text-sm">star</span> Featured
                                            </span>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="flex flex-col flex-grow justify-between">
                                        <div>
                                            <div class="flex justify-between items-start mb-2 gap-2">
                                                <h3 class="font-bold text-lg text-wood-dark dark:text-[#f4f1ea] group-hover:text-menu-accent transition-colors leading-tight">{{ $item->name }}</h3>
                                                <span class="font-bold text-menu-accent whitespace-nowrap">{{ number_format($item->price, 0, ',', '.') }}</span>
                                            </div>
                                            <p class="text-sm text-wood-medium dark:text-menu-wood-light/60 line-clamp-2 leading-relaxed">{{ $item->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                @if($index == 0)
                     <!-- @if($categories->count() > 0)
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
                    @endif -->
                @endif
            @endforeach
        </div>    
            

        </div>
    </main>
</x-layouts.web>
