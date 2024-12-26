<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Game</title>
  <link rel="shortcut icon" href="../logo/logo_mulmed.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../styles/style1.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="stylesheet" href="../styles/parallax.css">

  <style>
    /* Latar belakang hitam untuk bagian game */
    #game-section {
      background-color: black;
      color: white;
      padding: 50px 0;
      min-height: 100vh;
    }

    iframe {
      display: block;
      margin: 0 auto;
      width: 80%;
      height: 80vh;
      border: none;
    }

    .fullscreen-btn {
      display: flex;
      justify-content: center;
      margin-top: 20px;
    }
  </style>
</head>

<body>
  <div class="container-fluid p-0 m-0">
    <!-- Header -->
    <header class="navbar navbar-expand-lg navbar-dark bg-black px-3">
      <div class="container-fluid">
        <!-- Logo -->
        <a href="../index.php" class="navbar-brand d-flex align-items-center">
          <img src="../logo/logo_mulmed.png" alt="icon-owl" width="50" class="me-2">
          <span class="text-white fw-bold">Beastie Brain Tease</span>
        </a>

        <!-- Hamburger Menu -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link fw-bold text-white link-secondary" href="../../index.php">Home</a></li>
            <li class="nav-item"><a class="nav-link fw-bold text-white link-secondary" href="../../pages/materi/materi.php">Materi</a></li>
            <li class="nav-item"><a class="nav-link fw-bold text-white text-decoration-underline link-secondary" href="game.php">Game</a></li>
            <li class="nav-item"><a class="nav-link fw-bold text-white link-secondary" href="../quiz/quiz.php">Quiz</a></li>
            <li class="nav-item"><a class="nav-link fw-bold text-white link-secondary" href="../profile/profile.php">Profile</a></li>
            <li class="nav-item"><a class="nav-link fw-bold text-white link-secondary" href="../about.php">About</a></li>
          </ul>
        </div>
      </div>
    </header>

    <!-- Section Parallax -->
    <section class="parallax-bg">
      <div class="parallax-overlay"></div>
      <div class="parallax-content animate__animated animate__fadeInDown">
        <h1 class="h1 text-warning font-bold mb-4">Play the Game</h1>
        <p class="h2">Increase Your Knowledge</p>
        <a href="#game-section" id="play-btn" class="h2 mt-8 inline-block bg-blue-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-600 transition duration-300">Play Now</a>
      </div>
    </section>

    <!-- Section Game -->
    <section id="game-section">
      <iframe id="game-iframe" src="../game/index.html"></iframe>
      <div class="fullscreen-btn">
        <button id="fullscreen-btn" class="btn btn-warning">Fullscreen</button>
      </div>
    </section>
  </div>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Scroll ke bagian game
    document.getElementById('play-btn').addEventListener('click', function(event) {
      event.preventDefault();
      document.querySelector('#game-section').scrollIntoView({
        behavior: 'smooth'
      });
    });

    // Fullscreen untuk iframe
    document.getElementById('fullscreen-btn').addEventListener('click', function() {
      const iframe = document.getElementById('game-iframe');
      if (iframe.requestFullscreen) {
        iframe.requestFullscreen();
      } else if (iframe.mozRequestFullScreen) { // Firefox
        iframe.mozRequestFullScreen();
      } else if (iframe.webkitRequestFullscreen) { // Chrome, Safari and Opera
        iframe.webkitRequestFullscreen();
      } else if (iframe.msRequestFullscreen) { // IE/Edge
        iframe.msRequestFullscreen();
      }
    });
  </script>
</body>

</html>