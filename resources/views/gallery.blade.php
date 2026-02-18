<x-layouts.web title="Gallery - Teras Rumah Nenek">
    <div class="bg-white min-h-screen py-12">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h1 class="font-serif text-5xl font-bold text-primary mb-4">Gallery</h1>
                <p class="text-secondary text-lg max-w-2xl mx-auto">
                    Glimpses of our little paradise. From the lush gardens to the savory dishes.
                </p>
            </div>

            <!-- Filter Buttons -->
            <div class="flex flex-wrap justify-center gap-4 mb-12">
                <a href="{{ route('gallery') }}" 
                   class="px-6 py-2 rounded-full font-medium shadow-sm transition-all {{ !request('category') || request('category') == 'All' ? 'bg-primary text-cream shadow-md' : 'bg-white text-secondary hover:bg-white/80' }}">
                   All
                </a>
                @foreach($categories as $cat)
                    <a href="{{ route('gallery', ['category' => $cat->slug]) }}" 
                       class="px-6 py-2 rounded-full font-medium shadow-sm transition-all {{ request('category') == $cat->slug ? 'bg-primary text-cream shadow-md' : 'bg-white text-secondary hover:bg-white/80' }}">
                       {{ $cat->name }}
                    </a>
                @endforeach
            </div>

            <!-- Masonry Grid with Alpine.js Animation -->
            <div x-data="{ shown: false }" x-init="setTimeout(() => shown = true, 100)" class="columns-1 sm:columns-2 lg:columns-3 xl:columns-4 gap-6 space-y-6 mx-auto">
                @forelse($galleries as $gallery)
                    <div x-show="shown"
                         x-transition:enter="transition ease-out duration-700"
                         x-transition:enter-start="opacity-0 translate-y-8"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         class="break-inside-avoid rounded-2xl overflow-hidden shadow-md hover:shadow-2xl group relative bg-white dark:bg-wood-dark border border-transparent hover:border-wood-medium/20 transition-all duration-300">
                        <img src="{{ $gallery->image_path }}" alt="{{ $gallery->title }}" class="w-full h-auto transform group-hover:scale-110 transition-transform duration-700">
                        
                        <!-- Hover Overlay -->
                        <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/90 via-black/50 to-transparent p-6 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end h-1/2">
                            <span class="inline-block self-start px-3 py-1 mb-2 text-xs font-bold uppercase tracking-wider text-white bg-primary/90 rounded-full backdrop-blur-md shadow-sm">{{ $gallery->category->name ?? 'Uncategorized' }}</span>
                            <h3 class="text-white font-bold text-lg leading-tight drop-shadow-md">{{ $gallery->title }}</h3>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-20 text-center flex flex-col items-center justify-center">
                        <div class="w-20 h-20 bg-wood-light/10 rounded-full flex items-center justify-center mb-6">
                            <span class="material-symbols-outlined text-4xl text-wood-light">photo_library</span>
                        </div>
                        <p class="text-xl font-medium text-wood-dark dark:text-cream">No photos found in this category.</p>
                        <a href="{{ route('gallery') }}" class="mt-4 px-6 py-2 rounded-full bg-primary text-white font-bold hover:bg-primary-dark transition-colors shadow-lg shadow-primary/30">View all photos</a>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-16 bg-white/50 p-4 rounded-full backdrop-blur-sm inline-block">
                {{ $galleries->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</x-layouts.web>
