<div class="image-card-container">
    <div class="image-card">
      <img src="{{ $user->image_url }}" alt="{{ $user->name }}" oncontextmenu="return false;" draggable="false">
      <div class="info">
        <h3>{{ $user->name }}</h3>
        <p>{{ $user->age }}, {{ $user->height }}</p>
      </div>
    </div>
  </div>
  
  <style>
    .image-card-container {
      display: inline-block;
      margin: 10px;
    }
  
    .image-card {
      position: relative;
      width: 200px;
      height: 250px;
      overflow: hidden;
      border: 1px solid #ddd;
      border-radius: 5px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
  
    .image-card img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      pointer-events: none; /* Disables direct interaction with the image */
    }
  
    .info {
      position: absolute;
      bottom: 0;
      width: 100%;
      background: rgba(0, 0, 0, 0.6);
      color: white;
      text-align: center;
      padding: 10px 0;
      opacity: 0;
      transition: opacity 0.3s;
    }
  
    .image-card:hover .info {
      opacity: 1;
    }
  
    .info h3 {
      margin: 0;
      font-size: 16px;
      font-weight: bold;
    }
  
    .info p {
      margin: 5px 0 0;
      font-size: 14px;
    }
</style>
  