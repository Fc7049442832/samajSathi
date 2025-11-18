@extends('layouts.dashboard')

@section('content')

<div class="row justify-content-between" style="width:88vw;">
    <div class="col-4 text-start">
        <h5>Contact Messages</h5>
    </div>
</div>

<div class="row mt-3" style="width:88vw;">
    <div class="container mt-4 mb-5">

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                </tr>
            </thead>

            <tbody>
                @foreach($data as $key => $item)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $item->name }}</td>
                    <td> <a href="#" class="openReplyModal" 
                        data-email="{{ $item->email }}" 
                        data-name="{{ $item->name }}">
                        {{ $item->email }}
                        </a>
                    </td>
                   <td style="white-space: pre-line;">{{ strip_tags($item->message) }}
                    <small style="font-size:8;" >{{ $item->created_at->format('d M Y, h:i A') }}</small>
                   </td>

                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>



@endsection
