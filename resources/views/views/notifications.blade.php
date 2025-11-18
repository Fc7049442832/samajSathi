@extends('layouts.app')
@section('content')
<hr>
    <div class="row">
        <h3>
            Notifications
            @if($count > 0)
                <span class="badge">{{ $count }}</span>
            @endif
        </h3>
    </div>

    <ul>
        @forelse ($notifications as $notification)
            <li>
                <div class="row">
                    <div class="col-12">
                        <strong>{{ $notification->data['header'] }}</strong>
                    </div>
                    <div class="col-8">
                        {{ $notification->data['message'] }} 
                    </div>
                    <div class="col-4">
                        @php
                            $media = $notification->data['media'];
                            $mediaExtension = $media ? pathinfo($media, PATHINFO_EXTENSION) : null;
                        @endphp
                        
                        @if ($media)
                            @if (in_array(strtolower($mediaExtension), ['mp4', 'avi', 'mov', 'webm']))
                                <!-- 🎥 Video Player -->
                                <video width="320" height="240" controls>
                                    <source src="{{ asset('storage/' . $media) }}" type="video/{{ $mediaExtension }}">
                                    Your browser does not support the video tag.
                                </video>
                            @elseif (in_array(strtolower($mediaExtension), ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp']))
                                <!-- 🖼️ Image Display -->
                                <img src="{{ asset('storage/' . $media) }}" alt="Notice Media" style="max-width: 100%; height: auto;">
                            @else
                                <p>Unsupported media format.</p>
                            @endif
                        
                        @endif 
                    </div>
                </div>
               
                <small>{{ $notification->created_at->diffForHumans() }}</small>
            </li>
        @empty
            <li>No new notifications.</li>
        @endforelse
    </ul>
    
      
          
    <div class="row">
        <div class="col-12 text-center pt-5">
            <a href="{{ route('mark.read') }}" class="btn btn-primary mt-2">All Clear Notifications </a>
            <button class="btn btn-danger mt-2" onclick=" goBack()" >Back </button>
        </div>
    </div>
<style>
    .profile-card {
        display: flex;
        width: 100%;
        max-width: 600px;
        border: 2px solid #797373;
        border-radius: 8px;
        padding: 10px;
        margin: 10px 0px;
        background: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
    .image-box {
        width: 180px;
        height: 180px;
        border: 2px solid #7e7a7a;
        border-radius: 8px;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        margin-right: 10px;
        font-size: 12px;
        color: green;
    }
    img{
        width: 100%;
        height: 100%;
        padding: 1px;
        overflow: hidden;
        border-radius: 8px;
    }
    .details {
        flex-grow: 1;
        padding: 5px;
        font-size: 16px;
        font-weight: 500;
    }
    .details p {
        margin: 5px 0;
        line-height: 1.5;

    }
    .details .profile-id {
        font-weight: bold;
        font-size:20px;
    }
    .check-icon {
        width: 30px;
        height: 30px;
        border: 2px solid rgb(204, 20, 20);
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 20px;
        color: rgb(184, 16, 16);
        font-weight: bold;
    }
    @media (max-width: 768px){
        .profile-card {
            border-radius: 8px;
            padding: 5px;
            margin: 10px 0px;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .details .profile-id {
            font-weight: bold;
            font-size:16px;
        }
        .check-icon {
            width: 25px;
            height: 25px;
            border: 1.5px solid rgb(204, 20, 20);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 14px;
            color: rgb(184, 16, 16);
            font-weight: bold;
        }
    }
</style>
@endsection
