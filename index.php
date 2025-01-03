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
  <link rel="stylesheet" href="styles/StylePages.css">
  <style>
    .nav-link {
      position: relative;
      transition: all 0.3s ease;
    }

    .nav-link:hover {
      color: #ffc107 !important;
      transform: translateY(-2px);
    }

    .nav-link::after {
      content: '';
      position: absolute;
      width: 0;
      height: 2px;
      bottom: 0;
      left: 0;
      background-color: #ffc107;
      transition: width 0.3s ease;
    }

    .nav-link:hover::after {
      width: 100%;
    }

    .profile-dropdown {
      position: relative;
    }

    .profile-dropdown .dropdown-menu {
      background: rgba(0, 0, 0, 0.9);
      border: 1px solid #ffc107;
      border-radius: 8px;
      margin-top: 10px;
    }

    .profile-dropdown .dropdown-item {
      color: white;
      transition: all 0.3s ease;
    }

    .profile-dropdown .dropdown-item:hover {
      background: #ffc107;
      color: black;
      transform: translateX(5px);
    }

    .profile-img {
      border: 2px solid #ffc107;
      transition: all 0.3s ease;
    }

    .profile-img:hover {
      transform: scale(1.1);
      box-shadow: 0 0 15px rgba(255, 193, 7, 0.5);
    }

    h2.text-white {
      color: white;
    }
    
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
          <ul class="navbar-nav ms-auto align-items-center">
            <li class="nav-item">
              <a class="nav-link fw-bold text-white text-decoration-underline" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold text-white" href="pages/materi/materi.php">Materi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold text-white" href="pages/game.php">Game</a>
            </li>
            <?php if (isset($_COOKIE['logusmulmed'])): ?>
              <li class="nav-item">
                <a class="nav-link fw-bold text-white" href="pages/Quiz/quiz.php?q=0">Quiz</a>
              </li>
            <?php endif; ?>
            <li class="nav-item">
              <a class="nav-link fw-bold text-white" href="pages/about.php">About</a>
            </li>
            <?php if (isset($_COOKIE['logusmulmed'])): ?>
              <li class="nav-item dropdown profile-dropdown ms-3">
                <a class="nav-link dropdown-toggle p-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="img-users/no-photo.jpg" alt="User Profile" class="profile-img rounded-circle" width="40" height="40">
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li><a class="dropdown-item text-white" href="pages/profile/profile.php">My Profile</a></li>
                  <li>
                    <hr class="dropdown-divider bg-light">
                  </li>
                  <li><a class="dropdown-item text-white" href="business-logic/validate-logout.php" onclick="return confirm('Yakin ingin logout?')">Logout</a></li>
                </ul>
              </li>
            <?php else: ?>
              <li class="nav-item ms-3">
                <a class="btn btn-outline-warning fw-bold text-white" href="login.php">Login</a>
              </li>
            <?php endif; ?>
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

      <!-- Section Materi -->
      <section id="materi">
        <div class="container py-5">
          <h2 class="text-center mb-4 text-white">Materi </h2>
          <p class="text-center text-white">Tingkatkan pemahamanmu dengan materi pembelajaran!</p>
          <a href="pages/materi/materi.php" class="btn btn-custom d-block mx-auto mt-3 text-white">Ayo Belajar!</a>
        </div>
      </section>

      <!-- Section Game -->
      <section id="game">
        <div class="container py-5">
          <h2 class="text-center mb-4 text-white">Game</h2>
          <p class="text-center text-white">Asah kemampuanmu dengan berbagai game edukatif yang seru!</p>
          <a href="pages/game.php" class="btn btn-custom d-block mx-auto mt-3 text-white">Mainkan Game</a>
        </div>
      </section>

      <!-- Section Quiz -->
      <section id="quiz">
        <div class="container py-5">
          <h2 class="text-center mb-4 text-white">Quiz</h2>
          <p class="text-center text-white">Uji pengetahuanmu dengan berbagai quiz yang menantang.</p>
          <a href="pages/Quiz/quiz.php" class="btn btn-custom d-block mx-auto mt-3 text-white">Mulai Quiz</a>
        </div>
      </section>
    </main>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>

<?php $koneksi = null ?>