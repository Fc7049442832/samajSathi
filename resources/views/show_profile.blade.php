@extends('layouts.app')
@section('content')
<hr>  
    <div class="row justify-content-around">      
            {{--multipal image show --}}
        <div class="col-md-5 p-3 show_images text-center">
            {{-- <x-Carousel /> --}}
            <img src="{{ asset($userDetails['profile_image'] ? 'storage/' . $userDetails['profile_image'] : 'images/set_partner_per.jpg')}}" 
            alt="User Image" style="height: 350px;">
        </div>
       
        <div class="col-md-6 p-3 show-h4">
            <h4 class="">Matrimony Profile ID : {{$userDetails->user_id}}</h4>
            <p class="mt-3">
              <strong>Name : {{strtoupper($user->name)}}</strong> <br>
              <strong>Age : {{$user->age}} Yrs.</strong> 
            </p>
           <div class="row">
            <div class="col-6">Gender : {{ strtoupper($user->gender)}}</div>
            <div class="col-6">DOB : {{$userDetails->dob}}</div>
           
                <div class="col-6">Caste : {{$userDetails->caste ?? 'Not Available'}}</div>
                <div class="col-12 mt-2">Marital Status : {{$userDetails->marital_status ?? 'Never Married'}}</div>
                <div class="col-6">Religion : {{$userDetails->religion ?? 'Not Available'}}</div>
            </div> 

            <div class="row mt-3">
              <div class="col-6">Height : {{$userDetails->height ?? 'Not Available'}}</div>
              <div class="col-6">weight : {{$userDetails->weight ?? 'Not Available'}}</div>
              <div class="col-12">Body type : {{$userDetails->body_type ?? 'Not Available'}}</div>
              
              <div class="col-12 mt-3">Living Situation : {{$userDetails->living_situation ?? 'Not Available'}}</div>
              <div class="col-6">Language : {{$userDetails->mother_tongue ?? 'Not Available'}}</div>
              <div class="col-6">Diets : {{$userDetails->diet ?? 'Not Available'}}</div>
              <div class="col-6">Drink : {{$userDetails->drink ?? 'Not Available'}}</div>
              <div class="col-6">Smoke : {{$userDetails->smoke ?? 'Not Available'}}</div>
            </div>
            
            <div class="row mt-3">
              <div class="col-6">Country : {{$userDetails->country}}</div>
              <div class="col-6">City : {{$userDetails->city ?? 'Not Available'}}</div>
              <div class="col-6">State : {{$userDetails->state}}</div>   
            </div>

            <div class="row justify-content-end">
                <div class="col-8 text-end pt-3">
                    <small><i class="bi bi-eye icon" title="View"></i>23 <i class="bi bi-heart icon" title="Like"></i>12</small>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-6">
                    @if($userDetails->is_active == 1)
                    <button class="btn btn-primary" disabled><small>Profile is Active</small> </button>
                    @else
                    <button class="btn btn-waiting" disabled>Profile is Inactive</button>
                    @endif
                </div>
                <div class="col-6 text-end">
                    <button><i class="bi bi-heart icon icon-like" title="Like"></i> Like</button>
                    <button><i class="bi bi-bookmark icon" title="Save"></i> Save</button>
                    <button><i class="bi bi-share icon" title="Share"></i> Share</button>
                </div>
            </div>
           
            <div class="row justify-content-around">
                <button class="btn btn-danger col-5 mt-3" onclick=" goBack()" > Back </button>
                <button class="btn btn-info col-5 mt-3 "> <i class="bi bi-chat icon" title="Chat"></i>Chat </button>
            </div>
           
            <a href="{{route('pdf',$user)}}" id="send-data-link">print</a>
        </div>
    </div>

    <script>
       document.getElementById('send-data-link').addEventListener('click', function(e) {
            e.preventDefault(); // Prevent the default behavior of the <a> tag

            // Pass the Laravel data to JavaScript using
            let json1 = @json($user);
            let json2 = @json($userDetails);

            // Combine both JSON objects using Object.assign()
            let data = Object.assign({}, json1, json2);

            // Convert the combined object to a query string
            const queryString = new URLSearchParams(data).toString();

            // Redirect to the route with the query string
            window.location.href = `/send-data?${queryString}`;
        });

    </script>
@endsection
<style>
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
