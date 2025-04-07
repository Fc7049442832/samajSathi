@extends('layouts.app')
@section('title', '{{ $blog->title }} - SamajSathi')

@section('meta')

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Basic Meta Tags -->
    <meta name="description" content="{{ Str::limit(strip_tags($blog->content), 150) }}">
    <meta name="author" content="Tech Radar">
    <meta name="keywords" content="SamajSathi, matrimony, matchmaking, marriage advice, relationships, find life partner, marriage stories, wedding tips, Tech Radar">

    <!-- Open Graph Meta Tags for Facebook & WhatsApp -->
    <meta property="og:title" content="{{ $blog->title }} - SamajSathi">
    <meta property="og:description" content="{{ Str::limit(strip_tags($blog->content), 150) }}">
    <meta property="og:image" content="{{ asset('storage/' . $blog->image) }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="article">
    <meta property="og:site_name" content="SamajSathi">
    <meta property="og:locale" content="en_US">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $blog->title }} - SamajSathi">
    <meta name="twitter:description" content="{{ Str::limit(strip_tags($blog->content), 150) }}">
    <meta name="twitter:image" content="{{ asset('storage/' . $blog->image) }}">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:site" content="@techradar">
    <meta name="twitter:creator" content="@techradar">

    <!-- Mobile & SEO Optimizations -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Image Previews -->
    <meta property="og:image:width" content="600">
    <meta property="og:image:height" content="315">

    <!-- Robots Meta Tag -->
    <meta name="robots" content="index, follow">

   <!-- Schema Markup for Google Rich Results -->
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
            "name": "Samaj Sathi",
            "logo": {
                "@type": "ImageObject",
                "url": "http://samajsathi.techradar.site/images/logo.png"
            }
        },
        "datePublished": "{{ $blog->created_at->toIso8601String() }}",
        "dateModified": "{{ $blog->updated_at->toIso8601String() }}"
    }
   </script>
@endsection

@section('content')
        <h3>{{$blog->title}}</h3>
        <small>{{ \Carbon\Carbon::parse($blog->created_at)->format('d M Y h:i A') }}</small>
        <hr>
        <div class="row justify-content-around">
            <div class="col-md-8">
                {{-- image section code.. --}}
                <div class="row justify-content-center">
                    <div class="col-5 mb-4">
                        <img src="{{ asset('storage/' . $blog->image) }}" class="card-img-top" alt="{{ $blog->title }}">
                    </div>
                </div>
                <p>
                    {!! nl2br(e($blog->content)) !!}
                </p>
                <!-- Like & View Count -->
                <div class="d-flex justify-content-end mt-3">
                    <span class="text-primary"><i class="fas fa-eye"></i> {{ $blog->views }} </span>..
                    <span class="text-danger"><i class="fas fa-heart"></i> {{ $blog->likes }} </span>
                </div>

                <!-- Back Button -->
                <div class="text-center mt-3">
                    <button class="btn btn-primary like-btn" data-id="{{ $blog->id }}">
                        👍 Like <span class="like-count">{{ $blog->likes }}</span>
                    </button>
                    <button class="btn btn-success share-btn" data-url="{{ url()->current() }}">
                        🔗 Share
                    </button>
                    {{-- <a href="{{ route('pblog.index') }}" class="btn btn-primary">Back to Blogs</a> --}}
                </div>
            </div>
            {{--  --}}
            <div class="col-md-3 mt-5">
                @foreach($blogs as $post)
                <div class="card shadow-sm">
                    <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->title }}" style="height: 120px; width: 100%; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title"><a href="{{route('blog.show',$post->id)}}">{{ $post->title }}</a></h5>
                      
                        <div class="d-flex justify-content-between">
                            <span class="likes">❤️ {{ $post->likes }}</span>
                            <span class="views">👁️ {{ $post->views }}</span>
                        </div>
                    </div>
                </div>
                <hr>
                @endforeach
            </div>

        </div>
    
@endsection

<style>  
    #alert-box {
        position: fixed;
        top: 20px;
        right: 25px;
        z-index: 1050;
        padding: 8px;
        font-size:14px;
        border-radius: 5px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        background-color: #28a745; /* Success green */
        color: white;
        transition: opacity 0.5s ease-out;
    }

    .page-header{
        font-size: 12px;
        position: relative;
        background-image: radial-gradient(circle, rgba(212, 55, 27, 0.849), rgba(241, 64, 168, 0.7));
        border-radius:8px;
    }
    .page-header a {
        text-decoration: none;
        font-weight: 600;
    }

    /* icon for sytles */
    .icon {
        margin: 0 10px;
        cursor: pointer;
        transition: transform 0.2s, color 0.2s;
    }
    .icon:hover {
        transform: scale(1.2); /* Slightly enlarge on hover */
    }


    .main-content-container::-webkit-scrollbar {
        display: none; /* WebKit-based browsers (Chrome, Safari) ke liye scrollbar hide kare */
    }
    .footer{
        width: 85%;
        position: absolute;
        bottom: 0;
        justify-content: center;
        align-items: center;
    }

    @media (max-width: 768px) {
        *{
            font-size: 13px;
        }
        .page-header a {
            position: relative;
            font-size: 12px;
        }
        .main-content-container{
        height: 82%;
        width: 94%;
        position: absolute;
        top: 95px;
        overflow: hidden;
        overflow-y: scroll;
        padding-bottom: 0px;
        }

        .footer{
        width: 95%;
        }

    }
    /* Chat Box style */
    /* Hidden modal by default */
    #customModal {
        display: none;
        position: absolute;
        top: 100;
        left: 100px;
        width: 400px;
        height: 500px;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        border: 1px solid #ccc;
        border-radius: 8px;
        z-index: 1000;
    }
    /* Header of the modal (for dragging) */
    #modalHeader {
        cursor: move;
        padding: 10px;
        background-color: #007bff;
        color: white;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }
    /* Close button */
    #modalClose {
        position: absolute;
        top: 10px;
        right: 10px;
        background-color: red;
        color: white;
        border: none;
        border-radius: 50%;
        width: 25px;
        height: 25px;
        cursor: pointer;
        text-align: center;
    }
    /* Content of the modal */
    #modalContent {
        padding: 20px;
        height: calc(100% - 50px); /* Adjust height to exclude header */
    }
</style>

<script>
    // back Button function 
    function goBack() {
        if (window.history.length > 1) {
            window.history.back();
        } else {
            window.location.href = '/';
        }
    }

        document.addEventListener('DOMContentLoaded', () => {
            const alertBox = document.getElementById('alert-box');
            if (alertBox) {
                setTimeout(() => {
                    alertBox.style.opacity = '0'; // Fade out
                    setTimeout(() => {
                        alertBox.remove(); // Remove element
                    }, 500); // Wait for fade-out transition
                }, 5000); // Display for 5 seconds
            }
        });

        window.addEventListener('scroll', function() {
            const pageHeader = document.getElementByClass('page-header');

            if (window.scrollY > 10) {
                pageHeader.classList.add('active');
            } else {
                pageHeader.classList.add('deactive');
            }
        });

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
        });

        // Share Button code..
        document.addEventListener("DOMContentLoaded", function () {
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