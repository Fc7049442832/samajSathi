<div class="steps-container">
  <h2>Four Easy Steps to Find Your Life Partner Online</h2> <!-- keyword in H2 -->

  <div class="steps">
      @php
          $steps = [
              ['image' => 'images/profileCreateLogo.png', 'number' => 1, 'title' => 'Create Your Profile on Matrimony Site', 'desc' => 'Sign up and create your detailed profile to find your perfect life partner online.'],
              ['image' => 'images/call.jpg', 'number' => 2, 'title' => 'Set Your Life Partner Preferences', 'desc' => 'Define what you seek in a life partner and get personalized matches.'],
              ['image' => 'images/matching.png', 'number' => 3, 'title' => 'Get Daily Matching Profiles', 'desc' => 'Receive daily updates with profiles matching your partner criteria.'],
              ['image' => 'images/set_partner_per.jpg', 'number' => 4, 'title' => 'Connect with Potential Life Partners', 'desc' => 'Send interest or chat with suitable matches and find your soulmate.']
          ];
      @endphp

      @foreach($steps as $step)
          <div class="step" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
              <div class="step-img-wrapper">
                  <img src="{{ asset($step['image']) }}" alt="{{ $step['title'] }} - Find Life Partner" loading="lazy"> <!-- alt optimized -->
                  <div class="step-no">{{ $step['number'] }}</div>
              </div>
              <h3>{{ $step['title'] }}</h3> <!-- Keyword inside H3 -->
              <p>{{ $step['desc'] }}</p>    <!-- Keyword in description -->
          </div>
      @endforeach
  </div>
  <a href="#" class="btn btn-primary register-button" data-bs-toggle="modal" data-bs-target="#RegisterModal" title="Register Free">
    Registration Free
  </a> <!-- CTA keyword -->
</div>

<style>
  .steps-container {
      text-align: center;
      padding: 50px 20px;
      background-color: #fff;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
      margin-top: 40px;
  }
  .steps-container h2 {
      font-size: 2rem;
      font-weight: 800;
      margin-bottom: 40px;
      color: #222;
  }
  .steps {
      display: flex;
      flex-wrap: wrap;
      gap: 30px;
      justify-content: center;
  }
  .step {
      background: #f9f9f9;
      border-radius: 12px;
      padding: 20px;
      flex: 0 0 220px;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
  }
  .step:hover {
      transform: translateY(-8px);
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
  }
  .step-img-wrapper {
      position: relative;
      margin-bottom: 20px;
  }
  .step img {
      width: 140px;
      height: 140px;
      border-radius: 50%;
      object-fit: cover;
      border: 4px solid #44517e;
  }
  .step-no {
      position: absolute;
      top: -10px;
      right: -10px;
      background: #44517e;
      color: #fff;
      width: 35px;
      height: 35px;
      font-size: 1.1rem;
      font-weight: bold;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
  }
  .step h3 {
      font-size: 1.2rem;
      font-weight: 700;
      color: #333;
      margin-bottom: 10px;
  }
  .step p {
      font-size: 0.95rem;
      color: #666;
  }
  .register-btn {
      margin-top: 30px;
      display: inline-block;
      padding: 12px 30px;
      background: linear-gradient(135deg, #e74c3c, #c0392b);
      color: #fff;
      font-size: 1rem;
      border-radius: 8px;
      text-decoration: none;
      font-weight: 600;
      transition: background 0.3s ease;
  }
  .register-btn:hover {
      background: linear-gradient(135deg, #c0392b, #a83226);
  }
  @media (max-width: 768px) {
      .steps {
          flex-direction: column;
          align-items: center;
      }
      .step {
          width: 80%;
      }
  }
</style>