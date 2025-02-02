<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
      @foreach($images as $index => $image)
          <button 
              type="button" 
              data-bs-target="#carouselExampleCaptions" 
              data-bs-slide-to="{{ $index }}" 
              class="{{ $index === 0 ? 'active' : '' }}" 
              aria-current="{{ $index === 0 ? 'true' : 'false' }}" 
              aria-label="Slide {{ $index + 1 }}">
          </button>
      @endforeach
  </div>
  <div class="carousel-inner">
      @foreach($images as $index => $image)
          <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
              <img src="{{ asset('storage/' . $image->image) }}" class="d-block w-100 carousel-image" alt="Slide {{ $index + 1 }}">
              <div class="carousel-caption d-none d-md-block">
                  {{-- Optional captions for each slide --}}
              </div>
          </div>
      @endforeach
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
  </button>
</div>


<style>
  /* #carousel{
    border-radius: 10% !important;
  } */
  .carousel-image {
        height: 80vh; /* Set height to 70% of viewport height */
        object-fit: cover; /* Ensures the image covers the container without distortion */
    }
    /* Optional: Add border radius to the entire carousel container */
#carouselExampleCaptions {
    border-radius: 15px;
    overflow: hidden; /* Ensure content inside the container doesn't overflow */
}


/* For mobile screens */
@media screen and (max-width: 768px) {
    .carosel-image {
        height: 50vh; /* Height for mobile screens */
    }
}
</style>