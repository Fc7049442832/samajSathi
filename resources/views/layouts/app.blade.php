<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Samaj Sathi</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        {{-- icon cdn Link --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        {{-- JQuery cdn Path --}}
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> 
        <!-- Styles -->
        <style>
            .btn-danger{
                background-image: radial-gradient(circle, rgba(231, 63, 34, 0.849), rgba(247, 54, 166, 0.7));
            }
            .btn-success{
                background-image: radial-gradient(circle, rgba(46, 139, 67, 0.911), rgba(247, 54, 166, 0.7));
            }
            #alert-box {
                position: fixed;
                top: 20px;
                right: 25px;
                z-index: 1050;
                padding: 10px;
                border-radius: 5px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                background-color: #28a745; /* Success green */
                color: white;
                transition: opacity 0.5s ease-out;
            }
            /* #pageHeader{  
                background-image: radial-gradient(circle, rgba(20, 65, 107, 0.849), rgba(241, 64, 168, 0.7));
            } */
            .page-header{
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

       
        </style>
    </head>
    <body>
        <div class="container-xxl">
            @if (session('success'))
                <div id="alert-box" class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <x-header />
            @if (request()->is('profile') || request()->is('partner_matching') || request()->is('partner_query'))
                {{-- page header code  --}}
                <div class="row page-header text-center p-2 mb-2 justify-content-around" id="pageHeader" >
                    <div class="col-md-3 col-3 btn ">
                    <a href="{{ route('profile')}}" class="text-white ">My Profile</a>
                    </div>
                    <div class="col-md-4 col-5 btn ">
                    <a href="{{ route('partner_query')}}" class="text-white">Partner Requirement</a>
                    </div>
                    <div class="col-md-3 col-3 btn ">
                    <a href="{{ route('matching')}}" class="text-white">Matching</a>
                    </div>
                </div>
            @endif
            
            @yield('content')
            
            <br>
           
            
            {{-- footer section code  --}}
            <div class="bg-secondary text-center p-3" style="height: 45px;">
                <p class="text-light">Power By <a href="" style="text-decoration: none; color:rgb(209, 212, 247);">Tech Radar</a> @ 2024</p>
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
    </body>
</html>