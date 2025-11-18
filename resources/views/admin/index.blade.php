@extends('layouts.dashboard')
@section('content')
@php
$totalUser = count($user);    
@endphp


<div class="row">
    <div class="col-md-3">
        <div class="card text-white bg-primary mb-3">
            <div class="card-body">
                <h5 class="card-title">Total Users</h5>
                <p class="card-text">{{$totalUser}} </p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-success mb-3">
            <div class="card-body">
                <h5 class="card-title">Active Users</h5>
                <p class="card-text">567</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-warning mb-3">
            <div class="card-body">
                <h5 class="card-title">Pending Requests</h5>
                <p class="card-text">45</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-danger mb-3">
            <div class="card-body">
                <h5 class="card-title">Reported Issues</h5>
                <p class="card-text">12</p>
            </div>
        </div>
    </div>
</div>

    <div class="card">
        <div class="card-header">Overview</div>
        <div class="card-body">
            <p class="card-text">Welcome to the SamajSathi Dashboard. Use the navigation menu to access different sections.</p>
        </div>
    </div>
@endsection