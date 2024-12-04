<?php
include "connection/db_connection.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>
  <link rel="shortcut icon" href="logo/logo_mulmed.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="stylesheet" href="styles/parallax.css">
  <link rel="stylesheet" href="styles/style1.css">
  <style>

  </style>
</head>

<body>
  <div class="container-fluid p-0 m-0">

    <header class="navbar navbar-expand-lg navbar-dark bg-black px-3">
      <div class="container-fluid">
        <!-- Logo dan Judul -->
        <a class="navbar-brand d-flex align-items-center" href="index.php">
          <img src="logo/logo_mulmed.png" alt="icon-owl" width="50" class="me-2">
          <span class="text-white fw-bold">Beastie Brain Tease</span>
        </a>

        <!-- Tombol Hamburger untuk Mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu Navbar -->
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link fw-bold text-white text-decoration-underline" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold text-white" href="pages/materi/materi.php">Materi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold text-white" href="pages/game.php">Game</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold text-white" href="pages/Quiz/quiz.php">Quiz</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold text-white" href="pages/profile/profile.php">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold text-white" href="pages/about.php">About</a>
            </li>
          </ul>
        </div>
      </div>
    </header>


    <section class="parallax-bg m-0 p-0">
      <div class="parallax-overlay"></div>
      <div class="parallax-content animate__animated animate__fadeInDown">
        <h1 class="display-2 fw-bold mb-4 text-warning">BEASTIE BRAIN TEASE</h1>
        <h2 class="display-4 fw-bold mb-4">Welcome to Our Website</h2>
        <p class="display-6">Your Gateway to Unlimited Knowledge</p>
        <a href="#materi" class="mt-8 inline-block bg-blue-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-600 transition duration-300 h3">Explore Now</a>
      </div>
    </section>

    <main id="section-materi">
      <section id="materi" class="py-5">
        <div class="container">
          <h2 class="text-center mb-4 text-white">Materi</h2>

          <div id="materiCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <!-- Item 1 -->
              <div class="carousel-item active">
                <div class="row align-items-center materi-background">
                  <!-- Bagian kiri (gambar) -->
                  <div class="col-md-6">
                    <img src="path/to/your-image1.jpg" alt="Materi 1" class="img-fluid">
                  </div>
                  <!-- Bagian kanan (informasi singkat) -->
                  <div class="col-md-6">
                    <p class="text-justify text-white">Materi 1: Temukan berbagai materi pembelajaran interaktif yang menarik dan mudah dipahami.</p>
                    <a href="pages/materi/materi.php?id=1" class="btn btn-custom mt-3 text-white">Selengkapnya</a>
                  </div>
                </div>
              </div>

              <!-- Item 2 -->
              <div class="carousel-item">
                <div class="row align-items-center materi-background">
                  <!-- Bagian kiri (gambar) -->
                  <div class="col-md-6">
                    <img src="path/to/your-image2.jpg" alt="Materi 2" class="img-fluid">
                  </div>
                  <!-- Bagian kanan (informasi singkat) -->
                  <div class="col-md-6">
                    <p class="text-justify text-white">Materi 2:
                      Untuk menempatkan carousel-item di luar section materi, kita bisa membuat struktur HTML di mana section dan carousel menjadi dua elemen terpisah, tetapi tetap menjaga tampilan dan fungsionalitas. Berikut adalah versi yang diperbarui dari kode yang memindahkan carousel-item di luar section materi tetapi masih mencakup semua konten yang relevan.</p>
                    <a href="pages/materi/materi.php?id=2" class="btn btn-custom mt-3 text-white">Selengkapnya</a>
                  </div>
                </div>
              </div>

              <!-- Item 3 -->
              <div class="carousel-item">
                <div class="row align-items-center materi-background">
                  <!-- Bagian kiri (gambar) -->
                  <div class="col-md-6">
                    <img src="path/to/your-image3.jpg" alt="Materi 3" class="img-fluid">
                  </div>
                  <!-- Bagian kanan (informasi singkat) -->
                  <div class="col-md-6">
                    <p class="text-justify text-white">Materi 3: Asah pemahamanmu dengan materi yang lebih menantang.</p>
                    <a href="pages/materi/materi.php?id=3" class="btn btn-custom mt-3 text-white">Selengkapnya</a>
                  </div>
                </div>
              </div>
            </div>

            <!-- Navigasi Kiri-Kanan -->
            <button class="carousel-control-prev" type="button" data-bs-target="#materiCarousel" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden text-white">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#materiCarousel" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden text-white">Next</span>
            </button>
          </div>
        </div>
      </section>

      <!-- Section Game -->
      <section id="game">
        <div class="container py-5">
          <h2 class="text-center mb-4 text-white">Game</h2>
          <p class="text-center text-white">Asah kemampuanmu dengan berbagai game edukatif yang seru!</p>
          <a href="pages/game/game.php" class="btn btn-custom d-block mx-auto mt-3 text-white">Mainkan Game</a>
        </div>
      </section>

      <!-- Section Quiz -->
      <section id="quiz">
        <div class="container py-5">
          <h2 class="text-center mb-4 text-white">Quiz</h2>
          <p class="text-center text-white">Uji pengetahuanmu dengan berbagai quiz yang menantang.</p>
          <a href="pages/quiz/quiz.php" class="btn btn-custom d-block mx-auto mt-3 text-white">Mulai Quiz</a>
        </div>
      </section>
    </main>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>

<?php $koneksi = null ?>