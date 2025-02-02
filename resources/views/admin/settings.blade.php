@extends('layouts.dashboard')
@section('content')


<div class="card">
    <div class="card-header ">
        <strong>
            Carousel Images
        </strong>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary admin-sm" data-bs-toggle="modal" data-bs-target="#carouselImage">
            Add
        </button>
    </div>
    {{-- Carousel image Setting Section--}}
    <div class="card-body">
        <div class="images">
            @foreach ($data as $img)
                <!-- Card Design -->
                <div class="card_s" >
                    <!-- Edit Button -->
                    <form action="{{ route('carousel.update', $img->id) }}" method="POST" enctype="multipart/form-data" style="position: absolute; top: 10px; right: 35px;">
                        @csrf
                        @method('PUT')
                        <label for="changeImage{{ $img->id }}" class="btn btn-sm btn-secondary"><i class="fas fa-edit text-warning" style="font-size: .7rem;"></i></label>
                        <input type="file" name="image" id="changeImage{{ $img->id }}" onchange="this.form.submit()" style="display: none;">
                    </form>

                    <form action="{{ route('carousel.destroy', $img->id) }}" method="POST" style="position: absolute; top: 10px; right: 5px;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this image?')"> <i class="fas fa-trash text-white" style="font-size: .7rem;"></i></button>
                    </form>

                    <!-- Image Display -->
                    <img src="{{ asset('storage/' . $img->image) }}" alt="Carousel Image" class="card-img-top" style="height: 160px; object-fit: cover; border-radius: 10px;">
                </div>
            @endforeach
        </div>
    </div>
</div> 
  <!-- Carousel Image Modal -->
  <div class="modal fade" id="carouselImage" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="carouselImageLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Carousel for Image Upload :-</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('carousel.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <label for="images">Upload Images</label>
                <input type="file" name="images[]" id="images" multiple class="form-control">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
      </div>
    </div>
  </div>

{{-- Google User Loging API Setting --}}
<div class="card mt-2">
    <div class="card-header h5">Google API Setting</div>
    <div class="card-body">
        <form action="{{ route('admin.google.settings.update') }}" method="POST">
            @csrf
        
            <div class="form-group">
                <label>Google Client ID</label>
                <input type="text" name="GOOGLE_CLIENT_ID" class="form-control" placeholder="GOOGLE_CLIENT_ID" value="{{ old('GOOGLE_CLIENT_ID', $googleSettings['client_id'] ?? '' ) }}" required>
            </div>
        
            <div class="form-group">
                <label>Google Client Secret</label>
                <input type="text" name="GOOGLE_CLIENT_SECRET" class="form-control" placeholder="GOOGLE_CLIENT_SECRET" value="{{ old('GOOGLE_CLIENT_SECRET', $googleSettings['client_secret'] ?? '') }}" required>
            </div>
        
            <div class="form-group">
                <label>Google Redirect URI</label>
                <input type="text" name="GOOGLE_REDIRECT_URI" class="form-control" placeholder="https://page_redirect_url" value="{{ old('GOOGLE_REDIRECT_URI', $googleSettings['redirect_uri'] ?? '') }}" required>
            </div>
            <div class="form-group text-end">
                <button type="submit" class="btn btn-success mt-2">Save Changes</button>
                <a href="{{ route('admin.google.settings.reset') }}" class="btn btn-danger">Reset to Default</a>
            </div>
        </form>
    </div>
</div>

<style>
    .card-body {
        width: 86vw;
        height: auto;
        overflow: hidden;
        padding: 10px;
    }

    .images {
        display: flex;
        gap: 8px;
        overflow-x: auto; /* Enable horizontal scrolling */
        scrollbar-width: thin; /* For Firefox */
        scrollbar-color: #ccc transparent; /* For Firefox */
    }

    .images::-webkit-scrollbar {
        height: 8px; /* Height of the scrollbar */
    }

    .images::-webkit-scrollbar-thumb {
        background-color: #aaa; /* Scrollbar thumb color */
        border-radius: 10px; /* Rounded scrollbar */
    }

    .images::-webkit-scrollbar-track {
        background: #f1f1f1; /* Scrollbar track color */
    }

    .card_s {
        flex: 0 0 auto; /* Prevent flex items from shrinking */
        width: 220px;
        border: 1px solid #000;
        border-radius: 10px;
        position: relative;
    }
</style>

@endsection