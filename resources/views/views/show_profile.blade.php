@extends('layouts.app')
@php
    $username =$user->name;
@endphp

@section('title', 'SamajSathi - '.$username.' | Digital Profile on SamajSathi | Find Your Perfect Match')

@section('meta')

    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
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

@endsection

@section('content')
    <div class="row mb-5">
           
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
        
                    <button class="btn share-btn-profile" data-url="{{ url()->current() }}">
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
         // Share Button Functionality
         document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll(".share-btn-profile").forEach(btn => {
                btn.addEventListener("click", function () {
                    const url = this.getAttribute("data-url");
                    if (navigator.share) {
                        navigator.share({ title: document.title, text: "Check out this incredible Persian profile — where culture meets creativity! Dive in here: ", url })
                            .then(() => console.log("Shared successfully"))
                            .catch(console.error);
                    } else {
                        prompt("Copy this link:", url);
                    }
                });
            });
        });

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


@endsection