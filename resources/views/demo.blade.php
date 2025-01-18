<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$data['name'].' Profile'}}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 10px;
        }

      

        .profile-header {
            background-color: #f8f9fa;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .profile-info {
            max-width: 70%;
        }

        h1 {
            font-size: 20px;
            margin: 0 0 10px;
        }

        .profile-info p {
            margin: 5px 0;
            font-size: 14px;
            line-height: 1.5;
        }

       .head, .about-me, .family-info, .education-occupation, .additional-info {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fdfdfd;
            font-size: 14px;
        }

        h2 {
            font-size: 18px;
            margin-bottom: 5px;
            color: #333;
        }

        img {
            border-radius: 8px;
            border: 1px solid #ddd;
            max-width: 160px;
            max-height: 200px;
        }


        strong {
            color: #555;
        }

        @media screen and (max-width: 768px) {
            .profile-header {
                flex-direction: column;
                text-align: left;
            }

            .profile-info {
                width: 400px;
                margin-bottom: 15px;
                float: left;
            }
        }
    </style>
</head>
<body>

    <div class="container">

        <section class="head">
            <center><h1>*** Bio Data ***</h1></center>
            <small><strong>Matrimony ID:</strong> {{ $data['custom_id'] }}</small>
        </section>

        <!-- Profile Header -->
        <header class="profile-header">
            <div class="profile-info">
                <h1>{{ $data['name'] }}</h1>
                <p><strong>Age:</strong> {{ $data['age'] }} | <strong>Gender:</strong> {{ $data['gender'] }}</p>
                <p><strong>Email:</strong> NA | <strong>Phone:</strong> NA</p>
                <p><strong>Location:</strong> {{ $data['profile_city'] }}, {{ $data['profile_state'] }}, {{ $data['profile_country'] }}</p>
                <p><small><strong>Status:</strong> Not Verified </small></p>
            </div>
            <img src="{{ $imagePath }}" alt="User Image">
        </header>

        <!-- About Me Section -->
        <section class="about-me">
            <h2>About Me</h2>
            <p><strong>Bio :</strong> {{ $data['profile_about_me'] }}</p>
            <p><strong>Living Situation:</strong> {{ $data['profile_living_situation'] }} | <strong>House Ownership:</strong> {{ $data['profile_house_ownership'] }}</p>
            <p><strong>Diet:</strong> {{ $data['profile_diet'] }} | <strong>Drink:</strong> {{ $data['profile_drink'] }} | <strong>Smoke:</strong> {{ $data['profile_smoke'] }}</p>
        </section>

        <!-- Family Background -->
        <section class="family-info">
            <h2>Family Information</h2>
            <p><strong>Father's Status:</strong> {{ $data['profile_father_status'] }} |
                 <strong>Mother's Status:</strong> {{ $data['profile_mother_status']}}</p>
            <p><strong>Total Sisters:</strong> {{ $data['profile_total_sister'] }} | 
                <strong>Total Brothers:</strong> {{ $data['profile_total_brother'] }}</p>
        </section>

        <!-- Education and Occupation -->
        <section class="education-occupation">
            <h2>Education & Occupation</h2>
            <p><strong>Education:</strong> {{ $data['profile_education'] }} </p>
            <p><strong>Working As:</strong> {{ $data['profile_working_as'] }} | 
                <strong>Working With:</strong> {{ $data['profile_working_with'] }}</p>
            <p></p>
        </section>

        <!-- Additional Information -->
        <section class="additional-info">
            <h2>Additional Information</h2>
            <p><strong>Religion:</strong> {{ $data['profile_religion'] }}</p>
            <p><strong>Caste:</strong> {{ $data['profile_caste'] }}</p>
            <p><strong>Mother Tongue:</strong> {{ $data['profile_mother_tongue'] }}</p>
        </section>

        <center style="color: red;"><small>*Samaj Sathi Power by Tech Radar*</small></center>
    </div>

</body>
</html>
