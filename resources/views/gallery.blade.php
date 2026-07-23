<x-layouts.web title="Gallery - Teras Rumah Nenek">
    <!-- Page Header -->
    <section class="bg-cream dark:bg-wood-dark/20 pt-12 sm:pt-16 pb-8 sm:pb-10 px-4 sm:px-6">
        <div class="container mx-auto text-center max-w-3xl">
            <span class="text-accent-green font-bold tracking-wider uppercase text-xs sm:text-sm">Our Moments</span>
            <h1 class="mt-2 sm:mt-3 text-3xl sm:text-4xl md:text-5xl font-black text-wood-dark dark:text-cream leading-tight">
                {{ $page_title }}
            </h1>
            <p class="mt-3 sm:mt-4 text-base sm:text-lg text-wood-light dark:text-gray-300 leading-relaxed px-2">
                {{ $page_subtitle }}
            </p>
        </div>
    </section>

    <!-- Category Filters -->
    <div class="sticky top-20 z-30 bg-cream/95 dark:bg-wood-dark/95 backdrop-blur-md border-b border-wood-medium/10 shadow-sm">
        <div class="container mx-auto relative">
            <div class="absolute inset-y-0 left-0 w-8 sm:w-12 bg-gradient-to-r from-cream dark:from-wood-dark to-transparent z-10 pointer-events-none md:hidden"></div>
            <div class="absolute inset-y-0 right-0 w-8 sm:w-12 bg-gradient-to-l from-cream dark:from-wood-dark to-transparent z-10 pointer-events-none md:hidden"></div>

            <div class="flex overflow-x-auto no-scrollbar gap-2 sm:gap-3 px-4 sm:px-6 lg:px-8 py-3 sm:py-4 scroll-smooth md:flex-wrap md:justify-center md:overflow-visible">
                <a href="{{ route('gallery') }}"
                   class="shrink-0 px-4 sm:px-5 py-2 rounded-full text-xs sm:text-sm font-bold transition-all duration-300 touch-manipulation {{ !request('category') || request('category') == 'All' ? 'bg-primary text-cream shadow-md shadow-primary/20' : 'bg-white dark:bg-white/10 text-wood-dark dark:text-cream border border-wood-medium/20 hover:border-primary/40 hover:text-primary' }}">
                    All
                </a>
                @foreach($categories as $cat)
                    <a href="{{ route('gallery', ['category' => $cat->slug]) }}"
                       class="shrink-0 px-4 sm:px-5 py-2 rounded-full text-xs sm:text-sm font-bold transition-all duration-300 touch-manipulation {{ request('category') == $cat->slug ? 'bg-primary text-cream shadow-md shadow-primary/20' : 'bg-white dark:bg-white/10 text-wood-dark dark:text-cream border border-wood-medium/20 hover:border-primary/40 hover:text-primary' }}">
                        {{ $cat->name }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Gallery Grid -->
    <section class="bg-cream dark:bg-wood-dark/10 min-h-[50vh] py-8 sm:py-12 px-3 sm:px-6 lg:px-8">
        <div class="container mx-auto">
            @if($galleries->count() > 0)
                <div class="grid grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4 md:gap-6">
                    @foreach($galleries as $gallery)
                        <article class="group relative aspect-[3/4] sm:aspect-[4/5] rounded-xl sm:rounded-2xl overflow-hidden shadow-md hover:shadow-2xl border border-transparent hover:border-wood-medium/20 transition-all duration-300">
                            <img src="{{ $gallery->image_path }}"
                                 alt="{{ $gallery->title }}"
                                 loading="lazy"
                                 decoding="async"
                                 class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105 group-active:scale-100" />

                            <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/25 to-transparent"></div>

                            <div class="absolute bottom-0 left-0 right-0 p-3 sm:p-5">
                                @if($gallery->category)
                                    <span class="inline-block mb-1.5 sm:mb-2 px-2 sm:px-3 py-0.5 sm:py-1 text-[10px] sm:text-xs font-bold uppercase tracking-wider text-white bg-primary/90 rounded-full backdrop-blur-sm line-clamp-1 max-w-full">
                                        {{ $gallery->category->name }}
                                    </span>
                                @endif
                                <h3 class="text-white font-bold text-sm sm:text-lg leading-snug drop-shadow-md line-clamp-2">{{ $gallery->title }}</h3>
                            </div>
                        </article>
                    @endforeach
                </div>

                @if($galleries->hasPages())
                    <div class="mt-10 sm:mt-16 flex flex-col sm:flex-row items-stretch sm:items-center justify-center gap-3 sm:gap-4 px-2">
                        @if($galleries->onFirstPage())
                            <span class="inline-flex items-center justify-center gap-2 px-5 py-3 sm:py-2.5 rounded-full text-sm font-bold text-wood-light/50 bg-white/50 border border-wood-medium/10 cursor-not-allowed">
                                <span class="material-symbols-outlined text-base">arrow_back</span>
                                Previous
                            </span>
                        @else
                            <a href="{{ $galleries->appends(request()->query())->previousPageUrl() }}"
                               class="inline-flex items-center justify-center gap-2 px-5 py-3 sm:py-2.5 rounded-full text-sm font-bold text-wood-dark bg-white border border-wood-medium/20 hover:border-primary hover:text-primary transition-all shadow-sm touch-manipulation">
                                <span class="material-symbols-outlined text-base">arrow_back</span>
                                Previous
                            </a>
                        @endif

                        <span class="text-sm font-medium text-wood-light text-center py-1">
                            Page {{ $galleries->currentPage() }} of {{ $galleries->lastPage() }}
                        </span>

                        @if($galleries->hasMorePages())
                            <a href="{{ $galleries->appends(request()->query())->nextPageUrl() }}"
                               class="inline-flex items-center justify-center gap-2 px-5 py-3 sm:py-2.5 rounded-full text-sm font-bold text-cream bg-primary hover:bg-primary-dark transition-all shadow-md shadow-primary/20 touch-manipulation">
                                Next
                                <span class="material-symbols-outlined text-base">arrow_forward</span>
                            </a>
                        @else
                            <span class="inline-flex items-center justify-center gap-2 px-5 py-3 sm:py-2.5 rounded-full text-sm font-bold text-wood-light/50 bg-primary/30 cursor-not-allowed">
                                Next
                                <span class="material-symbols-outlined text-base">arrow_forward</span>
                            </span>
                        @endif
                    </div>
                @endif
            @else
                <div class="py-16 sm:py-24 text-center flex flex-col items-center justify-center px-4">
                    <div class="w-16 sm:w-20 h-16 sm:h-20 bg-wood-light/10 rounded-full flex items-center justify-center mb-6">
                        <span class="material-symbols-outlined text-3xl sm:text-4xl text-wood-light">photo_library</span>
                    </div>
                    <p class="text-lg sm:text-xl font-bold text-wood-dark dark:text-cream mb-2">No photos found</p>
                    <p class="text-wood-light mb-6 text-sm sm:text-base">Try selecting a different category.</p>
                    <a href="{{ route('gallery') }}"
                       class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-primary text-cream font-bold hover:bg-primary-dark transition-colors shadow-lg shadow-primary/20 touch-manipulation">
                        View all photos
                        <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </a>
                </div>
            @endif
        </div>
    </section>
</x-layouts.web>
