<div class="custom-input-image">
    <img src="{{ asset($placeholder) }}" alt="pic">
    <input type="file" name="{{ $inputName }}" accept="image/*" onchange="previewImage(event)">
</div>
  
  <script>
    function previewImage(event) {
      const input = event.target;
      const reader = new FileReader();
  
      reader.onload = function () {
        const img = input.previousElementSibling;
        img.src = reader.result;
      };
  
      if (input.files && input.files[0]) {
        reader.readAsDataURL(input.files[0]);
      }
    
    }
  </script>
  
  <style>
    .custom-input-image {
      position: relative;
      display: inline-block;
      cursor: pointer;
    }
  
    .custom-input-image input[type="file"] {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      opacity: 0;
      cursor: pointer;
    }
  
    .custom-input-image img {
      width: 100px;
      height: 100px;
      border: 2px solid #ccc;
      border-radius: 50%;
      padding: 5px;
      transition: border-color 0.3s;
    }
  
    .custom-input-image:hover img {
      border-color: #007bff;
    }
  </style>
  