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
    <meta property="og:url" content="https://samajsathi.techsathi.it/images/blog_hero.jpg">
    <meta property="og:type" content="website">

    <!-- Twitter Card for Better Sharing -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Samaj Sathi Matrimony Blog | Expert Tips & Success Stories">
    <meta name="twitter:description" content="Discover matchmaking tips, relationship guidance, and inspiring success stories on the Samaj Sathi Matrimony blog.">
    <meta name="twitter:image" content="https://samajsathi.techsathi.it/images/blog_hero.jpg">

    <!-- Canonical URL (Prevents Duplicate Content Issues) -->
    <link rel="canonical" href="https://samajsathi.techsathi.it/images/blog_hero.jpg">

    <!-- Robots Meta Tag (Ensure search engine indexing) -->
    <meta name="robots" content="index, follow">
    {{-- schema file include --}}
    @include('partials.schema-home')
@endsection

@section('content')

    <div class="row">
        <div class="col-12 blog-cover">
            <img src="{{ asset('images/cover_blog_page.jpg')}}" alt="" srcset="">
        </div>
        <div class="row">
            <div class="col-12 pt-3">
                <h1>Samaj Sathi Media</h1>
                
                <h4><a href="{{route('blog')}}" style="text-decoration: none; color:black;">Tips, Stories & Relationship Advice!</a></h4>
            </div>
            <div class="col-6 p-3 pt-2 ml-2 pb-1 ">
                <i class="bi bi-people" style="font-size: 1.5rem;"></i>
                <span id="follower-count"></span>
            </div>
            <div class="col-6 text-end p-2 pb-1">
                
                <button class="btn share-btn" data-url="{{ url()->current() }}">
                    <i class="bi bi-share icon" title="Share" style="margin-right:2px;"></i> <b>Share</b>
                </button>
               <!-- Follow Button -->
                <button type="button" class="btn btn-info text-white" id="followButton">
                    Follow
                </button>

                <!-- Custom Popup -->
                <div id="customPopup" style="
                    display: none;
                    position: fixed;
                    top: 30%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    background: white;
                    padding: 20px;
                    box-shadow: 0px 0px 10px rgba(0,0,0,0.3);
                    border-radius: 10px;
                    z-index: 9999;
                    width: 300px;
                ">
                    <input type="email" id="email1" name="email" class="form-control mb-2" placeholder="Enter your email">
                    
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-secondary me-2" id="closePopup">Close</button>
                        <button class="btn btn-primary" id="submitEmail">Submit</button>
                    </div>
                </div>
            </div>
        </div>
        <style>
            .blog-cover img {
                width: 100%;
                height: 198px;
            }
            h1{
                font-size: 28px;
                font-family: 'Times New Roman', Times, serif;
                font-weight: 500;
            }
            h4{
                font-size: 16px;
            }

            /* For tablets and below */
            @media (max-width: 768px) {
                .blog-cover img {
                    height: 140px;
                }
            }

            /* For mobile phones */
            @media (max-width: 480px) {
                .blog-cover img {
                    height: 98px;
                }
            }
        </style>

    </div>
    <hr>

    <div class="row justify-content-end">
        <div class="col-8">
            <marquee behavior="" direction="">
                Welcome to Samajsathi Media Blog – Your source for inspiring stories, helpful tips, and trusted advice. Stay tuned for regular updates and insights from our vibrant community!
            </marquee>
        </div>
        <div class="col-4">
            <select id="categorySelect" name="category" class="form-select w-auto" onchange="filterBlogs()">
                <option class="bg-white text-dark" value="" selected>All Categories</option>
                <option class="bg-white text-dark" value="tips">Tips</option>
                <option class="bg-white text-dark" value="stories">Stories</option>
                <option class="bg-white text-dark" value="advice">Advices</option>
            </select>
        </div>
    </div>

    
    <div class="row mt-3">
        @foreach ($blogs as $post)
            <div class="col-6 col-lg-4 col-xl-3 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card shadow-sm border-0 rounded-lg">
                    <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top rounded-top" alt="{{ $post->title }}" height="160px" style="object-fit: cover;">

                    <div class="card-body">
                        <h6 class="card-title">
                            <a href="{{ route('blog.show', $post->id) }}" class="text-dark text-decoration-none">
                                {{ Str::limit($post->title, 50) }}
                            </a>
                        </h6>

                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-secondary">👁️ {{ $post->views }}</span>

                            <span class="text-danger">❤️ {{ $post->likes }}</span>
                            <button class="btn share-btn" data-url="{{ route('blog.show', $post->id) }}">
                                <i class="bi bi-share icon" title="Share"></i>
                            </button>
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
   
        function animateFollowers(target, elementId, duration = 1000) {
          const element = document.getElementById(elementId);
          let start = 0;
          const increment = target / (duration / 10);
      
          const counter = setInterval(() => {
            start += increment;
            if (start >= target) {
              start = target;
              clearInterval(counter);
            }
            element.innerText = `${Math.floor(start)} Followers`;
          }, 10);
        }
      
        // Trigger the animation on page load
        let followers = @json($followers);
        window.addEventListener('DOMContentLoaded', () => {
            animateFollowers(followers, 'follower-count', 1500);
        });
    
    
    const followBtn = document.getElementById('followButton');
    const popup = document.getElementById('customPopup');
    const closeBtn = document.getElementById('closePopup');
    const submitBtn = document.getElementById('submitEmail');

    // Show popup on Follow button click
    followBtn.addEventListener('click', () => {
        popup.style.display = 'block';
    });

    // Close popup on Close button click
    closeBtn.addEventListener('click', () => {
        popup.style.display = 'none';
    });

    // Submit email via fetch
    submitBtn.addEventListener('click', function () {
        const email = document.getElementById('email1').value;
        // console.log('Email is :',email);
        
        // if (email.trim() === '') {
        //     alert('Please enter your email!');
        //     return;
        // }

        fetch("{{ route('submit.email') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({ email: email })
        })
        .then(res => res.json())
        .then(data => {
            alert(data.message);
            if (data.success) {
                popup.style.display = 'none';
                document.getElementById('email').value = '';
            }
        })
        .catch(err => {
            console.error(err);
            alert('Something went wrong!');
        });
    });


    </script>
      
@endsection