@extends('layouts.app')

@section('title', 'Samaj Sathi Matrimony Blog | Expert Tips & Success Stories')

@section('meta')
    <!-- Meta Description for SEO -->
    <meta name="description" content="Read expert matchmaking tips, relationship advice, wedding trends, and inspiring success stories on the Samaj Sathi Matrimony blog.">

    <!-- SEO Keywords -->
    <meta name="keywords" content="matrimony blog, relationship advice, matchmaking tips, wedding trends, marriage success stories, samaj sathi, life partner search">

    <!-- Open Graph Meta Tags for Social Media -->
    <meta property="og:title" content="Samaj Sathi Matrimony Blog | Expert Tips & Success Stories">
    <meta property="og:description" content="Explore expert matchmaking advice, relationship tips, and real success stories on the Samaj Sathi Matrimony blog.">
    <meta property="og:image" content="https://samajsathi.techsathi.it/images/blog_hero.jpg">
    <meta property="og:url" content="https://samajsathi.techsathi.it/images/blog_hero.jpg">
    <meta property="og:type" content="website">

    <!-- Twitter Card Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Samaj Sathi Matrimony Blog | Expert Tips & Success Stories">
    <meta name="twitter:description" content="Discover matchmaking tips, relationship guidance, and inspiring success stories on the Samaj Sathi Matrimony blog.">
    <meta name="twitter:image" content="https://samajsathi.techsathi.it/images/blog_hero.jpg">

    <!-- Canonical URL -->
    <link rel="canonical" href="https://samajsathi.techsathi.it/images/blog_hero.jpg">

    <!-- Robots Meta Tag -->
    <meta name="robots" content="index, follow">

    {{-- Include Schema Markup --}}
    @include('partials.schema-blog')
@endsection

@section('content')

<div class="row">
    <!-- Blog Cover Image -->
    <div class="col-12 blog-cover">
        <img src="{{ asset('images/cover_blog_page.jpg') }}" alt="Samaj Sathi Blog Cover" class="img-fluid">
    </div>

    <!-- Header Section -->
    <div class="row">
        <div class="col-12 pt-3">
            <h1>Samaj Sathi Media</h1>
            <h4>
                <a href="{{ route('blog') }}" class="text-decoration-none text-dark">Tips, Stories & Relationship Advice!</a>
            </h4>
        </div>

        <!-- Followers Count and Buttons -->
        <div class="col-6 p-3 pt-2">
            <i class="bi bi-people" style="font-size: 1.5rem;"></i>
            <span id="follower-count"></span>
        </div>
        <div class="col-6 text-end p-2">
            <!-- Share Button -->
            <button class="btn share-btn" data-url="{{ url()->current() }}">
                <i class="bi bi-share icon" title="Share"></i> <b>Share</b>
            </button>

            <!-- Follow Button -->
            <button type="button" class="btn btn-info text-white" id="followButton">
                Follow
            </button>

            <!-- Custom Popup Modal -->
            <div id="customPopup" class="custom-popup">
                <input type="email" id="email1" name="email" class="form-control mb-2" placeholder="Enter your email">
                <div class="d-flex justify-content-end">
                    <button class="btn btn-secondary me-2" id="closePopup">Close</button>
                    <button class="btn btn-primary" id="submitEmail">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Marquee and Category Filter -->
<hr>
<div class="row justify-content-end">
    <div class="col-8">
        <marquee>Welcome to Samajsathi Media Blog – Your source for inspiring stories, helpful tips, and trusted advice. Stay tuned for regular updates and insights from our vibrant community!</marquee>
    </div>
    <div class="col-4">
        <select id="categorySelect" name="category" class="form-select w-auto" onchange="filterBlogs()">
            <option value="" selected>All Categories</option>
            <option value="tips">Tips</option>
            <option value="stories">Stories</option>
            <option value="advice">Advice</option>
        </select>
    </div>
</div>

<!-- Blog Post Grid -->
<div class="row mt-3" id="blog-container">
    {{-- Initial posts yahin dikh rahe hain --}}
</div>

