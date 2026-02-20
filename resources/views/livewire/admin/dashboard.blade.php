<div class="flex flex-col gap-6">
    <div>
        <h1 class="text-2xl font-bold dark:text-white">Dashboard Overview</h1>
        <p class="text-zinc-500 text-sm">Summary of reservations and inquiries.</p>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Reservation Stats -->
        <div class="bg-white dark:bg-zinc-800 p-6 rounded-2xl border border-zinc-200 dark:border-zinc-700 shadow-sm overflow-hidden relative group transition-all hover:shadow-md">
            <div class="flex items-center gap-4">
                <div class="p-3 rounded-xl bg-primary/10 text-primary">
                    <flux:icon.calendar class="w-6 h-6" />
                </div>
                <div>
                    <p class="text-sm font-medium text-zinc-500 uppercase tracking-wider">Total Reservations</p>
                    <h3 class="text-2xl font-bold dark:text-white">{{ number_format($stats['reservations']['total']) }}</h3>
                </div>
            </div>
            <div class="mt-4 flex gap-4 text-xs font-medium">
                <div class="flex items-center gap-1 text-amber-600 bg-amber-50 dark:bg-amber-900/20 px-2 py-1 rounded">
                    <span class="w-1.5 h-1.5 rounded-full bg-amber-600"></span>
                    {{ $stats['reservations']['pending'] }} Pending
                </div>
                <div class="flex items-center gap-1 text-green-600 bg-green-50 dark:bg-green-900/20 px-2 py-1 rounded">
                    <span class="w-1.5 h-1.5 rounded-full bg-green-600"></span>
                    {{ $stats['reservations']['today'] }} Today
                </div>
            </div>
            <a href="{{ route('admin.reservations') }}" class="absolute bottom-0 right-0 p-3 opacity-0 group-hover:opacity-100 transition-opacity text-primary">
                <flux:icon.arrow-right class="w-4 h-4" />
            </a>
        </div>

        <!-- Legacy Inquiry Stats -->
        <div class="bg-white dark:bg-zinc-800 p-6 rounded-2xl border border-zinc-200 dark:border-zinc-700 shadow-sm overflow-hidden relative group transition-all hover:shadow-md">
            <div class="flex items-center gap-4">
                <div class="p-3 rounded-xl bg-accent-sage/10 text-wood-dark dark:text-accent-sage">
                    <flux:icon.envelope class="w-6 h-6" />
                </div>
                <div>
                    <p class="text-sm font-medium text-zinc-500 uppercase tracking-wider">Legacy Inquiries</p>
                    <h3 class="text-2xl font-bold dark:text-white">{{ number_format($stats['inquiries']['total']) }}</h3>
                </div>
            </div>
            <div class="mt-4 flex gap-4 text-xs font-medium">
                <div class="flex items-center gap-1 text-amber-600 bg-amber-50 dark:bg-amber-900/20 px-2 py-1 rounded">
                    <span class="w-1.5 h-1.5 rounded-full bg-amber-600"></span>
                    {{ $stats['inquiries']['pending'] }} New
                </div>
                <div class="flex items-center gap-1 text-blue-600 bg-blue-50 dark:bg-blue-900/20 px-2 py-1 rounded">
                    <span class="w-1.5 h-1.5 rounded-full bg-blue-600"></span>
                    {{ $stats['inquiries']['recent'] }} This Week
                </div>
            </div>
            <a href="{{ route('admin.inquiries') }}" class="absolute bottom-0 right-0 p-3 opacity-0 group-hover:opacity-100 transition-opacity text-primary">
                <flux:icon.arrow-right class="w-4 h-4" />
            </a>
        </div>

        <!-- Placeholder for Menu/Gallery -->
        <div class="bg-white dark:bg-zinc-800 p-6 rounded-2xl border border-zinc-200 dark:border-zinc-700 shadow-sm border-dashed flex flex-col items-center justify-center text-zinc-400">
             <flux:icon.presentation-chart-line class="w-8 h-8 mb-2 opacity-20" />
             <p class="text-xs uppercase tracking-widest font-bold">More stats coming soon</p>
        </div>
    </div>
    
    <!-- Quick Actions or Recent Activity could go here -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white dark:bg-zinc-800 p-6 rounded-2xl border border-zinc-200 dark:border-zinc-700 shadow-sm">
             <h3 class="font-bold mb-4">Quick Links</h3>
             <div class="grid grid-cols-2 gap-3">
                 <a href="{{ route('admin.menu') }}" class="flex items-center gap-3 p-3 rounded-xl bg-zinc-50 dark:bg-zinc-900 hover:bg-primary/5 hover:text-primary transition-all">
                     <flux:icon.tag class="w-5 h-5" />
                     <span class="text-sm font-medium">Menu Items</span>
                 </a>
                 <a href="{{ route('admin.events') }}" class="flex items-center gap-3 p-3 rounded-xl bg-zinc-50 dark:bg-zinc-900 hover:bg-primary/5 hover:text-primary transition-all">
                     <flux:icon.ticket class="w-5 h-5" />
                     <span class="text-sm font-medium">Event Packages</span>
                 </a>
                 <a href="{{ route('admin.gallery') }}" class="flex items-center gap-3 p-3 rounded-xl bg-zinc-50 dark:bg-zinc-900 hover:bg-primary/5 hover:text-primary transition-all">
                     <flux:icon.photo class="w-5 h-5" />
                     <span class="text-sm font-medium">Gallery</span>
                 </a>
                 <a href="{{ route('admin.content') }}" class="flex items-center gap-3 p-3 rounded-xl bg-zinc-50 dark:bg-zinc-900 hover:bg-primary/5 hover:text-primary transition-all">
                     <flux:icon.pencil-square class="w-5 h-5" />
                     <span class="text-sm font-medium">Site Content</span>
                 </a>
             </div>
        </div>
    </div>
</div>
