@extends('layouts.app')
@section('content')

<div class="row justify-content-Between">
    <div class="col-md-1 col-2">
        <button class="btn btn-danger" onclick="goBack()" >Back</button>
    </div>
    <div class="col-10 pt-2">
        <h4>More Page</h4>
    </div>
</div>
<hr>

<div class="row">

    @if(Auth::check())
        <div class="col-12">
            <a class="dropdown-item" href="{{ route('profile')}}"><strong>Profile</strong></a>
        </div>
        <div class="col-12">
            <a class="dropdown-item" href="{{route('wallet')}}"><strong>Wallet</strong></a>
        </div>
        <div class="col-12">
            <a class="dropdown-item" href="{{ route('matching')}}"><strong>Matching</strong></a>
        </div>
        <div class="col-12">
            <a class="dropdown-item" href="{{ route('partner_query')}}"><strong>Partner Requirement</strong></a>
        </div>
        <div class="col-12">
            <a class="dropdown-item" href="{{ route('saved.profile')}}"><strong>Save Profiles</strong></a>
        </div>
    @endif
   

    
   
    <div class="col-12">
        <a class="dropdown-item" href="{{route('about')}}"><strong>Privacy Setting</strong></a>
    </div>
    <div class="col-12">
        <a class="dropdown-item" href="{{route('about')}}"><strong>About</strong></a>
    </div>
    <div class="col-12">
        <a class="dropdown-item" href="{{route('contact')}}"><strong>Contact</strong></a>
    </div>

</div>

<div class="row p-5 text-center">
    @if(Auth::check())
        <div class="col-12">
            <a class="dropdown-item" href="#">
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </a>
        </div>
    @else
        <div class="col-12  mt-5">
            <a href="#" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#RegisterModal">
                Get Started
            </a>
            <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#LoginModal">
                Login <i class="fas fa-user"></i>
            </a>
        </div>
    @endif

    <div class="col-12"><small><b>Version 1.8</b></small></div>
</div>


@endsection
<style>
    .col-12{
        padding: 4px 30px;
    }
</style>
