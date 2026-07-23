@php
    $rawId = trim($global_contact['google_analytics_id'] ?? '');
    $measurementId = preg_match('/^G-[A-Z0-9]+$/i', $rawId) ? $rawId : null;
@endphp

@if($measurementId)
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ $measurementId }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '{{ $measurementId }}');
    </script>
@endif
