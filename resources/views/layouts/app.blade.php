<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        {{-- icon cdn Link --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
        </style>

      
    </head>
    <body>
        <div class="container-xxl" style="height: 10000px;">
            @if (session('success'))
                <div id="alert-box" class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <x-header />
            <x-carousel />
            <x-searchPartner  />  
            <x-showPartner />
            <x-registration-step />
            <x-ImageCard />
            <x-QuestionsBox />
            <div class="row">
                @yield('content')
            </div>
            <br><hr>
            @if(Auth::check())
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
            @endif
        </div>

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script>
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
        </script>
    </body>
</html>