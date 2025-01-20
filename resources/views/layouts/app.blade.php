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
        .main-content-container{
            height: 75%;
            width: 75%;
            position: absolute;
            top: 150px;
            overflow: hidden;
            overflow-y: scroll;
            padding-bottom: 50px;
        }

        .main-content-container::-webkit-scrollbar {
    display: none; /* WebKit-based browsers (Chrome, Safari) ke liye scrollbar hide kare */
}
        .footer{
            width: 78%;
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
            height: 75%;
            width: 94%;
            position: absolute;
            top: 113px;
            overflow: hidden;
            overflow-y: scroll;
            padding-bottom: 50px;
            }

            .footer{
             width: 95%;
            }

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
        @if (session('error'))
        <div id="alert-box" class="alert alert-danger ">
            {{ session('error') }}
        </div>
    @endif

        <x-header />
        @if (Auth::check())
            {{-- page header code  --}}
            <div class="row page-header text-center p-1 mb-1 justify-content-around" id="pageHeader" >
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