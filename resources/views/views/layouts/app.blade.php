<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Samaj Sathi Matrimony')</title>

    {{-- Default SEO Meta Tags --}}
    @sectionMissing('meta')
        <meta name="description" content="Find your perfect life partner with Samaj Sathi Matrimony, India's trusted matchmaking platform.">
        <meta name="keywords" content="matrimony, matchmaking, marriage, life partner, wedding, samaj sathi">
        <meta property="og:title" content="Samaj Sathi Matrimony - Find Your Perfect Match">
        <meta property="og:description" content="Join India's leading matchmaking platform with verified profiles and secure chat.">
        <meta property="og:image" content="https://samajsathi.techsathi.it/images/marriage-preview.jpg">
        <meta property="og:type" content="website">
    @else
        @yield('meta')
    @endif

    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/apple-touch-icon.png') }}">
    <link rel="canonical" href="https://samajsathi.techsathi.it">

    {{-- Fonts and Icons --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    {{-- Bootstrap CSS --}}
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
    
    {{-- <script src="{{ asset('ckeditor.js')}}"></script> --}}

    {{-- Custom Styles --}}
    <style>
        /* Alert Box */
        #alert-box {
            position: fixed; top: 20px; right: 25px; z-index: 1050;
            padding: 8px; font-size: 14px; border-radius: 5px;
            background: #28a745; color: #fff; box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            transition: opacity 0.5s ease-out;
        }

        /* Main Content Container */
        .main-content-container {
            height: 82%; width: 82%;
            position: absolute; top: 85px;
            overflow-y: auto; padding-bottom: 50px;
        }
        .main-content-container::-webkit-scrollbar { display: none; }

        /* Footer */
        .footer {
            width: 85%; height: 30px;
            position: absolute; bottom: 0;
            background: rgba(224, 72, 16, 0.822);
            justify-content: center; align-items: center;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            * { font-size: 13px; }
            .page-header a { font-size: 12px; }
            .main-content-container { width: 94%; top: 72px; padding-bottom: 0; }
            .footer { width: 95%; }
        }

        /* Chat Modal */
        #customModal {
            display: none; position: absolute; top: 100px; left: 100px;
            width: 400px; height: 500px; background: #fff; border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2); z-index: 1000; border: 1px solid #ccc;
        }
        #modalHeader {
            background: #007bff; color: white;
            padding: 10px; cursor: move; border-radius: 8px 8px 0 0;
        }
        #modalClose {
            position: absolute; top: 10px; right: 10px;
            background: red; color: white; width: 25px; height: 25px;
            border: none; border-radius: 50%; cursor: pointer;
        }
        #modalContent { padding: 20px; height: calc(100% - 50px); }

        /* Padding Adjustment */
        .custom-padding { padding: 0 250px; }
        @media (max-width: 767.98px) { .custom-padding { padding: 0; } }

        /* Icon Hover Effect */
        .icon {
            margin: 0 10px; cursor: pointer;
            transition: transform 0.2s, color 0.2s;
        }
        .icon:hover { transform: scale(1.2); }
    </style>
</head>

<body>
    <div class="container">
        {{-- Success Alert --}}
        @if (session('success'))
            <div id="alert-box" class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Error Alert --}}
        @if(session('error'))
            <script>alert("{{ session('error') }}");</script>
        @endif

        {{-- Header --}}
        <x-header />

        {{-- Page Header for Logged In Users --}}
        @auth
            <div class="row page-header text-center mb-1 justify-content-around" id="pageHeader"></div>
        @endauth

        {{-- Main Content --}}
        <div class="main-content-container">
            @yield('content')
        </div>

        {{-- Footer --}}
        <div class="footer text-center p-1 text-white">
            <div class="row justify-content-around">
                <div class="col-2"><a class="btn text-white" href="{{ route('home') }}">Home</a></div>
                <div class="col-2">
                    @if(Auth::check())
                    <a class="btn text-white" href="{{ route('matching') }}">Matches</a>
                    @else
                    <a class="btn text-white" href="{{ route('Browse_Partner') }}">Matches</a>
                    @endif
                </div>

                <div class="col-2"><a class="btn text-white" href="{{ route('blog') }}">Blog</a></div>
                <div class="col-2"><a class="btn text-white" href="{{ route('more-setting') }}">More</a></div>
            </div>
        </div>
    </div>

    {{-- JS Scripts --}}
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Go Back to Previous Page
        function goBack() {
            window.history.length > 1 ? window.history.back() : window.location.href = '/';
        }

        // Hide Alert Box after 5 seconds
        document.addEventListener('DOMContentLoaded', () => {
            const alertBox = document.getElementById('alert-box');
            if (alertBox) {
                setTimeout(() => {
                    alertBox.style.opacity = '0';
                    setTimeout(() => alertBox.remove(), 500);
                }, 5000);
            }
        });

        // Change Header on Scroll
        window.addEventListener('scroll', () => {
            const pageHeader = document.getElementById('pageHeader');
            if (pageHeader) {
                pageHeader.classList.toggle('active', window.scrollY > 10);
                pageHeader.classList.toggle('deactive', window.scrollY <= 10);
            }
        });

        // Share Button Functionality
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll(".share-btn").forEach(btn => {
                btn.addEventListener("click", function () {
                    const url = this.getAttribute("data-url");
                    if (navigator.share) {
                        navigator.share({ title: document.title, text: "Check out this amazing blog!", url })
                            .then(() => console.log("Shared successfully"))
                            .catch(console.error);
                    } else {
                        prompt("Copy this link:", url);
                    }
                });
            });
        });
    </script>
</body>
</html>