<div class="game-section">
    <h2>Fun and Games to Find Your Perfect Match!</h2>
    <p>Engage, Play, and Connect – Make Your Journey to Love Exciting!</p>
    @php
      $games = [
          
            [
                'title' => 'Showcase Your Best Shot!',
                'description' => 'Participate in our Photo Contest and let your pictures do the talking!',
                'icon' => 'camera-icon.png',
                'link' => '/photo-contest',
                'cta' => 'Upload Your Photo & Win!',
            ],
            [
                'title' => 'Speed Dating, Reimagined!',
                'description' => 'Join our Virtual Dating Game and meet potential matches in real-time!',
                'icon' => 'video-icon.png',
                'link' => '/virtual-dating',
                'cta' => 'Start Speed Dating Now!',
            ],
            [
                'title' => 'Test Your Knowledge!',
                'description' => 'Play our Daily Match Trivia and answer fun questions about relationships, love, and more.',
                'icon' => 'quiz-icon.png',
                'link' => '/daily-trivia',
                'cta' => 'Play Trivia & Win Hearts!',
            ],
            [
                'title' => 'How Compatible Are You?',
                'description' => 'Take our Compatibility Quiz Game and discover your perfect match!',
                'icon' => 'heart-icon.png',
                'link' => '/compatibility-quiz',
                'cta' => 'Take the Quiz & Find Your Match!',
            ],
        ];   

    @endphp



    <div class="games-grid">

        <div class="game-card">
            <img src="{{ asset('images/game_image/spin-icon.jpeg') }}" alt="Spin to Win!" class="game-icon" width="100%">
            <h5>Spin to Win!</h5>
            {{-- <small>{{ $game['description'] }}</small> --}}
            <a class="btn game-cta" data-bs-toggle="modal" data-bs-target="#spinModal">Spin to Win!</a>
        </div>
        @foreach ($games as $game)
            <div class="game-card">
                <img src="{{ asset('images/game_image/' . $game['icon']) }}" alt="{{ $game['title'] }}" class="game-icon" width="100%">
                <h5>{{ $game['title'] }}</h5>
                {{-- <small>{{ $game['description'] }}</small> --}}
                <a href="{{ $game['link'] }}" class="game-cta">{{ $game['cta'] }}</a>
            </div>
        @endforeach
    </div>

    <div class="game-footer">
        <p>Games are more fun when you play with someone special. Start playing today and find your perfect match on Samaj Sathi!</p>
    </div>
</div>


  <!-- wheel game Modal -->
  <div class="modal fade" id="spinModal" tabindex="-1" aria-labelledby="spinModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="spinModalLabel">Spin the Wheel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center bg-info">
                <div id="result">Spin the wheel!</div>
                <div class="wheel-container">
                    <div class="arrow"></div>
                    <div class="wheel" id="wheel"></div>
                </div>
                <button id="spinButton" class="btn btn-success mt-3" onclick="spinWheel()">Spin</button>
            </div>
        </div>
    </div>
  </div>
{{-- wheel game script --}}
<script>
    const segments = ["Better Luck", 1, 2, 5, 10, "Better Luck"];
    let spinCount = 0;

    function spinWheel() {
        let wheel = document.getElementById("wheel");
        let result = document.getElementById("result");
        let button = document.getElementById("spinButton");
        
        let randomDegree = Math.floor(3600 + Math.random() * 360);
        let rotation = randomDegree % 360;
        let segmentIndex = Math.floor(rotation / 60);
        let win = segments[segmentIndex];
        
        wheel.style.transform = `rotate(${randomDegree}deg)`;
        setTimeout(() => {
            result.innerText = `You won: ${win}`;
            spinCount++;
            if (spinCount >= 3) {
                button.disabled = true;
                button.innerText = "No more spins";
            }
        }, 4000);
    }
</script>

<style>
    .game-section {
        text-align: center;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 10px;
        margin: 20px 0;
    }

    .games-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-top: 20px;
    }

    .game-card {
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .game-card:hover {
        transform: translateY(-5px);
    }

    .game-icon {
        width: 50px;
        height: 50px;
        margin-bottom: 10px;
    }

    .game-cta {
        display: inline-block;
        margin-top: 10px;
        padding: 10px 20px;
        background-color: #ff6b6b;
        color: #fff;
        border-radius: 5px;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }
    .game-cta:hover {
        background-color: #ff4c4c;
    }

    .game-footer {
        margin-top: 20px;
        font-style: italic;
        color: #666;
    }

    /* Wheel win game css */
    .wheel-container {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .wheel {
        width: 300px;
        height: 300px;
        border-radius: 50%;
        border: 5px solid #000;
        transition: transform 4s ease-out;
        background: conic-gradient(
            red 0deg 60deg,
            yellow 60deg 120deg,
            green 120deg 180deg,
            blue 180deg 240deg,
            orange 240deg 300deg,
            purple 300deg 360deg
        );
    }
    .arrow {
        position: absolute;
        top: 0px;
        left: 50%;
        transform: translateX(-50%);
        width: 0;
        height: 0;
       
        border-top: 30px solid rgb(255, 255, 255);
        border-left: 15px solid transparent;
        border-right: 15px solid transparent;
        border-radius: 5px;
        z-index: 1;
    }
    #result {
        font-size: 24px;
        font-weight: bold;
        text-align: center;
        margin-bottom: 10px;
    }
</style>