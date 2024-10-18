<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="styles/style1.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="stylesheet" href="styles/parallax.css">
  <style>
    .btn-custom {
      background-color: #00a676;
      color: white;
      width: 200px;
    }

    .btn-custom:hover {
      background-color: #008f5a;
      color: white;
    }

    .text-justify {
      text-align: justify;
    }

    /* Mengatur margin dan padding carousel */
    #materi {
      padding-bottom: 40px; /* Jarak bawah section */
    }
  </style>
</head>

<body>
  <div class="container-fluid p-0 m-0">
    <header class="navbar navbar-expand-lg navbar-light bg-warning">
      <img src="../../images/icon-header-left.png" alt="icon-owl" width="80">
      <ul class="nav nav-pills nav-fill">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pages/game/game.php">Game</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pages/Quiz/quiz.php">Quiz</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pages/profile/profile.php">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pages/about.php">About</a>
        </li>
      </ul>
    </header>

    <section class="parallax-bg">
      <div class="parallax-overlay"></div>
      <div class="parallax-content animate__animated animate__fadeInDown">
        <h1 class="text-5xl font-bold mb-4">Welcome to Luminara Library</h1>
        <p class="text-xl">Your Gateway to Unlimited Knowledge</p>
        <a href="#materi" class="mt-8 inline-block bg-blue-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-600 transition duration-300">Explore Now</a>
      </div>
    </section>

    <main>
      <!-- Section Materi dengan Carousel -->
      <section id="materi" class="py-5">
        <div class="container">
          <h2 class="text-center mb-4">Materi</h2>

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
                    <p class="text-justify">Materi 1: Temukan berbagai materi pembelajaran interaktif yang menarik dan mudah dipahami.</p>
                    <a href="pages/materi/materi.php?id=1" class="btn btn-custom mt-3">Selengkapnya</a>
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
                    <p class="text-justify">Materi 2: 
                      Untuk menempatkan carousel-item di luar section materi, kita bisa membuat struktur HTML di mana section dan carousel menjadi dua elemen terpisah, tetapi tetap menjaga tampilan dan fungsionalitas. Berikut adalah versi yang diperbarui dari kode yang memindahkan carousel-item di luar section materi tetapi masih mencakup semua konten yang relevan.</p>
                    <a href="pages/materi/materi.php?id=2" class="btn btn-custom mt-3">Selengkapnya</a>
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
                    <p class="text-justify">Materi 3: Asah pemahamanmu dengan materi yang lebih menantang.</p>
                    <a href="pages/materi/materi.php?id=3" class="btn btn-custom mt-3">Selengkapnya</a>
                  </div>
                </div>
              </div>
            </div>

            <!-- Navigasi Kiri-Kanan -->
            <button class="carousel-control-prev" type="button" data-bs-target="#materiCarousel" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#materiCarousel" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </section>

      <!-- Section Game -->
      <section id="game">
        <div class="container py-5">
          <h2 class="text-center mb-4">Game</h2>
          <p class="text-center">Asah kemampuanmu dengan berbagai game edukatif yang seru!</p>
          <a href="pages/game/game.php" class="btn btn-custom d-block mx-auto mt-3">Mainkan Game</a>
        </div>
      </section>

      <!-- Section Quiz -->
      <section id="quiz">
        <div class="container py-5">
          <h2 class="text-center mb-4">Quiz</h2>
          <p class="text-center">Uji pengetahuanmu dengan berbagai quiz yang menantang.</p>
          <a href="pages/quiz/quiz.php" class="btn btn-custom d-block mx-auto mt-3">Mulai Quiz</a>
        </div>
      </section>
    </main>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
