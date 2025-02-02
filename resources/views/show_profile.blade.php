@extends('layouts.app')
@section('content')
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
                    
                    {{-- <a href="{{route('profile.save', $user->custom_id)}}">
                        <i class="bi bi-heart icon " title="Like"  style="margin-right:2px;"></i> Like</a> --}}
                    <a href="{{route('profile.save', $user->custom_id)}}">
                        <i class="bi bi-bookmark-heart-fill"></i></i>Save
                    </a>
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle" id="shareDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-share icon" title="Share" style="margin-right:2px;"></i> Share
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="shareDropdown">
                            <li>
                                <a class="dropdown-item" href="https://api.whatsapp.com/send?text={{ urlencode(route('profile.share', $user->custom_id)) }}" target="_blank">
                                    <i class="bi bi-whatsapp"></i> Share on WhatsApp
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('profile', $user->custom_id)) }}" target="_blank">
                                    <i class="bi bi-facebook"></i> Share on Facebook
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="mailto:?subject=Check this out&body={{ route('profile', $user->custom_id) }}">
                                    <i class="bi bi-envelope"></i> Share via Email
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item copy-link" href="#" data-link="{{ route('profile', $user->custom_id) }}">
                                    <i class="bi bi-clipboard"></i> Copy Link
                                </a>
                            </li>
                        </ul>
                    </div>

                        
                </div>
            </div>
           
            <div class="row justify-content-around">
                <button class="btn btn-danger col-5 mt-3" onclick=" goBack()" >Back </button>
                <button class="btn btn-info col-5 mt-3" id="openModalLink" > <i class="bi bi-chat icon" title="Chat"></i>Chat </button>
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
@endsection

