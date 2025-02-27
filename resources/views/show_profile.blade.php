<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <title>{{ $user->name }} | Digital Profile on SamajSathi</title>
    
    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">
    
    <!-- Basic Meta Tags -->
    <meta name="description" content="Explore the digital profile of {{ $user->name }} on SamajSathi. View personal details, professional experience, skills, and achievements. Connect now!">
    <meta name="author" content="Tech Radar">
    <meta name="keywords" content="SamajSathi, matrimony, matchmaking, marriage advice, relationships, find life partner, marriage stories, wedding tips, Tech Radar">
    
    <!-- Open Graph Meta Tags (Facebook & WhatsApp) -->
    <meta property="og:title" content="{{ $user->name }} | Digital Profile on SamajSathi">
    <meta property="og:description" content="Explore the digital profile of {{ $user->name }} on SamajSathi. View personal details, professional experience, skills, portfolio, and achievements all in one place. Connect and expand your network today!">
    <meta property="og:image" content="{{ asset($user->profile->profile_image ? 'storage/' . $user->profile->profile_image : 'images/set_partner_per.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="profile">
    <meta property="og:site_name" content="SamajSathi">
    <meta property="og:locale" content="en_US">
    <meta property="og:image:width" content="600">
    <meta property="og:image:height" content="315">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $user->name }} | Digital Profile on SamajSathi">
    <meta name="twitter:description" content="Explore the digital profile of {{ $user->name }} on SamajSathi. View personal details, professional experience, skills, portfolio, and achievements all in one place. Connect and expand your network today!">
    <meta name="twitter:image" content="{{ asset($user->profile->profile_image ? 'storage/' . $user->profile->profile_image : 'images/set_partner_per.jpg') }}">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:site" content="@techradar">
    <meta name="twitter:creator" content="@techradar">
    
    <!-- Security & Indexing -->
    <meta name="robots" content="index, follow">
    <meta name="csrf-token" content="{{ csrf_token() }}">    
    
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

        <div class="main-content-container">
            <hr>
            <div class="row justify-content-around">      
                {{--multipal image show --}}
            <div class="col-md-5 p-3 show_images text-center">
                {{-- <x-Carousel /> --}}
                <img src="{{ asset($user->profile->profile_image ? 'storage/' . $user->profile->profile_image : 'images/set_partner_per.jpg')}}" 
                alt="User Image" style="height: 350px;">
            </div>
           
            <div class="col-md-6 p-4 show-h4">
                <div class="row">
                    <div class="col-8">
                        <h4 class="">Matrimony Profile ID : {{$user->custom_id}}</h4>
                    </div>
                    <div class="col-4">
                     <a href="" class="btn btn-primary"  id="send-data-link"><i class="bi bi-download"></i> Download</a>
                    </div>
                </div>
               
                <div class="row p-2">
                    <div class="col-8">
                        <strong>Name : {{strtoupper($user->name)}} </strong> 
                        @if($user->is_verified == 1)
                            <small  style="background: rgb(10, 90, 10); color:antiquewhite; font-size:12px; padding:5px; border-radius:5px;">
                                 Verified <i class="bi bi-check" style="font-size: 16px;"></i>
                            </small>
                        @endif
                    </div>
                   
                    <div class="col-8">
                        <strong>Age : {{$user->age}} Yrs.</strong> 
                    </div>
                </div>
                
               <div class="row">
                <div class="col-6">Gender : {{ strtoupper($user->profile->gender)}}</div>
                <div class="col-6">DOB : {{$user->profile->dob}}</div>
               
                    <div class="col-6">Caste : {{$user->profile->caste ?? 'Not Available'}}</div>
                    <div class="col-12 mt-2">Marital Status : {{$user->profile->marital_status ?? 'Never Married'}}</div>
                    <div class="col-6">Religion : {{$user->profile->religion ?? 'Not Available'}}</div>
                </div> 
    
                <div class="row mt-3">
                  <div class="col-6">Height : {{$user->profile->height ?? 'Not Available'}}</div>
                  <div class="col-6">weight : {{$user->profile->weight ?? 'Not Available'}}</div>
                  <div class="col-12">Body type : {{$user->profile->body_type ?? 'Not Available'}}</div>
                  
                  <div class="col-12 mt-3">Living Situation : {{$user->profile->living_situation ?? 'Not Available'}}</div>
                  <div class="col-6">Language : {{$user->profile->mother_tongue ?? 'Not Available'}}</div>
                  <div class="col-6">Diets : {{$user->profile->diet ?? 'Not Available'}}</div>
                  <div class="col-6">Drink : {{$user->profile->drink ?? 'Not Available'}}</div>
                  <div class="col-6">Smoke : {{$user->profile->smoke ?? 'Not Available'}}</div>
                </div>
                
                <div class="row mt-3">
                  <div class="col-6">Country : {{$user->profile->country}}</div>
                  <div class="col-6">City : {{$user->profile->city ?? 'Not Available'}}</div>
                  <div class="col-6">State : {{$user->profile->state}}</div>   
                </div>
    
                <div class="row justify-content-end">
                    <div class="col-8 text-end pt-3">
                        <small><i class="bi bi-eye icon" title="View"></i>{{$user->user_activity->views ?? 0 }} |  
                            <i class="bi bi-download"></i> {{$user->user_activity->download ?? 0 }} </small>
                    </div>
                </div>
    
                <div class="row mt-4">
                    <div class="col-6">
                        @if($user->profile->is_active === 1)
                        <button class="btn btn-success" disabled><small>Profile is Active</small> </button>
                        @else
                        <button class="btn btn-waiting" disabled>Profile is Inactive</button>
                        @endif
                    </div>
                    <div class="col-6 text-end">

                        <a href="{{route('profile.save', $user->custom_id)}}">
                            <i class="bi bi-bookmark-heart-fill"></i></i>Save
                        </a>
            
                        <button class="btn  share-btn" data-url="{{ url()->current() }}">
                            <i class="bi bi-share icon" title="Share" style="margin-right:2px;"></i> <b>Share</b>
                        </button>
    
                            
                    </div>
                </div>
               
                <div class="row justify-content-around">
                    <button class="btn btn-danger col-5 mt-3" onclick=" goBack()" >Back </button>
    
                    <a href="{{ route('partner.contact', ['id' => $user->custom_id]) }}" class="btn btn-info col-5 mt-3">
                        <i class="bi bi-chat icon" title="Chat"></i>Chat
                    </a>
                    
                    {{-- <button class="btn btn-info col-5 mt-3"  > <i class="bi bi-chat icon" title="Chat"></i>Chat </button> --}}
                </div>
            </div>
        </div>
    
        <script>
            document.getElementById('send-data-link').addEventListener('click', function (e) {
                e.preventDefault();
                // Laravel Blade will output JSON here
                let data1 = @json($user); 
                // Flatten function for the JSON object
                function flattenArray(obj, parent = '', result = {}) {
                    for (let key in obj) {
                        if (obj.hasOwnProperty(key)) {
                            let newKey = parent ? `${parent}_${key}` : key;
    
                            if (typeof obj[key] === 'object' && obj[key] !== null && !Array.isArray(obj[key])) {
                                flattenArray(obj[key], newKey, result);
                            } else {
                                result[newKey] = obj[key];
                            }
                        }
                    }
                    return result;
                }
    
                // Flatten the Laravel data
                let flattenedData = flattenArray(data1);
                // Redirect with the flattened data
                const queryString = new URLSearchParams(flattenedData).toString();
                window.location.href = `/send-data?${queryString}`;
            });
    
    
        </script>
        <style>    
            a{
                text-decoration: none;
                color: black;
            }
            .show_images{
                border-radius: 20px;
               overflow: hidden;
        
            }
            .show-h4{
                margin: 30px auto auto auto;
                color: #313030;
                font-weight: 500;
                font-size: 18px;
            }
            @media(max-width:740px){
                .show-h4{
                margin: 30px auto auto auto;
                color: #313030;
                font-weight: 500;
                font-size: 14px;
                }
            }
        </style>
        
         {{-- footer section code  --}}    
        <div class="bg-secondary text-center p-1 footer" style="height: 30px;">
            <p class="text-light" style="font-size:15px;">Power By <a href="" style="text-decoration: none; color:rgb(209, 212, 247); width:100%;">Tech Radar</a> @ 2024</p>
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
</body>
</html>