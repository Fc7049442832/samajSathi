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
  <meta property="og:image" content="https://samajsathi.techradar.site/images/marriage-preview.jpg"> <!-- Update with the actual image URL -->
  <meta property="og:url" content="https://samajsathi.techradar.site">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="SamajSathi">
  
  <!-- Twitter Card Meta Tags -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="SamajSathi - Connecting Hearts, Building Relationships">
  <meta name="twitter:description" content="Find your life partner on SamajSathi! A trusted platform for meaningful matchmaking and lasting bonds. Start your journey now!">
  <meta name="twitter:image" content="https://samajsathi.techradar.site/images/marriage-preview.jpg"> <!-- Update with the actual image URL -->
  <meta name="twitter:url" content="https://samajsathi.techradar.site">

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
      "url": "https://samajsathi.techradar.site",
      "logo": "{{ asset('images/logo.png') }}"
    }
    </script>
@endsection



@section('content')
    <x-carousel :images="$data" />
    <x-search-partner />
    <x-show-partner :users="$combinedUsers" />
    <x-registration-step />
   
    <x-game-section />
    
   
    <x-blog :blog="$blogs" />

    <x-QuestionsBox />
    <x-FeedbackForm :images="$feedback" />

@endsection

