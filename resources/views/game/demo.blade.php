<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spin to Win!</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
            background-color: #f5f5f5;
            position: relative;
        }
        .wheel-container {
            position: relative;
        }
        .wheel {
            width: 300px;
            height: 300px;
            border-radius: 50%;
            border: 5px solid #000;
            position: relative;
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
            top: -20px;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 0;
            border-left: 15px solid transparent;
            border-right: 15px solid transparent;
            border-bottom: 30px solid black;
        }
        button {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
        #result {
            font-size: 24px;
            font-weight: bold;
            position: absolute;
            top: 20px;
        }
    </style>
</head>
<body>
    <div id="result">Spin the wheel!</div>
    <div class="wheel-container">
        <div class="arrow"></div>
        <div class="wheel" id="wheel"></div>
    </div>
    <button id="spinButton" onclick="spinWheel()">Spin</button>
    <script>
        const segments = ["Better Luck", "10 Coins", "20 Coins", "50 Coins", "100 Coins", "Better Luck"];
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
                if (spinCount >= 2) {
                    button.disabled = true;
                    button.innerText = "No more spins";
                }
            }, 4000);
        }
    </script>
</body>
</html>
