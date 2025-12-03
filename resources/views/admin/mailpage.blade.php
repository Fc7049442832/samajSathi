@extends('layouts.dashboard')
@section('content')


<div class="row">
    <div class="col-md-3">
        <div class="card text-white bg-primary mb-3">
            <div class="card-body">
                <h5 class="card-title">Total Mails Sent</h5>
                <p class="card-text">no</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-success mb-3">
            <div class="card-body">
                <h5 class="card-title">Total Mails Delivered</h5>
                <p class="card-text">567</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-warning mb-3">
            <div class="card-body">
                <h5 class="card-title">Total Mails Pending (Queue)</h5>
                <p class="card-text">45</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-danger mb-3">
            <div class="card-body">
                <h5 class="card-title">Total Mails Failed</h5>
                <p class="card-text">12</p>
            </div>
        </div>
    </div>
</div>

    <div class="card">
        <div class="card-header">Overview - Mail Page</div>
        <div class="card-body">
            <p class="card-text"> <a href=" {{ route('write.new.mail') }} ">New Mail Sent</a> </p>
            <hr>
            <p class="card-text">Blog Mail Sent</p>
            <hr>
            <p class="card-text">Profile Mail Sent</p>

        </div>
    </div>
@endsection