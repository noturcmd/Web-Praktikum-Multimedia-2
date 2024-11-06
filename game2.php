<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <title>Game Mencari Perbedaan</title>
    <style>
        .difference {
            position: absolute;
            width: 10%;
            height: 10%;
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
            display: none; /* Tombol ini akan disembunyikan sampai permainan selesai */
        }
    </style>
</head>
<body class="bg-gray-900 flex items-center justify-center min-h-screen">
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
                        <img alt="Gambar 1" class="rounded-lg" height="300" src="https://storage.googleapis.com/a1aa/image/U9jMFfIW0a1II6wXP01fmSISMFFVZBsaFzEquJmfbA1uNzbnA.jpg" width="400" id="image1"/>
                        <div class="difference" style="top: 20%; left: 30%;" onclick="markDifference(this)"></div>
                        <div class="difference" style="top: 40%; left: 50%;" onclick="markDifference(this)"></div>
                        <div class="difference" style="top: 10%; left: 60%;" onclick="markDifference(this)"></div>
                        <div class="difference" style="top: 50%; left: 10%;" onclick="markDifference(this)"></div>
                        <div class="difference" style="top: 70%; left: 40%;" onclick="markDifference(this)"></div>
                    </div>
                    <div class="relative">
                        <img alt="Gambar 2" class="rounded-lg" height="300" src="https://storage.googleapis.com/a1aa/image/U9jMFfIW0a1II6wXP01fmSISMFFVZBsaFzEquJmfbA1uNzbnA.jpg" width="400" id="image2"/>
                        <!-- Tidak ada lingkaran hijau di gambar kedua -->
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
        <div class="flex justify-between items-center text-white text-sm mt-4">
            <div class="flex items-center space-x-2">
                <i class="fas fa-shield-alt"></i>
                <span>Find It - Find The Differences</span>
            </div>
            <div class="flex items-center space-x-4">
                <div class="flex items-center space-x-1" id="likeSection">
                    <i class="fas fa-thumbs-up" id="likeButton" onclick="increaseLike()"></i>
                    <span id="likeCount">0</span>
                </div>
                <i class="fas fa-expand"></i>
            </div>
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

    <script>
        let foundDifferences = 0;
        const totalDifferences = 5;
        let lives = 3;
        let likeCount = 0;

        function markDifference(element) {
            if (!element.classList.contains('found')) {
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
                    break; // Exit after updating one slot
                }
            }
        }

        function checkResult() {
            if (foundDifferences === totalDifferences) {
                document.getElementById('feedback').innerText = 'Selamat! Anda menemukan semua perbedaan!';
                document.getElementById('result').style.display = 'block';
                document.getElementById('fact').style.display = 'block'; // Tampilkan fakta tentang babi
                document.getElementById('nextLevelButton').style.display = 'flex'; // Tampilkan tombol Next Level
            }
        }

        document.querySelectorAll('.difference').forEach(diff => {
            diff.addEventListener('click', (e) => {
                e.stopPropagation();
            });
        });

        // Hanya gambar di sebelah kiri yang bisa diklik
        document.getElementById('image1').addEventListener('click', (e) => {
            if (!e.target.classList.contains('difference')) {
                loseLife();
            }
        });

        function loseLife() {
            if (lives > 0) {
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
            alert('Coba perhatikan dengan seksama area yang memiliki perbedaan!');
        }

        function increaseLike() {
            likeCount++;
            document.getElementById('likeCount').innerText = likeCount;
        }

        function nextLevel() {
            // Aksi yang dilakukan saat tombol Next Level ditekan
            alert('Selamat! Anda telah menyelesaikan level ini. Mari lanjut ke level berikutnya!');
            // Di sini Anda bisa menambahkan logika untuk berpindah ke level berikutnya
        }
    </script>
</body>
</html>
