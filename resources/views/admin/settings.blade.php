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
        <div class="container ">
            <div class="row">
                @foreach ($data as $img)
                    <div class="col-md-4 mb-4">
                        <!-- Card Design -->
                        <div class="card" style="border: 2px solid #000; border-radius: 10px; position: relative;">
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
                    </div>
                @endforeach
            </div>
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



@endsection