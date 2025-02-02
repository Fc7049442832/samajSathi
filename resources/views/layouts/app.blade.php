<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
         <title>SamajSathi - Connecting Hearts, Building Relationships</title>

        <!-- Basic Meta Tags -->
        <meta name="description" content="SamajSathi is your trusted platform to connect with potential life partners, fostering meaningful relationships and long-lasting bonds. Start your journey with us today!">
        <meta name="author" content="Tech Radar">
        <meta name="keywords" content="SamajSathi, marriage platform, matchmaking, find life partner, matrimony, relationships, Tech Radar">
        
        <!-- Open Graph Meta Tags for Facebook and WhatsApp -->
        <meta property="og:title" content="SamajSathi - Connecting Hearts, Building Relationships">
        <meta property="og:description" content="Discover meaningful connections and find your perfect life partner on SamajSathi, the trusted matchmaking platform. Join us now!">
        <meta property="og:image" content="https://samajsathi.techradar.site/images/marriage-preview.jpg"> <!-- Update with the actual image URL -->
        <meta property="og:url" content="https://samajsathi.techradar.site">
        <meta property="og:type" content="website">
        <meta property="og:site_name" content="SamajSathi">
        
        <!-- Twitter Card Meta Tags -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="SamajSathi - Connecting Hearts, Building Relationships">
        <meta name="twitter:description" content="Find your life partner on SamajSathi! A trusted platform for meaningful matchmaking and lasting bonds. Start your journey now!">
        <meta name="twitter:image" content="https://samajsathi.techradar.site/images/marriage-preview.jpg"> <!-- Update with the actual image URL -->
        <meta name="twitter:url" content="https://samajsathi.techradar.site">
        
        <!-- Image Previews -->
        <meta property="og:image:width" content="600">
        <meta property="og:image:height" content="315">

    
        <!-- Robots Meta Tag -->
        <meta name="robots" content="index, follow">
    
        <!-- Canonical URL -->
        <link rel="canonical" href="https://samajsathi.techradar.site">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        {{-- icon cdn Link --}}
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Bootstrap CSS -->
        
        
        <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
        {{-- JQuery cdn Path --}}
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> 
        
         
        <!-- Styles -->
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
        .main-content-container{
            height: 75%;
            width: 82%;
            position: absolute;
            top: 130px;
            overflow: hidden;
            overflow-y: scroll;
            padding-bottom: 50px;
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
    </head>
<body>
    <div class="container">
        @if (session('success'))
            <div id="alert-box" class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
        <div id="alert-box" class="alert alert-danger ">
            {{ session('error') }}
        </div>
    @endif

        <x-header />

        @if (Auth::check())
            {{-- page header code  --}}
            <div class="row page-header text-center mb-1 justify-content-around" id="pageHeader" >
                <div class="col-md-3 col-3 btn ">
                <a href="{{ route('profile')}}" class="text-white ">Profile</a>
                </div>
                <div class="col-md-3 col-3 btn ">
                <a href="{{ route('partner_query')}}" class="text-white">Requirement</a>
                </div>
                <div class="col-md-3 col-3 btn ">
                <a href="{{ route('matching')}}" class="text-white">Matching</a>
                </div>
                <div class="col-md-3 col-3 btn ">
                    <a href="{{ route('saved.profile')}}" class="text-white">Save</a>
                </div>
            </div>
        @endif
        <div class="main-content-container">
            @yield('content')
        </div> 
        
         {{-- footer section code  --}}    
        <div class="bg-secondary text-center p-1 footer" style="height: 30px;">
            <p class="text-light" style="font-size:15px;">Power By <a href="" style="text-decoration: none; color:rgb(209, 212, 247); width:100%;">Tech Radar</a> @ 2024</p>
        </div>

    </div>

    

    <div id="customModal">
        <div id="modalHeader">
            Chat Box
            <button id="modalClose">×</button>
        </div>
        <div id="modalContent">
            <p>This is a draggable and resizable div. You can move it around the screen.</p>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
    </script>
    {{-- Chat Box for script --}}
    <script>
        const modal = document.getElementById('customModal');
        const openModalLink = document.getElementById('openModalLink');
        const closeModalButton = document.getElementById('modalClose');
        const modalHeader = document.getElementById('modalHeader');

        // Function to open modal
        function openModal() {
            modal.style.display = 'block';
            localStorage.setItem('modalState', 'open'); // Save state
        }

        // Function to close modal
        function closeModal() {
            modal.style.display = 'none';
            localStorage.setItem('modalState', 'closed'); // Save state
        }

        // Event listener to open modal
        openModalLink.addEventListener('click', (e) => {
            e.preventDefault();
            openModal();
        });

        // Event listener to close modal
        closeModalButton.addEventListener('click', closeModal);

        // Check localStorage to persist modal state
        if (localStorage.getItem('modalState') === 'open') {
            openModal();
        }

        // Dragging functionality
        let isDragging = false;
        let offsetX, offsetY;

        modalHeader.addEventListener('mousedown', (e) => {
            isDragging = true;
            offsetX = e.clientX - modal.offsetLeft;
            offsetY = e.clientY - modal.offsetTop;
            document.body.style.userSelect = 'none'; // Disable text selection
        });

        document.addEventListener('mousemove', (e) => {
            if (isDragging) {
                modal.style.left = `${e.clientX - offsetX}px`;
                modal.style.top = `${e.clientY - offsetY}px`;
            }
        });

        document.addEventListener('mouseup', () => {
            isDragging = false;
            document.body.style.userSelect = ''; // Re-enable text selection
        });
    </script>
</body>
</html>