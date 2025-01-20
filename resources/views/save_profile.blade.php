@extends('layouts.app')
@section('content')
<hr>

    <div class="row">
        <h3>Save Profiles</h3>
    </div>
    @foreach($profile as $data)
        <div class="profile-card">
            <div class="image-box">
                <img src="{{ asset($data['profile']['profile_image'] ? 'storage/' . $data['profile']['profile_image'] : 'images/set_partner_per.jpg')}}" alt="" width="100%">
            </div>
            <div class="details">
                <p class="profile-id">Profile Id: {{ $data['custom_id'] }}</p>
                <p>Name: {{ $data['name'] }}</p>
                <p>Age: {{ $data['age'] }} Yrs, Height: {{ $data['profile']['height'] }}</p>
                <p>Address: {{ $data['profile']['state'] }}, {{ $data['profile']['country'] }}</p>
            
                <div class="row justify-content-around p-2" >
                    <a href="{{ route('show-profile',$data['custom_id'])}}" class="col-5 btn btn-primary btn-sm"> View</a>
                    <a href="" class="col-5 btn btn-warning btn-sm"> Chat</a>
                </div>
            </div>

        
            <form action="{{route('saved.profile.delete',$data['custom_id'])}}" method="post">
            @csrf
                <button type="submit" class="check-icon">
                    X
                </button>
            </form>
        

        </div>
    @endforeach

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
