@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Your Notifications</h2>
    @foreach(auth()->user()->notifications as $notification)
        <div class="alert alert-info">
            <h5>{{ $notification->data['header'] }}</h5>
            <p>{{ $notification->data['message'] }}</p>
            @if($notification->data['media'])
                <img src="{{ asset('storage/' . $notification->data['media']) }}" width="200" alt="Media">
            @endif
        </div>
    @endforeach
</div>
@endsection
