@extends('layouts.app')

@section('title', 'Contact Samaj Sathi Matrimony | Get in Touch')

@section('meta')
    <!-- Meta Description (SEO-friendly, under 160 characters) -->
    <meta name="description" content="Have questions? Contact Samaj Sathi Matrimony for support, partnership inquiries, or general assistance. We’re here to help!">

    <!-- Keywords for SEO -->
    <meta name="keywords" content="contact samaj sathi, matrimony support, matchmaking help, customer service, marriage queries, contact us, best matrimony site">

    <!-- Open Graph Meta Tags for Social Media -->
    <meta property="og:title" content="Contact Samaj Sathi Matrimony | Get in Touch">
    <meta property="og:description" content="Reach out to Samaj Sathi Matrimony for assistance, partnerships, or support. We are happy to help!">
    <meta property="og:image" content="{{ asset('images/contact-us-banner.jpg') }}">
    <meta property="og:url" content="{{ url('/contact') }}">
    <meta property="og:type" content="website">

    <!-- Twitter Card for Better Sharing -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Contact Samaj Sathi Matrimony | Get in Touch">
    <meta name="twitter:description" content="Have questions? Contact Samaj Sathi Matrimony for support and assistance.">
    <meta name="twitter:image" content="{{ asset('images/contact-us-banner.jpg') }}">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url('/contact') }}">

    <!-- Robots Meta Tag (Ensure search engine indexing) -->
    <meta name="robots" content="index, follow">

    {{-- Schema file include --}}
    {{-- @include('partials.schema-contact') --}}
@endsection

@section('content')
<div class="container mt-1">
    <h2 class="text-center mb-4">Get in Touch with Us</h2>
    
    <p class="text-center text-muted mb-4">
        Need help? Have a partnership inquiry? Contact our support team, and we'll get back to you as soon as possible.
    </p>

    <div class="row">
        <!-- Contact Form -->
        <div class="col-md-6">
            <form action="{{ route('contact.submit') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Your Name</label>
                    <input type="text" class="form-control" id="name" name="name" required placeholder="Enter your name">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Your Email</label>
                    <input type="email" class="form-control" id="email" name="email" required placeholder="Enter your email">
                </div>

                <div class="mb-3">
                    <label for="message" class="form-label">Your Message</label>
                    <textarea class="form-control" id="message" name="message" rows="4" required placeholder="Write your message"></textarea>
                </div>

                <button type="submit" class="btn btn-primary w-100">Send Message</button>
            </form>
        </div>

        <!-- Contact Details -->
        <div class="col-md-6">
            <div class="p-4 border rounded shadow-sm">
                <h5>Contact Information</h5>
                <p><strong>Email:</strong> support@samajsathi.techradar.site</p>
                <p><strong>Phone:</strong> +91 123456789</p>
                <p><strong>Address:</strong> 123, LIG Indore , MP, India</p>

                <h5>Follow Us</h5>
                <a href="https://facebook.com/samajsathi" class="text-primary me-3" target="_blank">Facebook</a>
                <a href="https://twitter.com/samajsathi" class="text-info me-3" target="_blank">Twitter</a>
                <a href="https://instagram.com/samajsathi" class="text-danger" target="_blank">Instagram</a>
            </div>
        </div>
    </div>
</div>
@endsection