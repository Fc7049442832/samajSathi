<div class="game-section">
    <h2>Fun and Games to Find Your Perfect Match!</h2>
    <p>Engage, Play, and Connect – Make Your Journey to Love Exciting!</p>

    <div class="games-grid">
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
</style>