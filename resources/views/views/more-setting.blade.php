@extends('layouts.app')
@section('content')

<div class="row justify-content-center">
    <div class="col-12 blog-cover">
        <a href="{{route('partner-program')}}">
            <img src="{{ asset('images\Earn_by_Helping_Others.png') }}" alt="Samaj Sathi from Earn" class="img-fluid" style="border-radius:20px; ">
        </a>
    </div>
</div>
<hr>

<div class="row">

    <div class="col-12">
        <a class="dropdown-item" href="{{route('home')}}"><strong>Home</strong></a>
    </div>

    @if(Auth::check())
        <div class="col-12">
            <a class="dropdown-item" href="{{ route('profile')}}"><strong>Profile</strong></a>
        </div>

        <div class="col-12">
            <a href="" class="dropdown-item"  id="send-data-link"><strong> Biodata Creation </strong></a>
        </div>
       
        <div class="col-12">
            <a class="dropdown-item" href="{{ route('partner_query')}}"><strong>Partner Requirement</strong></a>
        </div>
        <div class="col-12">
            <a class="dropdown-item" href="{{ route('saved.profile')}}"><strong>Save Profiles</strong></a>
        </div>

        <div class="col-12">
            <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#AccountSettings">
                <strong>Account Settings</strong>
            </button>
        </div> 
       
        <div class="col-12">
            <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#privacySetting">
                <strong>Privacy Settings</strong>
            </button>
        </div>
    @endif
   

   
    <div class="col-12">
        <a class="dropdown-item" href="{{route('partner-program')}}"><strong>Earn with Us</strong></a>
    </div>
    <div class="col-12">
        <a class="dropdown-item" href="{{route('about')}}"><strong>About</strong></a>
    </div>
    <div class="col-12">
        <a class="dropdown-item" href="{{route('contact')}}"><strong>Contact</strong></a>
    </div>

</div>

<div class="row p-3 text-center">
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


<div class="modal fade" id="AccountSettings" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="privacySettingLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Accounts Settings</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                <ul class="text-white">
                    <li>
                        <span>
                            Deactivate/ Hide Account
                        </span>
                        <span>
                            <input type="checkbox" name="" id="">
                        </span>
                    </li>
                    <li>
                        <span>
                            <a href="">Blocked Profile's</a>.
                        </span>
                        <span>
                            <input type="checkbox" name="" id="">
                        </span>
                    </li>
                            
                    <li>
                        <span>
                           Change Password
                        </span>
                        <span>
                            <input type="checkbox" name="" id="">
                        </span>
                    </li>
                    <li>
                        <span>
                           Delete Account
                        </span>
                        <span>
                            <input type="checkbox" name="" id="">
                        </span>
                    </li>
                </ul>
            

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Privacy setting Model -->
  <div class="modal fade" id="privacySetting" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="privacySettingLabel" aria-hidden="true">
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
          <button type="button" class="btn btn-primary">Save</button>
        </div>
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
