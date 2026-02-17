@php
    $isLegacy = request()->routeIs('legacy-garden');
    
    // Choose keys based on the current page
    if ($isLegacy) {
        $instagram = \App\Models\PageContent::getValue('legacy_social_instagram');
        $tiktok = \App\Models\PageContent::getValue('legacy_social_tiktok');
        $facebook = \App\Models\PageContent::getValue('legacy_social_facebook');
        $whatsapp = \App\Models\PageContent::getValue('legacy_inquiry_whatsapp');
    } else {
        $instagram = \App\Models\PageContent::getValue('social_instagram');
        $tiktok = \App\Models\PageContent::getValue('social_tiktok');
        $facebook = \App\Models\PageContent::getValue('social_facebook');
        $whatsapp = \App\Models\PageContent::getValue('contact_whatsapp');
    }
@endphp

@if(!empty($instagram) || !empty($tiktok) || !empty($facebook) || !empty($whatsapp))
    <div class="fixed right-0 top-1/2 z-40 hidden -translate-y-1/2 flex-col gap-2 rounded-l-xl bg-white/10 p-2 backdrop-blur-sm lg:flex border border-white/20 shadow-lg transition-all duration-300">
        @if(!empty($instagram))
            <a href="{{ $instagram }}" target="_blank" class="group relative flex h-10 w-10 items-center justify-center rounded-lg bg-white text-wood-dark transition-all hover:bg-wood-dark hover:text-white" title="Instagram">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-instagram"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg>
            </a>
        @endif

        @if(!empty($tiktok))
            <a href="{{ $tiktok }}" target="_blank" class="group relative flex h-10 w-10 items-center justify-center rounded-lg bg-white text-wood-dark transition-all hover:bg-wood-dark hover:text-white" title="TikTok">
               <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-music-2"><circle cx="8" cy="18" r="4"/><path d="M12 18V2l7 4"/></svg>
            </a>
        @endif

         @if(!empty($facebook))
            <a href="{{ $facebook }}" target="_blank" class="group relative flex h-10 w-10 items-center justify-center rounded-lg bg-white text-wood-dark transition-all hover:bg-wood-dark hover:text-white" title="Facebook">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-facebook"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
            </a>
        @endif

        @if(!empty($whatsapp))
            <a href="https://wa.me/{{ $whatsapp }}" target="_blank" class="group relative flex h-10 w-10 items-center justify-center rounded-lg bg-[#25D366] text-white transition-all hover:bg-[#20bd5a]" title="WhatsApp">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-message-circle"><path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"/></svg>
            </a>
        @endif
    </div>
@endif
