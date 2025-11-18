@extends('layouts.app')

@section('title', 'SamajSathi - Connecting Hearts, Building Relationships | Find Your Perfect Match')

@section('meta')
    <!-- Basic SEO Meta Tags -->
    <meta name="description" content="SamajSathi is your trusted platform to connect with potential life partners, fostering meaningful relationships and long-lasting bonds. Start your journey with us today!">
    <meta name="author" content="Tech Radar">
    <meta name="keywords" content="SamajSathi, marriage platform, matchmaking, find life partner, matrimony, relationships, Tech Radar">

    <!-- Open Graph Meta Tags for Facebook, WhatsApp -->
    <meta property="og:title" content="SamajSathi - Connecting Hearts, Building Relationships">
    <meta property="og:description" content="Discover meaningful connections and find your perfect life partner on SamajSathi, the trusted matchmaking platform. Join us now!">
    <meta property="og:image" content="{{ asset('images/marriage-preview.jpg') }}">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="SamajSathi">
    <meta property="og:image:width" content="600">
    <meta property="og:image:height" content="315">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="SamajSathi - Connecting Hearts, Building Relationships">
    <meta name="twitter:description" content="Find your life partner on SamajSathi! A trusted platform for meaningful matchmaking and lasting bonds. Start your journey now!">
    <meta name="twitter:image" content="{{ asset('images/marriage-preview.jpg') }}">
    <meta name="twitter:url" content="{{ url('/') }}">

    <!-- Robots Meta Tag -->
    <meta name="robots" content="index, follow">

    <!-- Schema Markup for Organization (Google Rich Results) -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "Samaj Sathi Matrimony",
        "url": "{{ url('/') }}",
        "logo": "{{ asset('images/logo.png') }}",
        "sameAs": [
            "https://facebook.com/samajsathi",
            "https://twitter.com/samajsathi",
            "https://instagram.com/samajsathi"
        ]
    }
    </script>

    <!-- Page Loader Animation Style -->
    <style>
        @keyframes blink {
            0%, 100% { opacity: 0; }
            50% { opacity: 1; }
        }
        #loader-text .char {
            animation: blink 1.2s infinite;
            display: inline-block;
        }
        
        @for ($i = 1; $i <= 9; $i++)
            #loader-text .char:nth-child({{ $i }}) { animation-delay: {{ ($i - 1) * 0.1 }}s; }
        @endfor
    </style>
@endsection

@section('content')

    <!-- Page Loader -->
    <div id="page-loader" style="position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; background: white; display: flex; justify-content: center; align-items: center; font-size: 2rem; font-family: sans-serif; z-index: 9999;">
        <span id="loader-text">
            <span class="char">T</span>
            <span class="char">e</span>
            <span class="char">c</span>
            <span class="char">h</span>
            <span class="char">S</span>
            <span class="char">a</span>
            <span class="char">t</span>
            <span class="char">h</span>
            <span class="char">i</span>
        </span>
    </div>

    <!-- Hide loader after page load -->
    <script>
        window.addEventListener('load', function () {
            document.getElementById('page-loader').style.display = 'none';
        });
    </script>

    <!-- Components -->
    <x-carousel :images="$data" />
    <x-search-partner />
    <x-show-partner :users="$combinedUsers" />

    <div class="mt-4 custom-padding text-center">
        <img src="{{ asset('images/Earn_by_Helping_Others.png') }}" alt="Earn by Helping Others" class="img-fluid">
    </div>

    <x-registration-step />
    <x-blog :blog="$blogs" />
    <x-game-section />
    <x-QuestionsBox />
    <x-FeedbackForm :images="$feedback" />

@endsection