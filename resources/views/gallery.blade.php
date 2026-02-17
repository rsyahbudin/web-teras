<x-layouts.web title="Gallery - Teras Rumah Nenek">
    <div class="bg-cream min-h-screen py-12">
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
                    <a href="{{ route('gallery', ['category' => $cat]) }}" 
                       class="px-6 py-2 rounded-full font-medium shadow-sm transition-all {{ request('category') == $cat ? 'bg-primary text-cream shadow-md' : 'bg-white text-secondary hover:bg-white/80' }}">
                       {{ $cat }}
                    </a>
                @endforeach
            </div>

            <!-- Masonry Grid -->
            <div class="columns-1 sm:columns-2 lg:columns-3 xl:columns-4 gap-6 space-y-6 mx-auto">
                @forelse($galleries as $gallery)
                    <div class="break-inside-avoid rounded-2xl overflow-hidden shadow-lg group relative bg-white dark:bg-wood-dark">
                        <img src="{{ $gallery->image_path }}" alt="{{ $gallery->title }}" class="w-full h-auto transform group-hover:scale-105 transition-transform duration-500">
                        
                        <!-- Hover Overlay -->
                        <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent p-6 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <span class="inline-block px-2 py-1 mb-2 text-xs font-bold text-white bg-primary/80 rounded-md backdrop-blur-sm">{{ $gallery->category }}</span>
                            <h3 class="text-white font-bold text-lg leading-tight">{{ $gallery->title }}</h3>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-20 text-center">
                        <p class="text-xl text-wood-light">No photos found in this category.</p>
                        <a href="{{ route('gallery') }}" class="mt-4 inline-block text-primary font-bold hover:underline">View all photos</a>
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
