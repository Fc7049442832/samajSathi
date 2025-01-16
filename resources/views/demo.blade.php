<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$data['name'].' Profile'}}</title>
</head>
<body>

    <div class="container">
        <p><strong>Custom ID:</strong> {{ $data['custom_id'] }}</p>
        <!-- Profile Header -->
        <header class="profile-header">
            <img src="{{ $imagePath }}" alt="User Image" style="height: 200px;">
            <div class="profile-info">
                <h1>{{ $data['name'] }}</h1>
                <p><strong>Age:</strong> {{ $data['age'] }} | <strong>Gender:</strong> {{ $data['gender'] }}</p>
                <p><strong>Email:</strong> NA | <strong>Phone:</strong> NA</p>
                <p><strong>Location:</strong> {{ $data['city'] }}, {{ $data['state'] }}, {{ $data['country'] }}</p>
                <p><strong>Status:</strong> Not Verified</p>
            </div>
        </header>
        
        <!-- About Me Section -->
        <section class="about-me">
            <h2>About Me</h2>
            <p><strong>Living Situation:</strong> {{ $data['living_situation'] }}</p>
            <p><strong>House Ownership:</strong>{{ $data['house_ownership'] }}</p>
            <p><strong>Diet:</strong> {{ $data['smoke'] }} | <strong>Drink:</strong> {{ $data['smoke'] }} | <strong>Smoke:</strong>{{ $data['smoke'] }}</p>
        </section>

        <!-- Family Background -->
        <section class="family-info">
            <h2>Family Information</h2>
            <p><strong>Father's Status:</strong> Unknown | <strong>Mother's Status:</strong> Unknown</p>
            <p><strong>Total Sisters:</strong> Unknown | <strong>Total Brothers:</strong> Unknown</p>
        </section>

        <!-- Education and Occupation -->
        <section class="education-occupation">
            <h2>Education & Occupation</h2>
            <p><strong>Education:</strong> Not Provided</p>
            <p><strong>Working As:</strong> Not Provided</p>
            <p><strong>Working With:</strong> Not Provided</p>
        </section>
        
        <!-- Additional Information -->
        <section class="additional-info">
            <h2>Additional Information</h2>
            <p><strong>Religion:</strong> Not Provided</p>
            <p><strong>Caste:</strong> Not Provided</p>
            <p><strong>Mother Tongue:</strong> Not Provided</p>
        </section>
    </div>




  
</body>
</html>
