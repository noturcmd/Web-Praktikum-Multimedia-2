<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Mencari Perbedaan</title>
    
    <link rel="shortcut icon" href="logo/logo_mulmed.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="styles/parallax.css">
    <link rel="stylesheet" href="styles/style1.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    
    <style>
        .difference {
            position: absolute;
            width: 40px;
            height: 40px;
            border: 4px solid green;
            border-radius: 50%;
            cursor: pointer;
        }

        .heart {
            font-size: 2rem;
            color: red;
        }
        .slot {
            color: gray;
            font-size: 2rem;
        }
        .checked {
            color: green;
            font-size: 2rem;
        }
        #result {
            display: none;
        }
        #fact {
            display: none;
            color: white;
            margin-top: 20px;
        }
        #nextLevelButton {
            display: none;
        }
    </style>
</head>

<body>
    <div class="container-fluid p-0 m-0">
        <header class="navbar navbar-expand-lg navbar-light justify-content-center align-items-center bg-black">
            <img src="logo/logo_mulmed.png" alt="icon-owl" width="80">
            <ul class="nav nav-pills nav-fill lead">
                <li class="nav-item">
                    <a class="nav-link fw-bold text-white text-decoration-underline link-secondary" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold text-white link-secondary" href="pages/materi/materi.php">Materi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold text-white link-secondary" href="../../../game2.php">Game</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold text-white link-secondary" href="pages/Quiz/quiz.php">Quiz</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold text-white link-secondary" href="pages/profile/profile.php">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-bold text-white link-secondary" href="pages/about.php">About</a>
                </li>
            </ul>
        </header>
    </div>

    <div class="bg-gray-900 flex items-center justify-center min-h-screen">
        <div class="w-full max-w-4xl bg-gray-800 p-4 rounded-lg">
            <div class="flex justify-between items-center mb-4">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-arrow-left text-white text-2xl"></i>
                    <div class="flex space-x-1">
                        <span class="heart" id="heart1">❤️</span>
                        <span class="heart" id="heart2">❤️</span>
                        <span class="heart" id="heart3">❤️</span>
                    </div>
                </div>
                <div class="text-white text-xl">Level 1</div>
                <div class="flex space-x-1" id="slots">
                    <i class="slot" id="slot1">⚪️</i>
                    <i class="slot" id="slot2">⚪️</i>
                    <i class="slot" id="slot3">⚪️</i>
                    <i class="slot" id="slot4">⚪️</i>
                    <i class="slot" id="slot5">⚪️</i>
                </div>
            </div>

            <div class="flex justify-center mb-4">
                <div class="relative">
                    <div class="flex space-x-4">
                        <div class="relative">
                            <img alt="Gambar 1" class="rounded-lg" height="300" src="a1.jpg" width="400" id="image1"/>
                            <div class="difference" style="top: 90%; left: 30%;" onclick="markDifference(this)"></div>
                            <div class="difference" style="top: 40%; left: 50%;" onclick="markDifference(this)"></div>
                            <div class="difference" style="top: 10%; left: 60%;" onclick="markDifference(this)"></div>
                            <div class="difference" style="top: 50%; left: 10%;" onclick="markDifference(this)"></div>
                            <div class="difference" style="top: 70%; left: 40%;" onclick="markDifference(this)"></div>
                        </div>
                        <div class="relative">
                            <img alt="Gambar 1" class="rounded-lg" height="300" src="a2.jpg" width="400" id="image1"/>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-center mb-4">
                <button class="bg-purple-600 text-white px-6 py-2 rounded-full flex items-center space-x-2" onclick="showHint()">
                    <i class="fas fa-lightbulb"></i>
                    <span>HINT</span>
                </button>
            </div>

            <div id="result" class="text-white text-xl text-center mt-4">
                <p id="feedback"></p>
            </div>
            <div id="fact" class="text-white text-md mt-4">
                <p>Babi adalah hewan yang sangat cerdas, mereka bisa belajar untuk melakukan trik dan bahkan menyelesaikan puzzle. Mereka juga memiliki kemampuan untuk berkomunikasi satu sama lain dengan berbagai suara.</p>
            </div>
            <div id="nextLevelButton" class="flex justify-center mt-4">
                <button class="bg-green-600 text-white px-6 py-2 rounded-full" onclick="nextLevel()">Next Level</button>
            </div>
        </div>
    </div>

    <script>
        let foundDifferences = 0;
        const totalDifferences = 5;
        let lives = 3;
        let likeCount = 0;
        let gameFinished = false;

        function markDifference(element) {
            if (!element.classList.contains('found') && !gameFinished) {
                element.classList.add('found');
                element.style.backgroundColor = 'green';
                foundDifferences++;
                updateSlots();
                checkResult();
            }
        }

        function updateSlots() {
            const slots = document.querySelectorAll('.slot');
            for (let i = 0; i < slots.length; i++) {
                if (!slots[i].classList.contains('checked') && foundDifferences > 0) {
                    slots[i].classList.remove('slot');
                    slots[i].classList.add('checked');
                    slots[i].innerHTML = '✔️';
                    break;
                }
            }
        }

        function checkResult() {
            if (foundDifferences === totalDifferences) {
                gameFinished = true;
                document.getElementById('feedback').innerText = 'Selamat! Anda menemukan semua perbedaan!';
                document.getElementById('result').style.display = 'block';
                document.getElementById('fact').style.display = 'block';
                document.getElementById('nextLevelButton').style.display = 'flex';
            }
        }

        function loseLife() {
            if (!gameFinished && lives > 0) {
                lives--;
                updateLivesDisplay();
                if (lives === 0) {
                    document.getElementById('feedback').innerText = 'Permainan Selesai! Anda telah kehilangan semua nyawa!';
                    document.getElementById('result').style.display = 'block';
                }
            }
        }

        function updateLivesDisplay() {
            document.getElementById('heart1').style.display = lives < 1 ? 'none' : 'inline';
            document.getElementById('heart2').style.display = lives < 2 ? 'none' : 'inline';
            document.getElementById('heart3').style.display = lives < 3 ? 'none' : 'inline';
        }

        function showHint() {
            alert('Cobalah untuk memperhatikan detail kecil pada gambar!');
        }

        function nextLevel() {
            alert('Lanjut ke level berikutnya!');
        }
    </script>
</body>
</html>