<div class="text-center my-4" id="loader" style="display: none;">
    <div class="spinner-border text-primary"></div>
</div>

<!-- Styles -->
<style>
    .blog-cover img {
        width: 100%;
        height: 198px;
        object-fit: cover;
    }
    h1 {
        font-size: 28px;
        font-family: 'Times New Roman', Times, serif;
        font-weight: 500;
    }
    h4 {
        font-size: 16px;
    }
    .custom-popup {
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
    }
    @media (max-width: 768px) {
        .blog-cover img {
            height: 140px;
        }
    }
    @media (max-width: 480px) {
        .blog-cover img {
            height: 98px;
        }
    }
</style>

<!-- Scripts -->

<script>
    let offset = 0;
    const limit = 4;
    let isLoading = false;

    function fetchMoreBlogs() {
        if (isLoading) return;
        isLoading = true;
        document.getElementById('loader').style.display = 'block';

        fetch(`/load-more-blogs?offset=${offset}&limit=${limit}`)
            .then(response => response.json())
            .then(blogs => {
                const container = document.getElementById('blog-container');

                blogs.forEach(post => {
                    const col = document.createElement('div');
                    col.className = "col-6 col-lg-4 col-xl-3 mb-4";
                    col.innerHTML = `
                        <div class="card shadow-sm border-0 rounded-lg" data-aos="fade-up" data-aos-delay="100">
                            <img src="${post.image ? '/storage/' + post.image : '/images/default_blogs.jpg'}" 
                                class="card-img-top rounded-top" 
                                alt="${post.title}" 
                                style="object-fit: cover; height: 160px;">
                            <div class="card-body">
                                <h6 class="card-title">
                                    <a href="/blog/${post.id}" class="text-dark text-decoration-none">
                                        ${post.title.length > 50 ? post.title.slice(0, 47) + '...' : post.title}
                                    </a>
                                </h6>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-secondary">👁️ ${post.views}</span>
                                    <span class="text-danger">❤️ ${post.likes}</span>
                                    <button class="btn share-btn" data-url="/blog/${post.id}">
                                        <i class="bi bi-share icon" title="Share"></i>
                                    </button>
                                </div>
                            </div>
                        </div>`;
                    container.appendChild(col);
                });

                offset += limit;
                isLoading = false;
                document.getElementById('loader').style.display = 'none';

                if (blogs.length === 0) {
                    window.removeEventListener('scroll', handleScroll);
                }
            });
    }

    function handleScroll() {
        const scrollTop = window.scrollY;
        const windowHeight = window.innerHeight;
        const fullHeight = document.body.offsetHeight;

        if ((scrollTop + windowHeight) >= fullHeight * 0.4) {
            fetchMoreBlogs();
        }
    }

    window.addEventListener('scroll', handleScroll);

    // Initial load
    fetchMoreBlogs();
</script>

<script>
    // Filter blogs based on category selection
    function filterBlogs() {
        const category = document.getElementById("categorySelect").value;
        const url = "{{ route('blog.filter') }}";
        window.location.href = category ? `${url}?category=${category}` : url;
    }

    // Animate followers count
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

    // Trigger followers animation on page load
    window.addEventListener('DOMContentLoaded', () => {
        let followers = @json($followers);
        animateFollowers(followers, 'follower-count', 1500);
    });

    // Follow Button Logic (Popup Open/Close and Submit)
    const followBtn = document.getElementById('followButton');
    const popup = document.getElementById('customPopup');
    const closeBtn = document.getElementById('closePopup');
    const submitBtn = document.getElementById('submitEmail');

    followBtn.addEventListener('click', () => {
        popup.style.display = 'block';
    });

    closeBtn.addEventListener('click', () => {
        popup.style.display = 'none';
    });

    submitBtn.addEventListener('click', () => {
        const email = document.getElementById('email1').value.trim();

        if (!email) {
            alert('Please enter your email!');
            return;
        }

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
                document.getElementById('email1').value = '';
            }
        })
        .catch(err => {
            console.error(err);
            alert('Something went wrong! Please try again.');
        });
    });
</script>
@endsection