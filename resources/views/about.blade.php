@extends('layouts.app')
@section('content')

<div class="container">
    
    <!-- Hero Section -->
    <div class="hero-section">
        <h1>About Samaj Sathi Matrimony</h1>
        <p>Welcome to Samaj Sathi Matrimony, your trusted partner in finding your perfect match. Our platform makes it easy to connect, chat, and build meaningful relationships.</p>
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
        <a href="#">Get Started</a>
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
        background: #6200ea;
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
        background: #6200ea;
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
@endsection