@extends('layouts.dashboard')
@section('content')

<div class="row justify-content-between" style="width:88vw;">
    <div class="col-4 text-start">
        <h4>User Details</h4>
    </div>
    <div class="container mt-3">
    <div class="row">
        <div class="col-12 d-flex align-items-center">
            <label for="search" class="me-2">Search:</label>
            <input type="text" id="search" class="form-control w-25" placeholder="Search users...">
        </div>
    </div>

    <div id="search-results" class="mt-3"></div>
</div>

</div>

<div class="row mt-2" style="width:88vw;">
<table class="table table-hover">
    <thead>
        <th> #</th>
        <th>Name</th>
        <th>Surname</th>
        <th>Age</th>
        <th>Gender</th>
        <th>Mobile</th>
        <th>Email</th>
        <th>Action</th>
    </thead>
    <tbody>
        @foreach($users as $key=>$user)
        <tr>
            <td >{{$key+1}}</td>
            <td>
                @php
                    $surname = explode(' ', $user->name);
                    $firstName = $surname[0]; // First part
                    $lastName = isset($surname[1]) ? $surname[1] : 'NA';
                @endphp
                {{$firstName}} 
            </td>
            <td>
                {{ $lastName }} 
            </td>
            <td>{{$user->age}} </td>
            <td>{{strtoupper($user->gender)}} </td>
            <td>{{$user->phone ? $user->phone: 'Null'}} </td>
            <td>{{strtolower($user->email)}} </td>
            <td>
                <a href="{{ route('admin.userProfile',$user->custom_id) }}">View</a> |
                <a href="">Edit</a> |
                <a href="">Delete</a> 
            
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>



@endsection