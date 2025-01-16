<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Samaj Sathi Platform</title>
</head>
<body>
    @php
     $user = $user->name ? $user->name : 'Guest';
    @endphp
    <h3>Hello, {{ $user }}</h3>
    <p style="margin:30px auto;">Thank you for registering on the Samaj Sathi platform!</p>

    <p style="margin:10px auto 40px auto;">
        We're excited to have you on board and part of our community. At Samaj Sathi, our mission is to help you find your perfect partner with ease and confidence.
    </p>

    <p style="font-size: 14px;">
    <strong>हमें खुशी है कि आपने हमारे साथ जुड़ने का फैसला किया!</strong> <br>
    हम आपके लिए सबसे अच्छा साथी खोजने में आपकी पूरी मदद करेंगे। <br>
    </p>

    <p style="margin:40px auto 30px auto;">Stay connected with us for updates, tips, and personalized matches. Together, let's make your journey meaningful and memorable!</p>
    <p style="margin:10px;">
        Warm regards, <br>
        <strong>
            <a href="" style="text-decoration: none; color:black;">Team</a>
            <a href="" style="text-decoration: none; color:black;">Samaj Sathi</a> 
        </strong>
    </p>
    

</body>
</html>
