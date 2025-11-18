@extends('layouts.app')

@section('title',  $blog->title)

@section('meta')
    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Basic Meta Tags -->
    <meta name="description" content="{{ Str::limit(strip_tags($blog->content), 150) }}">
    <meta name="author" content="SamajSathi Team">
    <meta name="keywords" content="SamajSathi Blog, {{$blog->keywords}}">

    <!-- Open Graph / Facebook -->
    <meta property="og:title" content="{{ $blog->title }} | SamajSathi">
    <meta property="og:description" content="{{ Str::limit(strip_tags($blog->content), 150) }}">
    <meta property="og:image" content="{{ asset('storage/' . $blog->image) }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="article">
    <meta property="og:site_name" content="SamajSathi">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $blog->title }} | SamajSathi">
    <meta name="twitter:description" content="{{ Str::limit(strip_tags($blog->content), 150) }}">
    <meta name="twitter:image" content="{{ asset('storage/' . $blog->image) }}">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:site" content="@SamajSathiOfficial">

    <!-- SEO / Mobile Optimization -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="index, follow">

    <!-- Open Graph Image Size -->
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">

    <!-- Schema Markup -->
 <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Article",
      "headline": "{{ $blog->title }}",
      "description": "{{ Str::limit(strip_tags($blog->content), 150) }}",
      "image": "{{ asset('storage/' . $blog->image) }}",
      "author": {
        "@type": "Person",
        "name": "Admin"
      },
      "publisher": {
        "@type": "Organization",
        "name": "SamajSathi blog",
        "logo": {
          "@type": "ImageObject",
          "url": "http://samajsathi.techsathi.it/images/logo.png"
        }
      },
      "datePublished": "{{ $blog->created_at->toIso8601String() }}",
      "dateModified": "{{ $blog->updated_at->toIso8601String() }}"
    }
 </script>
@endsection

@section('content')
    <div class="container mt-4">
        <h1 class="text-center">{{ $blog->title }}</h1>
        <small class="d-block text-center mb-3">{{ $blog->created_at->format('d M Y h:i A') }}</small>
        <small></small>
        <hr>

        <div class="row justify-content-around">
            <div class="col-md-8">
                <div class="text-center mb-4">
                    <img src="{{ asset('storage/' . $blog->image) }}" class="img-fluid rounded" alt="{{ $blog->title }}">
                </div>

                <article class="mb-4">
                    @if($blog->content != strip_tags($blog->content))
                        {!! $blog->content !!}
                    @else
                        {!! nl2br(e($blog->content)) !!}
                    @endif
                </article>
                <small><b>Keywords :</b> {!! $blog->keywords !!}</small>

                <div class="d-flex justify-content-end mb-3">
                    <span class="me-3 text-primary"><i class="fas fa-eye"></i> {{ $blog->views }}</span>
                    <span class="text-danger"><i class="fas fa-heart"></i> {{ $blog->likes }}</span>
                </div>

                <div class="text-center mt-4">
                    <button class="btn btn-primary rounded-pill like-btn" data-id="{{ $blog->id }}">
                        👍 Like <span class="like-count">{{ $blog->likes }}</span>
                    </button>
            
                    <button class="btn btn-success rounded-pill share-btn" data-url="{{ url()->current() }}">
                        🔗 Share
                    </button>
                </div>
            </div>

            <div class="col-md-3 mt-5">
                @foreach($blogs as $post)
                    <div class="card shadow-sm mb-3">
                        <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->title }}" style="height: 120px; object-fit: cover;">
                        <div class="card-body">
                            <h6 class="card-title"><a href="{{ route('blog.show', $post->id) }}" class="text-dark">{{ $post->title }}</a></h6>
                            <div class="d-flex justify-content-between">
                                <small>❤️ {{ $post->likes }}</small>
                                <small>👁️ {{ $post->views }}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.querySelectorAll(".like-btn").forEach((button) => {
                button.addEventListener("click", function () {
                    let blogId = this.getAttribute("data-id");
    
                    fetch(`/blog/${blogId}/like`, {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
                        },
                        body: JSON.stringify({})
                    })
                    .then(response => response.json())
                    .then(data => {
                        this.querySelector(".like-count").textContent = data.likes;
                    })
                    .catch(error => console.error("Error:", error));
                });
            });

            document.querySelectorAll(".share-btn").forEach((button) => {
                button.addEventListener("click", function () {
                    let blogUrl = this.getAttribute("data-url");

                    if (navigator.share) {
                        navigator.share({
                            title: document.title,
                            text: "Check out this amazing blog!",
                            url: blogUrl
                        }).then(() => {
                            console.log("Thanks for sharing!");
                        }).catch(console.error);
                    } else {
                        // Fallback for unsupported browsers
                        prompt("Copy this link and share:", blogUrl);
                    }
                });
            });
        });
    </script>
@endsection

@push('styles')
<style>
    .btn {
        border-radius: 50px; /* Smooth round buttons */
    }
    .page-header {
        font-size: 12px;
        background: radial-gradient(circle, rgba(212,55,27,0.85), rgba(241,64,168,0.7));
        border-radius: 8px;
        padding: 10px;
    }

    .icon {
        margin: 0 10px;
        cursor: pointer;
        transition: transform 0.2s, color 0.2s;
    }

    .icon:hover {
        transform: scale(1.2);
    }

    @media (max-width: 768px) {
        .container {
            font-size: 14px;
        }
    }
</style>
@endpush