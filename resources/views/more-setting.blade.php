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
        <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            <strong>Privacy Setting</strong>
        </button>
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


  
  <!-- Privacy setting Model -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Privacy Setting</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <ul class="text-white">
                <li>Phone Number Privacy</li>
                <ul>
                    <li>
                        <span>
                            Show mobile number only paid members.
                        </span>
                        <span>
                            <input type="checkbox" name="" id="">
                        </span>
                    </li>
                    <li>
                        <span>
                            Show mobile number only to whom I grant access to view.
                        </span>
                        <span>
                            <input type="checkbox" name="" id="">
                        </span>
                    </li>
                </ul>
                <br>
                <li>Profile View Settings</li>
                <ul>
                    <li>
                        <span>
                            Let Other members Know that you have Short-listed their Profile.
                        </span>
                        <span>
                            <input type="checkbox" name="" id="">
                        </span>
                    </li>
                    <li>
                        <span>
                           Let other members know that you have viewed their profile.
                        </span>
                        <span>
                            <input type="checkbox" name="" id="">
                        </span>
                    </li>
                </ul>
            </ul>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Understood</button>
        </div>
      </div>
    </div>
  </div>


@endsection
<style>
    .col-12{
        padding: 4px 30px;
    }

    ul li {
        display: flex;
        justify-content: space-between;
        align-items: right;
    }

    ul li input[type="checkbox"] {
        margin-left: 0px;
    }


</style>
