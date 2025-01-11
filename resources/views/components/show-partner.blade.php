<div class="col-12" >

    <h2 class="text-center">Your Soulmate is Here</h2>
    {{-- call to Partner Card --}}
    @php
        // $lastFourUsers = array_slice($users, -6);
       // $lastFourUsers = array_map(fn($key) => $users[$key], array_rand($users, min(6, count($users))));
    @endphp
    {{-- write the all condition for partner card  --}}
    <x-PartnerCard :users="$users" />

    <div class="row text-center">
        <a href="{{ route('Browse_Partner')}}">
            <div class="col-6 btn btn-danger">
             More..
            </div>
        </a>
    </div>
  
</div>
