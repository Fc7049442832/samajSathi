<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="profile-container">
        <div class="profile-image-wrapper">
            <img src="{{ asset('path/to/default/profile.jpg') }}" id="profileImage" alt="Profile Image">
            <label for="profileImageInput" class="edit-icon">
                <i class="fas fa-edit"></i>
            </label>
            <input type="file" id="profileImageInput" accept="image/*" style="display: none;">
        </div>
        <button id="uploadButton" class="upload-btn">Upload</button>
    </div>
<style>
.profile-container {
    text-align: center;
    position: relative;
    width: 150px;
    margin: 20px auto;
}

.profile-image-wrapper {
    position: relative;
    width: 100px;
    height: 100px;
    margin: auto;
}

.profile-image-wrapper img {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid #ddd;
}

.profile-image-wrapper .edit-icon {
    position: absolute;
    top: 20px;
    right: -10px;
    background: #fff;
    border-radius: 50%;
    padding: 5px;
    cursor: pointer;
    font-size: 16px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

.upload-btn {
    margin-top: 10px;
    padding: 5px 15px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.upload-btn:hover {
    background-color: #0056b3;
}
    
</style>  
<script>
document.getElementById('profileImageInput').addEventListener('change', function (event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('profileImage').src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});

document.getElementById('uploadButton').addEventListener('click', function () {
    const fileInput = document.getElementById('profileImageInput');
    const formData = new FormData();
    formData.append('profile_image', fileInput.files[0]);

    fetch('/upload-profile-image', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
    })
        .then((response) => response.json())
        .then((data) => {
            if (data.success) {
                alert('Image uploaded successfully!');
            } else {
                alert('Image upload failed.');
            }
        })
        .catch((error) => console.error('Error:', error));
});
    
</script>  
</body>
</html>