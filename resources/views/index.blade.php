@extends('layouts.app')

@section('title', 'SamajSathi - Connecting Hearts, Building Relationships | Find Your Perfect Match')

@section('meta')
  <!-- Basic Meta Tags -->
  <meta name="description" content="SamajSathi is your trusted platform to connect with potential life partners, fostering meaningful relationships and long-lasting bonds. Start your journey with us today!">
  <meta name="author" content="Tech Radar">
  <meta name="keywords" content="SamajSathi, marriage platform, matchmaking, find life partner, matrimony, relationships, Tech Radar">
  
  <!-- Open Graph Meta Tags for Facebook and WhatsApp -->
  <meta property="og:title" content="SamajSathi - Connecting Hearts, Building Relationships">
  <meta property="og:description" content="Discover meaningful connections and find your perfect life partner on SamajSathi, the trusted matchmaking platform. Join us now!">
  <meta property="og:image" content="https://samajsathi.techsathi.it/images/marriage-preview.jpg"> <!-- Update with the actual image URL -->
  <meta property="og:url" content="https://samajsathi.techsathi.it">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="SamajSathi">
  
  <!-- Twitter Card Meta Tags -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="SamajSathi - Connecting Hearts, Building Relationships">
  <meta name="twitter:description" content="Find your life partner on SamajSathi! A trusted platform for meaningful matchmaking and lasting bonds. Start your journey now!">
  <meta name="twitter:image" content="https://samajsathi.techsathi.it/images/marriage-preview.jpg"> <!-- Update with the actual image URL -->
  <meta name="twitter:url" content="https://samajsathi.techsathi.it">

   <!-- Image Previews -->
   <meta property="og:image:width" content="600">
   <meta property="og:image:height" content="315">    
   <!-- Robots Meta Tag -->
   <meta name="robots" content="index, follow">

   <!-- Schema Markup for Google Rich Results -->
  <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "Samaj Sathi Matrimony",
      "url": "https://samajsathi.techsathi.it",
      "logo": "{{ asset('images/logo.png') }}"
    }
    </script>
@endsection

@section('content')

  <div id="page-loader" style="
  position: fixed;
  top: 0; left: 0;
  width: 100vw; height: 100vh;
  background: white;
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 2rem;
  font-family: sans-serif;
  z-index: 9999;
  ">
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

  <style>
    @keyframes blink {
  0%, 100% { opacity: 0; }
  50% { opacity: 1; }
}

#loader-text .char {
  animation: blink 1.2s infinite;
  display: inline-block;
}

#loader-text .char:nth-child(1) { animation-delay: 0s; }
#loader-text .char:nth-child(2) { animation-delay: 0.1s; }
#loader-text .char:nth-child(3) { animation-delay: 0.2s; }
#loader-text .char:nth-child(4) { animation-delay: 0.3s; }
#loader-text .char:nth-child(5) { animation-delay: 0.4s; }
#loader-text .char:nth-child(6) { animation-delay: 0.5s; }
#loader-text .char:nth-child(7) { animation-delay: 0.6s; }
#loader-text .char:nth-child(8) { animation-delay: 0.7s; }
#loader-text .char:nth-child(9) { animation-delay: 0.8s; }

  </style>

  <script>
    window.addEventListener('load', function () {
      const loader = document.getElementById('page-loader');
      loader.style.display = 'none';
    });
  </script>


    <x-carousel :images="$data" />
    <x-search-partner />
    <x-show-partner :users="$combinedUsers" />
    
    <div class="mt-4 custom-padding">
      <img src="{{ asset('images/Earn_by_Helping_Others.png') }}" alt="">
    </div>

    <x-registration-step />
   
    
    <x-blog :blog="$blogs" />
    <x-game-section />

    <x-QuestionsBox />
    <x-FeedbackForm :images="$feedback" />
@endsection