@extends('layouts.app')
@section('content')
<div class="color-section"></div>
<div class="content main-container">
    {{-- User Details Display Card code  --}}
    <div class="partner_box">
        <div class="card">
            <x-PartnerCard :users="$combinedUsers" />
        </div>
        <div class="row justify-content-around p-2" id="user-container">
            @include('partials._user_cards', ['users' => $combinedUsers])
        </div>
        
        <div class="text-center mt-3">
            <button id="load-more" class="btn btn-primary">Load More</button>
        </div>



        <div class="row justify-content-center mt-4">
            <button class="col-2 btn btn-danger" onclick="goBack()" >Back</button>
        </div>
    </div>
    
</div>
<style>
    .color-section {
        width: 100%; /* Puri width */
        height: 35vh; /* Viewport height ka 40% */
        background-color: #eeb843; /* Aapka desired color */
        position: fixed; /* Position fix, taki scroll ka effect na ho */
        top: 10; /* Top par fix karna */
        left: 0;
    }
    .content {
        position: relative;
        margin-top: 40vh; /* 40% height ke baad content start hoga */
        margin-top: 0vh;     
    }
    .partner_box{
        height: 78vh;
        width: 100%;
        overflow-y: scroll;
        padding-bottom:100px;
        /* position:absolute; */        
    }
    .partner_box::-webkit-scrollbar {
      display: none;
    }
</style>
@endsection