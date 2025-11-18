<div class="col-12" >
    <h2 class="text-center">Your Soulmate is Here</h2>
    {{-- call to Partner Card --}}
    @php
        $lastFourUsers = array_slice($users, -6);
        $ResultCount = count($users);
    //    $lastFourUsers = array_map(fn($key) => $users[$key], array_rand($users, min(6, count($users))));
    @endphp
    {{-- write the all condition for partner card  --}}
    <x-PartnerCard :users="$lastFourUsers" />

    <div class="row text-center">
        @if(request()->is('/'))
            <a href="{{ route('Browse_Partner')}}">
                <div class="col-6 btn btn-danger">
                More..
                </div>
            </a>
        @elseif(request()->is('search-partner'))
            <div class="col-12 row justify-content-around">
                <button onclick="goBack()" class="col-5 btn btn-danger">
                    Back
                </button>
          
                <button class="col-5 btn btn-success">
                    More ( {{ $ResultCount}} )
                </button>
            </div>
        @endif
    </div>
</div>
<script>
    function goBack() {
        if (window.history.length > 1) {
            window.history.back();
        } else {
            window.location.href = '/';
        }
    }
</script>
