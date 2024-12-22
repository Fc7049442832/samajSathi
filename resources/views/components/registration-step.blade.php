<div class="steps-container">
    <h2>Four Simple Steps to Find Your Life Partner</h2>
    <div class="steps">
      <div class="step">
        <img src=" {{ asset('images/profileCreateLogo.png')}} " alt="Create Profile">
        <h3>Create Your Profile</h3>
        <p>Just fill basic details & access the huge database of Brides / Grooms.</p>
      </div>
      <div class="step">
        <img src="{{ asset('images/profileCreateLogo.png')}}" alt="Set Preference">
        <h3>Set Partner Preference</h3>
        <p>Set your Partner Preference & let’s match your requirement with others.</p>
      </div>
      <div class="step">
        <img src="{{ asset('images/profileCreateLogo.png')}}" alt="Receive Profiles">
        <h3>Receive Matching Profiles</h3>
        <p>Receive matching profiles daily as per your set partner preference.</p>
      </div>
      <div class="step">
        <img src="{{ asset('images/profileCreateLogo.png')}}" alt="Send Interest">
        <h3>Send/Receive Interest & Calls</h3>
        <p>Send/receive interest to suitable profiles and connect.</p>
      </div>
    </div>
    <a href="#" class="register-btn">Register FREE</a>
</div>

<style>  

    .steps-container {
      text-align: center;
      padding: 30px;
      max-width: 100%;
      background-color: white;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .steps-container h2 {
      font-size: 24px;
      margin-bottom: 20px;
      color: #333;
    }
    h2{
      font-size: 24px;
      font-weight: 800;
      margin-top: 50px;
      margin-bottom: 30px;
    }

    .steps {
      display: flex;
      justify-content: space-between;
      gap: 20px;
      margin-bottom: 20px;
      flex-wrap: wrap;
    }

    .step {
      flex: 1;
      min-width: 150px;
      text-align: center;
    }

    .step img {
      width: 180px;
      height: 180px;
      margin-bottom: 10px;
      border-radius: 50%;
    }

    .step h3 {
      font-size: 20px;
      font-weight: 600;
      color: #333;
      margin-bottom: 5px;
    }

    .step p {
      font-size: 18px;
      color: #666;
    }

    .register-btn {
      display: inline-block;
      padding: 10px 20px;
      background-color: #e74c3c;
      color: white;
      font-size: 16px;
      text-decoration: none;
      border-radius: 5px;
      transition: background-color 0.3s;
    }

    .register-btn:hover {
      background-color: #c0392b;
    }

    @media (max-width: 768px) {
      .steps {
        flex-direction: column;
      }
      .step h3 {
      font-size: 16px;
      font-weight: 600;
    }

    .step p {
      font-size: 13px;
      color: #666;
    }
    }
</style>