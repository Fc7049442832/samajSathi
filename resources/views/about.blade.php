@extends('layouts.app')

@section('title', 'Samaj Sathi Matrimony | Find Your Perfect Match | Tech Sathi Matrimony')

@section('meta')
<meta name="description" content="Find your perfect life partner at Samaj Sathi Matrimony. India's trusted matchmaking site offering verified profiles, secure chat, biodata creation, and real love stories. Also explore Tech Sathi for modern matchmaking.">
<meta name="keywords" content="Samaj Sathi Matrimony, Tech Sathi Matrimony, Best Matrimony Site, Find Life Partner, Indian Matrimony, Matchmaking, Marriage, Wedding, Relationship Tips, Love Stories, Biodata Creation">
<meta name="robots" content="index, follow">
<link rel="canonical" href="{{ url()->current() }}">
@endsection

@section('content')

<!-- Hero Section -->
<section class="hero-section text-center">
    <div class="container">
        <h1>Welcome to Samaj Sathi Matrimony</h1>
        <p>Find your perfect life partner with India's most trusted and secure matchmaking platform - Samaj Sathi and Tech Sathi Matrimony.</p>
    </div>
</section>

<!-- Features Section -->
<section class="features-section container">
    <h2 class="text-center mb-5">Why Choose Samaj Sathi?</h2>
    <div class="row">
        <div class="col-md-3 feature-card">
            <i class="bi bi-people-fill" aria-hidden="true"></i>
            <h3>Find Your Ideal Match</h3>
            <p>Explore 1000+ verified profiles and connect with like-minded individuals for marriage through Samaj Sathi Matrimony.</p>
        </div>
        <div class="col-md-3 feature-card">
            <i class="bi bi-chat-dots-fill" aria-hidden="true"></i>
            <h3>Secure Chat System</h3>
            <p>Communicate safely with your matches using our end-to-end encrypted chat platform at Tech Sathi Matrimony.</p>
        </div>
        <div class="col-md-3 feature-card">
            <i class="bi bi-file-earmark-pdf-fill" aria-hidden="true"></i>
            <h3>Easy Biodata Creation</h3>
            <p>Quickly create and download a beautiful biodata PDF to share with families and relatives.</p>
        </div>
        <div class="col-md-3 feature-card">
            <i class="bi bi-bookmark-heart-fill" aria-hidden="true"></i>
            <h3>Save Favorite Profiles</h3>
            <p>Bookmark and manage your favorite profiles for easy reference anytime.</p>
        </div>
    </div>
</section>

<!-- Blog Section -->
<section class="blog-section text-center">
    <h2>Explore Love, Relationships & Marriage Tips</h2>
    <p>Learn from inspiring love stories, expert relationship advice, and marriage preparation tips at Samaj Sathi Matrimony.</p>

    <div class="row justify-content-center mt-4">
        <div class="col-md-3 blog-card">
            <h3>Love Stories</h3>
            <p>Real success stories from Samaj Sathi and Tech Sathi couples who found love online.</p>
            <a href="{{ route('blog.filter', ['category' => 'stories']) }}" class="btn btn-secondary">Read More</a>
        </div>
        <div class="col-md-3 blog-card">
            <h3>Relationship Tips</h3>
            <p>Strengthen your relationship with expert guidance and proven strategies for success.</p>
            <a href="{{ route('blog.filter', ['category' => 'tips']) }}" class="btn btn-secondary">Read More</a>
        </div>
        <div class="col-md-3 blog-card">
            <h3>Marriage Advice</h3>
            <p>Prepare for a fulfilling marriage life with advice from experienced counselors and real couples.</p>
            <a href="{{ route('blog.filter', ['category' => 'advice']) }}" class="btn btn-secondary">Read More</a>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="cta-section text-center">
    <h2>Start Your Journey with Samaj Sathi Matrimony</h2>

    @guest
        <a href="#" class="btn btn-primary register-button" data-bs-toggle="modal" data-bs-target="#RegisterModal">
            Register Now
        </a>
    @else
        @if(session('profileCompletion') < 40)
            <a href="{{ route('profile') }}" class="btn btn-primary">Complete Your Profile</a>
        @else
            <a href="{{ route('matching') }}" class="btn btn-primary">Find Your Match</a>
        @endif
    @endguest
</section>

@endsection

<style>
/* General */
h2 {
    color: #e40000;
}

/* Hero Section */
.hero-section {
    background: url("{{ asset('images/couple2.jpeg') }}") no-repeat center center/cover;
    color: white;
    padding: 80px 20px;
}
.hero-section h1 {
    font-size: 2.8rem;
    font-weight: bold;
}
.hero-section p {
    font-size: 1.3rem;
}

/* Features Section */
.features-section {
    padding: 60px 0;
    text-align: center;
}
.feature-card {
    background: #f9f9f9;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
    margin-bottom: 20px;
}
.feature-card i {
    font-size: 3rem;
    margin-bottom: 10px;
    color: #ff433d;
}

/* Blog Section */
.blog-section {
    background: #f1f9f7;
    padding: 50px 20px;
}
.blog-card {
    background: #fff3f3;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
    margin: 10px;
}
.blog-card h3 {
    color: #d9534f;
}

/* CTA Section */
.cta-section {
    background: linear-gradient(#ffe46b, #4df3ff);
    color: white;
    padding: 50px 20px;
}
.cta-section .btn-primary {
    background: white;
    color: #d9534f;
    font-weight: bold;
    border-radius: 30px;
    width: 220px;
    padding: 12px;
}
</style>