@extends('layouts.app')
@section('content')
   
    {{-- call to matching Card --}}
    <x-MatchCard :partner="$data" :user="$user" />

    <div class="row">
        <div class="col-md-6 col-12">
        </div>
        
        <div class="col-md-6 col-12">

        </div>
    </div>
@endsection