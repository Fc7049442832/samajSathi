{{-- @extends('layouts.app')
@section('content')

<div class="container" style="margin-left: -20px; ">
    
    <!-- Hero Section -->
    <div class="hero-section">
        <h1>About Samaj Sathi Matrimony</h1>
        <p>Welcome to Samaj Sathi Matrimony, your trusted partner in finding your perfect match. <br> Our platform makes it easy to connect, chat, and build meaningful relationships.</p>
    </div>

    <!-- Features Section -->
    <div class="features-section">
        <div class="feature-card">
            <i class="bi bi-people-fill"></i>
            <h3>Find Your Ideal Match</h3>
            <p>Explore profiles based on your preferences and connect with like-minded individuals.</p>
        </div>
        <div class="feature-card">
            <i class="bi bi-chat-dots-fill"></i>
            <h3>Secure Chat</h3>
            <p>Communicate securely with your potential match through our in-built chat feature.</p>
        </div>
        <div class="feature-card">
            <i class="bi bi-file-earmark-pdf-fill"></i>
            <h3>Create Biodata</h3>
            <p>Generate a personalized biodata and download it as a PDF for easy sharing.</p>
        </div>
        <div class="feature-card">
            <i class="bi bi-bookmark-heart-fill"></i>
            <h3>Save Favorite Profiles</h3>
            <p>Bookmark profiles to keep track of your preferred matches.</p>
        </div>
    </div>

    <!-- Call to Action Section -->
    <div class="cta-section">
        <h2>Join Samaj Sathi Matrimony Today!</h2>

        @if(!Auth::check())
        <a href="#" class="btn btn-primary register-button" data-bs-toggle="modal" data-bs-target="#RegisterModal">
            Get Started
        </a>
        @elseif(Auth::check() && session('profileCompletion') < 40)
         <a href="{{route('profile')}}">Get Started </a>
         @elseif(Auth::check() && session('profileCompletion') > 41)
         <a href="{{route('matching')}}">Get Started</a>
        @endif

        
    </div>
</div>
<style>
    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }
    .hero-section {
        text-align: center;
        background:linear-gradient(#ea2300,#8c00ea);
        color: #fff;
        padding: 50px 20px;
    }

    .hero-section h1 {
        font-size: 3rem;
        margin-bottom: 10px;
    }

    .hero-section p {
        font-size: 1.2rem;
        line-height: 1.6;
    }

    .features-section {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-top: 40px;
    }

    .feature-card {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        text-align: center;
    }

    .feature-card i {
        font-size: 2rem;
        color: #6200ea;
        margin-bottom: 15px;
    }

    .feature-card h3 {
        font-size: 1.5rem;
        margin-bottom: 10px;
    }

    .feature-card p {
        font-size: 1rem;
        line-height: 1.5;
    }

    .cta-section {
        background:linear-gradient(#ea2300,#8c00ea);
        color: #fff;
        padding: 40px 20px;
        text-align: center;
        margin-top: 40px;
        border-radius: 8px;
    }

    .cta-section h2 {
        font-size: 2rem;
        margin-bottom: 20px;
    }

    .cta-section a {
        text-decoration: none;
        background: #fff;
        color: #6200ea;
        padding: 10px 20px;
        font-size: 1rem;
        border-radius: 5px;
        font-weight: bold;
        transition: background 0.3s, color 0.3s;
    }

    .cta-section a:hover {
        background: #fff5e6;
    }
</style>
@endsection --}}



@extends('layouts.app')

@section('title', 'About Samaj Sathi Matrimony | Find Your Perfect Match')

@section('meta')
<meta name="description" content="Samaj Sathi Matrimony is India's leading matchmaking platform. Find your perfect life partner with verified profiles, secure chat, and advanced matchmaking.">
<meta name="keywords" content="matrimony, matchmaking, life partner, best matrimonial site, samaj sathi, marriage, wedding">
@endsection

@section('content')

<!-- Hero Section -->
<div class="hero-section text-center">
    <h1>About Samaj Sathi Matrimony</h1>
    <p>Find your perfect life partner with our trusted and secure matchmaking platform.</p>
</div>

<!-- Features Section -->
<div class="features-section container">
    <div class="row">
        <div class="col-md-3 feature-card">
            <i class="bi bi-people-fill"></i>
            <h3>Find Your Ideal Match</h3>
            <p>Explore verified profiles and connect with like-minded individuals.</p>
        </div>
        <div class="col-md-3 feature-card">
            <i class="bi bi-chat-dots-fill"></i>
            <h3>Secure Chat</h3>
            <p>Communicate privately with potential matches through our secure chat system.</p>
        </div>
        <div class="col-md-3 feature-card">
            <i class="bi bi-file-earmark-pdf-fill"></i>
            <h3>Create Biodata</h3>
            <p>Generate a personalized biodata and download it as a PDF for easy sharing.</p>
        </div>
        <div class="col-md-3 feature-card">
            <i class="bi bi-bookmark-heart-fill"></i>
            <h3>Save Favorite Profiles</h3>
            <p>Bookmark profiles and keep track of your preferred matches.</p>
        </div>
    </div>
</div>

<!-- Blog Section -->
<div class="blog-section text-center">
    <h2 class="text-primary">Explore Our Blog</h2>
    <p>Discover love stories, relationship tips, marriage advice, and much more.</p>

    <div class="row justify-content-center">
        <div class="col-md-3 blog-card">
            <h3>Love Stories</h3>
            <p>Read inspiring real-life love stories of couples who found their perfect match.</p>
            <a href="{{ route('blog.filter', ['category' => 'stories']) }}" class="btn btn-secondary">Read More</a>

        </div>
        <div class="col-md-3 blog-card">
            <h3>Relationship Tips</h3>
            <p>Get expert advice on building strong and lasting relationships.</p>
            <a href="{{ route('blog.filter',['category'=>'tips']) }}" class="btn btn-secondary">Read More</a>
        </div>
        <div class="col-md-3 blog-card">
            <h3>Marriage Advice</h3>
            <p>Learn how to create a happy and fulfilling marriage with our expert advice.</p>
            <a href="{{ route('blog.filter',['category'=>'advice']) }}" class="btn btn-secondary">Read More</a>
        </div>
    </div>
</div>

<!-- Call to Action Section -->
<div class="cta-section text-center">
    <h2>Join Samaj Sathi Matrimony Today!</h2>

    @if(!Auth::check())
        <a href="#" class="btn btn-primary register-button" data-bs-toggle="modal" data-bs-target="#RegisterModal">
            Get Started
        </a>
    @elseif(Auth::check() && session('profileCompletion') < 40)
        <a href="{{ route('profile') }}" class="btn btn-primary">Complete Profile</a>
    @elseif(Auth::check() && session('profileCompletion') > 41)
        <a href="{{ route('matching') }}" class="btn btn-primary">Find Matches</a>
    @endif
</div>

@endsection
<style>
    /* General Styles */
    h2 {
        color: #e40000;
    }

    /* Hero Section */
    .hero-section {
        background: url("{{asset('images/couple2.jpeg')}}") no-repeat center center/cover;
        color: white;
        padding: 80px 20px;
    }
    .hero-section h1 {
        font-size: 2.5rem;
    }
    .hero-section p {
        font-size: 1.2rem;
    }

    /* Features Section */
    .features-section {
        padding: 50px 0;
        text-align: center;
    }
    .feature-card {
        padding: 20px;
        background: rgb(238, 255, 230);
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }
    .feature-card i {
        font-size: 80px;
        padding: 4px;
        color: #ff433d;
    }

    /* Blog Section */
    .blog-section {
        background: rgba(208, 245, 237, 0.87);
        padding: 50px 20px;
    }
    .blog-card {
        background: #fff3f3;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        margin: 0px 10px 20px 10px;
    }
    .blog-card h3 {
        color: #d9534f;
    }

    /* CTA Section */
    .cta-section {
        /* background: #d9534f; */
        color: white;
        padding: 50px 20px;
    }
    .cta-section .btn-primary {
        width: 200px;
        align-items: center;
        background: white;
        color: #d9534f;
        font-weight: bold;
        padding: 12px 20px;
        border-radius: 30px;
    }

    .features-section {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-top: 40px;
    }
</style>