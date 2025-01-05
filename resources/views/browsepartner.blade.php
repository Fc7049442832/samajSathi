@extends('layouts.app')
@section('content')
<div class="color-section"></div>
<div class="content">
    {{-- User Details Display Card code  --}}
    <x-PartnerCard />
</div>
<style>
    .color-section {
        width: 100%; /* Puri width */
        height: 30vh; /* Viewport height ka 40% */
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
</style>
@endsection