<x-layouts.web title="Legacy Garden - Teras Rumah Nenek">
    @push('styles')
    <style>
        .bg-pattern {
            background-color: var(--color-legacy-bg-light);
            background-image: radial-gradient(var(--color-legacy-primary) 0.5px, transparent 0.5px), radial-gradient(var(--color-legacy-primary) 0.5px, var(--color-legacy-bg-light) 0.5px);
            background-size: 20px 20px;
            background-position: 0 0, 10px 10px;
            opacity: 0.15;
        }
        .dark .bg-pattern {
            background-color: var(--color-legacy-bg-dark);
            background-image: radial-gradient(var(--color-legacy-primary) 0.5px, transparent 0.5px), radial-gradient(var(--color-legacy-primary) 0.5px, var(--color-legacy-bg-dark) 0.5px);
        }
    </style>
    @endpush

    <!-- Hero Section -->
    <section class="relative h-[85vh] w-full overflow-hidden flex items-center justify-center">
        <div class="absolute inset-0 bg-black/40 z-10 mix-blend-multiply"></div>
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat" style="background-image: url('{{ $hero_bg }}');">
        </div>
        <div class="relative z-20 text-center px-4 max-w-4xl mx-auto flex flex-col items-center gap-6 animate-fade-in-up">
            <span class="text-white font-bold tracking-widest uppercase text-sm bg-legacy-primary/80 backdrop-blur-md px-4 py-1 rounded-full border border-white/20">The Venue</span>
            <h1 class="text-white text-5xl md:text-7xl font-black leading-tight tracking-tight drop-shadow-sm">
                {{ $hero_title }} <span class="text-legacy-primary-light italic font-serif text-[#aed581]">{{ $hero_subtitle }}</span>
            </h1>
            <p class="text-[#f1f3e9] text-lg md:text-xl font-medium max-w-2xl leading-relaxed drop-shadow-md">
                {{ $hero_text }}
            </p>
            <div class="flex flex-col sm:flex-row gap-4 mt-4">
                <a href="#inquire" class="flex items-center justify-center rounded-full h-12 px-8 bg-legacy-primary hover:bg-legacy-primary-dark text-white text-base font-bold transition-all transform hover:scale-105 shadow-lg shadow-legacy-primary/30">
                    Inquire Now
                </a>
                <button class="flex items-center justify-center rounded-full h-12 px-8 bg-white/20 hover:bg-white/30 backdrop-blur-md text-white border border-white/50 text-base font-bold transition-all">
                    Download Brochure
                </button>
            </div>
        </div>
    </section>

    <!-- Intro Section -->
    <section class="py-20 px-6 lg:px-20 bg-legacy-bg-light dark:bg-legacy-bg-dark">
        <div class="max-w-[1200px] mx-auto grid lg:grid-cols-2 gap-16 items-center">
            <div class="relative">
                <div class="absolute -top-4 -left-4 w-24 h-24 bg-legacy-primary/20 rounded-full blur-2xl"></div>
                <div class="relative rounded-2xl overflow-hidden aspect-[4/5] shadow-2xl rotate-1 border-4 border-white dark:border-legacy-surface-dark">
                    <img src="{{ $intro_image }}" alt="Legacy Garden Intro" class="object-cover w-full h-full transform hover:scale-105 transition-transform duration-700" />
                </div>
                <div class="absolute -bottom-6 -right-6 bg-legacy-surface-light dark:bg-legacy-surface-dark p-6 rounded-xl shadow-xl max-w-xs border border-legacy-accent-beige dark:border-legacy-surface-dark">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="material-symbols-outlined text-legacy-primary text-xl">star</span>
                        <span class="material-symbols-outlined text-legacy-primary text-xl">star</span>
                        <span class="material-symbols-outlined text-legacy-primary text-xl">star</span>
                        <span class="material-symbols-outlined text-legacy-primary text-xl">star</span>
                        <span class="material-symbols-outlined text-legacy-primary text-xl">star</span>
                    </div>
                    <p class="text-sm italic text-[#5d635d] dark:text-[#a0a39d]">"{{ $intro_quote }}"</p>
                    <p class="text-xs font-bold mt-2 text-legacy-primary">— {{ $intro_author }}</p>
                </div>
            </div>
            <div class="flex flex-col gap-6">
                <h2 class="text-3xl md:text-4xl font-bold text-[#2d332d] dark:text-[#e0e2db] leading-tight">
                    {{ $intro_title }}
                </h2>
                <p class="text-[#5d635d] dark:text-[#a0a39d] text-lg leading-relaxed">
                    {{ $intro_text }}
                </p>
                <div class="grid grid-cols-2 gap-6 mt-4">
                    <div class="flex items-start gap-3">
                        <div class="p-2 rounded-lg bg-legacy-primary/10 text-legacy-primary">
                            <span class="material-symbols-outlined">nature_people</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-[#2d332d] dark:text-[#e0e2db]">Eco-Friendly</h4>
                            <p class="text-sm text-[#5d635d] dark:text-[#888b85]">Sustainable practices & local flora.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                         <div class="p-2 rounded-lg bg-legacy-primary/10 text-legacy-primary">
                            <span class="material-symbols-outlined">deck</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-[#2d332d] dark:text-[#e0e2db]">Flexible Layout</h4>
                            <p class="text-sm text-[#5d635d] dark:text-[#888b85]">From intimate to grand setups.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features -->
    <section class="py-20 px-6 lg:px-20 bg-legacy-bg-light dark:bg-legacy-bg-dark relative">
        <div class="absolute inset-0 bg-pattern z-0"></div>
        <div class="max-w-[1200px] mx-auto relative z-10">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-[#2d332d] dark:text-[#e0e2db] mb-4">{{ $features_title }}</h2>
                <p class="text-[#5d635d] dark:text-[#a0a39d] max-w-2xl mx-auto">{{ $features_subtitle }}</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Feature 1 -->
                <div class="bg-legacy-surface-light dark:bg-legacy-surface-dark p-8 rounded-2xl shadow-sm hover:shadow-lg transition-shadow border border-legacy-accent-beige dark:border-legacy-surface-dark group">
                    <div class="w-14 h-14 rounded-xl bg-legacy-primary/15 flex items-center justify-center text-legacy-primary mb-6 group-hover:bg-legacy-primary group-hover:text-white transition-colors">
                        <span class="material-symbols-outlined text-3xl">groups</span>
                    </div>
                    <h3 class="text-xl font-bold mb-2 text-[#2d332d] dark:text-[#e0e2db]">Capacity</h3>
                    <p class="text-[#5d635d] dark:text-[#888b85] text-sm">Comfortably hosts up to 300 guests standing or 150 seated guests.</p>
                </div>
                <!-- Feature 2 -->
                <div class="bg-legacy-surface-light dark:bg-legacy-surface-dark p-8 rounded-2xl shadow-sm hover:shadow-lg transition-shadow border border-legacy-accent-beige dark:border-legacy-surface-dark group">
                    <div class="w-14 h-14 rounded-xl bg-legacy-primary/15 flex items-center justify-center text-legacy-primary mb-6 group-hover:bg-legacy-primary group-hover:text-white transition-colors">
                        <span class="material-symbols-outlined text-3xl">local_parking</span>
                    </div>
                    <h3 class="text-xl font-bold mb-2 text-[#2d332d] dark:text-[#e0e2db]">Ample Parking</h3>
                    <p class="text-[#5d635d] dark:text-[#888b85] text-sm">Dedicated parking area for up to 80 cars with valet service available.</p>
                </div>
                 <!-- Feature 3 -->
                <div class="bg-legacy-surface-light dark:bg-legacy-surface-dark p-8 rounded-2xl shadow-sm hover:shadow-lg transition-shadow border border-legacy-accent-beige dark:border-legacy-surface-dark group">
                    <div class="w-14 h-14 rounded-xl bg-legacy-primary/15 flex items-center justify-center text-legacy-primary mb-6 group-hover:bg-legacy-primary group-hover:text-white transition-colors">
                        <span class="material-symbols-outlined text-3xl">checkroom</span>
                    </div>
                    <h3 class="text-xl font-bold mb-2 text-[#2d332d] dark:text-[#e0e2db]">Bridal Suite</h3>
                    <p class="text-[#5d635d] dark:text-[#888b85] text-sm">Private, air-conditioned preparation room for the bride and family.</p>
                </div>
                 <!-- Feature 4 -->
                <div class="bg-legacy-surface-light dark:bg-legacy-surface-dark p-8 rounded-2xl shadow-sm hover:shadow-lg transition-shadow border border-legacy-accent-beige dark:border-legacy-surface-dark group">
                    <div class="w-14 h-14 rounded-xl bg-legacy-primary/15 flex items-center justify-center text-legacy-primary mb-6 group-hover:bg-legacy-primary group-hover:text-white transition-colors">
                        <span class="material-symbols-outlined text-3xl">restaurant_menu</span>
                    </div>
                    <h3 class="text-xl font-bold mb-2 text-[#2d332d] dark:text-[#e0e2db]">In-House Catering</h3>
                    <p class="text-[#5d635d] dark:text-[#888b85] text-sm">Authentic Indonesian & International buffet menus from our kitchen.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Packages -->
    <section class="py-20 px-6 lg:px-20 bg-legacy-bg-light dark:bg-legacy-bg-dark">
        <div class="max-w-[1200px] mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-[#2d332d] dark:text-[#e0e2db] mb-4">Wedding Packages</h2>
                <p class="text-[#5d635d] dark:text-[#a0a39d]">Curated experiences for every scale of celebration.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Package 1 -->
                <div class="bg-legacy-surface-light dark:bg-legacy-surface-dark rounded-2xl overflow-hidden shadow-sm border border-legacy-accent-beige dark:border-legacy-surface-dark flex flex-col">
                    <div class="h-2 bg-[#d7ccc8]"></div>
                    <div class="p-8 flex-1">
                        <h3 class="text-2xl font-bold text-[#2d332d] dark:text-[#e0e2db] mb-2">Intimate Gathering</h3>
                        <p class="text-[#5d635d] text-sm mb-6">Perfect for close family & friends</p>
                        <div class="text-3xl font-bold text-legacy-primary mb-6">Start from 15jt</div>
                        <ul class="space-y-3 mb-8">
                            <li class="flex items-center gap-3 text-sm text-[#5d635d] dark:text-[#a0a39d]">
                                <span class="material-symbols-outlined text-legacy-primary text-base">check_circle</span>
                                Up to 50 Guests
                            </li>
                             <li class="flex items-center gap-3 text-sm text-[#5d635d] dark:text-[#a0a39d]">
                                <span class="material-symbols-outlined text-legacy-primary text-base">check_circle</span>
                                4 Hours Venue Usage
                            </li>
                             <li class="flex items-center gap-3 text-sm text-[#5d635d] dark:text-[#a0a39d]">
                                <span class="material-symbols-outlined text-legacy-primary text-base">check_circle</span>
                                Standard Sound System
                            </li>
                        </ul>
                    </div>
                    <div class="p-8 pt-0 mt-auto">
                        <button class="w-full py-3 rounded-lg border-2 border-legacy-primary text-[#2d332d] dark:text-[#e0e2db] font-bold hover:bg-legacy-primary hover:text-white transition-colors">View Details</button>
                    </div>
                </div>
                
                 <!-- Package 2 -->
                <div class="bg-legacy-surface-light dark:bg-legacy-surface-dark rounded-2xl overflow-hidden shadow-xl border border-legacy-primary/30 flex flex-col transform md:-translate-y-4 relative">
                    <div class="absolute top-0 right-0 bg-legacy-primary text-white text-xs font-bold px-3 py-1 rounded-bl-lg">POPULAR</div>
                    <div class="h-2 bg-legacy-primary"></div>
                    <div class="p-8 flex-1">
                        <h3 class="text-2xl font-bold text-[#2d332d] dark:text-[#e0e2db] mb-2">Legacy Wedding</h3>
                        <p class="text-[#5d635d] text-sm mb-6">The complete garden experience</p>
                        <div class="text-3xl font-bold text-legacy-primary mb-6">Start from 45jt</div>
                         <ul class="space-y-3 mb-8">
                            <li class="flex items-center gap-3 text-sm text-[#5d635d] dark:text-[#a0a39d]">
                                <span class="material-symbols-outlined text-legacy-primary text-base">check_circle</span>
                                Up to 200 Guests
                            </li>
                             <li class="flex items-center gap-3 text-sm text-[#5d635d] dark:text-[#a0a39d]">
                                <span class="material-symbols-outlined text-legacy-primary text-base">check_circle</span>
                                6 Hours Venue Usage
                            </li>
                             <li class="flex items-center gap-3 text-sm text-[#5d635d] dark:text-[#a0a39d]">
                                <span class="material-symbols-outlined text-legacy-primary text-base">check_circle</span>
                                Full Decoration Setup
                            </li>
                        </ul>
                    </div>
                    <div class="p-8 pt-0 mt-auto">
                        <button class="w-full py-3 rounded-lg bg-legacy-primary text-white font-bold hover:bg-legacy-primary-dark transition-colors shadow-lg shadow-legacy-primary/20">View Details</button>
                    </div>
                </div>
                
                 <!-- Package 3 -->
                  <div class="bg-legacy-surface-light dark:bg-legacy-surface-dark rounded-2xl overflow-hidden shadow-sm border border-legacy-accent-beige dark:border-legacy-surface-dark flex flex-col">
                    <div class="h-2 bg-[#d7ccc8]"></div>
                    <div class="p-8 flex-1">
                        <h3 class="text-2xl font-bold text-[#2d332d] dark:text-[#e0e2db] mb-2">Custom Celebration</h3>
                        <p class="text-[#5d635d] text-sm mb-6">Tailored to your specific needs</p>
                        <div class="text-3xl font-bold text-legacy-primary mb-6">Contact Us</div>
                        <ul class="space-y-3 mb-8">
                             <li class="flex items-center gap-3 text-sm text-[#5d635d] dark:text-[#a0a39d]">
                                <span class="material-symbols-outlined text-legacy-primary text-base">check_circle</span>
                                Flexible Guest Count
                            </li>
                             <li class="flex items-center gap-3 text-sm text-[#5d635d] dark:text-[#a0a39d]">
                                <span class="material-symbols-outlined text-legacy-primary text-base">check_circle</span>
                                Custom Menu Selection
                            </li>
                             <li class="flex items-center gap-3 text-sm text-[#5d635d] dark:text-[#a0a39d]">
                                <span class="material-symbols-outlined text-legacy-primary text-base">check_circle</span>
                                Vendor Coordination
                            </li>
                        </ul>
                    </div>
                    <div class="p-8 pt-0 mt-auto">
                        <button class="w-full py-3 rounded-lg border-2 border-legacy-primary text-[#2d332d] dark:text-[#e0e2db] font-bold hover:bg-legacy-primary hover:text-white transition-colors">Inquire Now</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact / Inquiry -->
    <section id="inquire" class="py-20 px-6 lg:px-20 bg-[#2a2c24] text-[#e0e2db] relative overflow-hidden">
        <div class="absolute top-0 right-0 w-64 h-64 bg-legacy-primary/10 rounded-full blur-[100px] pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-legacy-primary/10 rounded-full blur-[100px] pointer-events-none"></div>
        <div class="max-w-[1200px] mx-auto grid lg:grid-cols-2 gap-16">
            <div class="flex flex-col justify-center">
                <h2 class="text-4xl md:text-5xl font-bold mb-6 text-white">{{ $inquiry_title }}</h2>
                <p class="text-[#a0a39d] text-lg mb-8 leading-relaxed">
                    {{ $inquiry_text }}
                </p>
                <div class="space-y-6">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-white/5 flex items-center justify-center text-legacy-primary border border-white/10">
                            <span class="material-symbols-outlined">call</span>
                        </div>
                        <div>
                            <p class="text-sm text-[#888b85]">Call Us</p>
                            <p class="font-bold text-lg text-[#e0e2db]">{{ $inquiry_phone }}</p>
                        </div>
                    </div>
                     <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-white/5 flex items-center justify-center text-legacy-primary border border-white/10">
                            <span class="material-symbols-outlined">mail</span>
                        </div>
                        <div>
                            <p class="text-sm text-[#888b85]">Email Us</p>
                            <p class="font-bold text-lg text-[#e0e2db]">{{ $inquiry_email }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-legacy-surface-light dark:bg-[#1c1e16] rounded-2xl p-8 text-[#2d332d] dark:text-[#e0e2db] shadow-2xl border border-white/10">
                <form action="{{ route('legacy.inquire') }}" method="POST" class="flex flex-col gap-5">
                    @csrf
                    <div class="grid grid-cols-2 gap-5">
                        <div class="flex flex-col gap-2">
                            <label class="text-sm font-bold">First Name</label>
                            <input name="first_name" required type="text" placeholder="Jane" class="h-12 rounded-lg border border-[#d7ccc8] dark:border-[#3a3c35] bg-transparent px-4 focus:border-legacy-primary focus:ring-1 focus:ring-legacy-primary outline-none" />
                        </div>
                        <div class="flex flex-col gap-2">
                            <label class="text-sm font-bold">Last Name</label>
                            <input name="last_name" required type="text" placeholder="Doe" class="h-12 rounded-lg border border-[#d7ccc8] dark:border-[#3a3c35] bg-transparent px-4 focus:border-legacy-primary focus:ring-1 focus:ring-legacy-primary outline-none" />
                        </div>
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-sm font-bold">Email Address</label>
                        <input name="email" required type="email" placeholder="jane@example.com" class="h-12 rounded-lg border border-[#d7ccc8] dark:border-[#3a3c35] bg-transparent px-4 focus:border-legacy-primary focus:ring-1 focus:ring-legacy-primary outline-none" />
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-sm font-bold">Event Type</label>
                        <select name="event_type" class="h-12 rounded-lg border border-[#d7ccc8] dark:border-[#3a3c35] bg-transparent px-4 focus:border-legacy-primary focus:ring-1 focus:ring-legacy-primary outline-none text-[#5d635d] dark:text-[#a0a39d]">
                            <option value="Wedding">Wedding</option>
                            <option value="Prewedding Shooting">Prewedding Shooting</option>
                            <option value="Engagement">Engagement</option>
                            <option value="Commercial Shooting">Commercial Shooting</option>
                            <option value="Corporate Event">Corporate Event</option>
                            <option value="Birthday">Birthday</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="grid grid-cols-2 gap-5">
                        <div class="flex flex-col gap-2">
                             <label class="text-sm font-bold">Event Date</label>
                            <input name="event_date" required type="date" class="h-12 rounded-lg border border-[#d7ccc8] dark:border-[#3a3c35] bg-transparent px-4 focus:border-legacy-primary focus:ring-1 focus:ring-legacy-primary outline-none text-[#5d635d]" />
                        </div>
                        <div class="flex flex-col gap-2">
                             <label class="text-sm font-bold">Guest Count</label>
                            <select name="guest_count" class="h-12 rounded-lg border border-[#d7ccc8] dark:border-[#3a3c35] bg-transparent px-4 focus:border-legacy-primary focus:ring-1 focus:ring-legacy-primary outline-none">
                                <option value="Under 50">Under 50</option>
                                <option value="50-100">50-100</option>
                                <option value="100-200">100-200</option>
                                <option value="200-300">200-300</option>
                                <option value="300+">300+</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-sm font-bold">Message</label>
                        <textarea name="message" required placeholder="Tell us about your event details..." class="h-32 rounded-lg border border-[#d7ccc8] dark:border-[#3a3c35] bg-transparent px-4 py-3 focus:border-legacy-primary focus:ring-1 focus:ring-legacy-primary outline-none resize-none"></textarea>
                    </div>
                    <button type="submit" class="mt-2 h-12 rounded-lg bg-legacy-primary hover:bg-legacy-primary-dark text-white font-bold text-lg transition-colors shadow-lg shadow-legacy-primary/20">Send Inquiry</button>
                </form>
            </div>
        </div>
    </section>
</x-layouts.web>
