@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h2>Edit Notice</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.notices.update', $notice->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="header" class="form-label">Header</label>
            <input type="text" class="form-control" name="header" value="{{ $notice->header }}" required>
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" name="message" rows="4" required>{{ $notice->message }}</textarea>
        </div>

        <div class="mb-3">
            <label for="media" class="form-label">Media (optional)</label>
            <input type="file" class="form-control" name="media">
            @if ($notice->media)
                <p>Current Media: <a href="{{ asset('storage/'.$notice->media) }}" target="_blank">View</a></p>
            @endif
        </div>

        <button type="submit" class="btn btn-success">Update Notice</button>
        <a href="{{ route('notice') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection