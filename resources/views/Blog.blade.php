@extends('layouts.app')
@section('title', 'Samaj Sathi Matrimony Blog | Expert Tips & Success Stories')

@section('meta')
    <!-- Meta Description (SEO-friendly, under 160 characters) -->
    <meta name="description" content="Read expert matchmaking tips, relationship advice, wedding trends, and inspiring success stories on the Samaj Sathi Matrimony blog.">

    <!-- Keywords for SEO (Avoid stuffing, keep it natural) -->
    <meta name="keywords" content="matrimony blog, relationship advice, matchmaking tips, wedding trends, marriage success stories, samaj sathi, life partner search">

    <!-- Open Graph Meta Tags for Social Media -->
    <meta property="og:title" content="Samaj Sathi Matrimony Blog | Expert Tips & Success Stories">
    <meta property="og:description" content="Explore expert matchmaking advice, relationship tips, and real success stories on the Samaj Sathi Matrimony blog.">
    <meta property="og:image" content="URL_TO_FEATURED_IMAGE">
    <meta property="og:url" content="https://samajsathi.techradar.site/images/blog_hero.jpg">
    <meta property="og:type" content="website">

    <!-- Twitter Card for Better Sharing -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Samaj Sathi Matrimony Blog | Expert Tips & Success Stories">
    <meta name="twitter:description" content="Discover matchmaking tips, relationship guidance, and inspiring success stories on the Samaj Sathi Matrimony blog.">
    <meta name="twitter:image" content="https://samajsathi.techradar.site/images/blog_hero.jpg">

    <!-- Canonical URL (Prevents Duplicate Content Issues) -->
    <link rel="canonical" href="https://samajsathi.techradar.site/images/blog_hero.jpg">

    <!-- Robots Meta Tag (Ensure search engine indexing) -->
    <meta name="robots" content="index, follow">
    {{-- schema file include --}}
    @include('partials.schema-home')
@endsection

@section('content')

    <div class="row justify-content-between">
        <div class="col-6">
            <h4><a href="{{route('blog')}}" style="text-decoration: none; color:black;"> Tips, Stories & Relationship Advice!</a></h4>
        </div>
        <div class="col-md-4 mb-4 ">
            <select id="categorySelect" name="category" class="form-select w-auto" onchange="filterBlogs()">
                <option class="bg-white text-dark" value="" selected>All Categories</option>
                <option class="bg-white text-dark" value="tips">Tips</option>
                <option class="bg-white text-dark" value="stories">Stories</option>
                <option class="bg-white text-dark" value="advices">Advices</option>
            </select>
        </div>
    </div>
    <div class="row">
        @foreach ($blogs as $post)
            <div class="col-md-6 col-lg-4 col-xl-3 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card shadow-sm border-0 rounded-lg">
                    <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top rounded-top" alt="{{ $post->title }}" height="160px" style="object-fit: cover;">

                    <div class="card-body">
                        <h6 class="card-title">
                            <a href="{{ route('blog.show', $post->id) }}" class="text-dark text-decoration-none">
                                {{ Str::limit($post->title, 50) }}
                            </a>
                        </h6>

                        <p class="card-text text-muted">
                            @php
                                $words = explode(' ', $post->content);
                                $content = implode(' ', array_slice($words, 0, 20)) . (count($words) > 20 ? '...' : '');
                            @endphp
                            {{ $content }} <a href="{{ route('blog.show', $post->id) }}" class="text-primary">more</a>
                        </p>

                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-danger">❤️ {{ $post->likes }}</span>
                            
                            <button class="btn btn-outline-secondary btn-sm share-btn" data-url="{{ route('blog.show', $post->id) }}">
                                🔗 Share
                            </button>

                            <span class="text-secondary">👁️ {{ $post->views }}</span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <script>
        function filterBlogs() {
            var category = document.getElementById("categorySelect").value;
            var url = "{{ route('blog.filter') }}";
            // Redirect with category as URL parameter
            window.location.href = category ? url + "?category=" + category : url;
        }
    </script>
@endsection