<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Game</title>
  <link rel="shortcut icon" href="../logo/logo_mulmed.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="stylesheet" href="../styles/parallax.css">
  <link rel="stylesheet" href="../styles/StylePages.css">
  <style>
    body {
      background: linear-gradient(135deg, #1a1a1a, #2d2d2d);
      color: #ffffff;
      font-family: 'Poppins', sans-serif;
    }

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

    #game-section {
      padding: 2rem;
      background: rgba(0, 0, 0, 0.8);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    #game-iframe {
      width: 90%;
      height: 80vh;
      border: 3px solid #ffc107;
      border-radius: 15px;
      box-shadow: 0 0 20px rgba(255, 193, 7, 0.3);
      margin-bottom: 1rem;
    }

    .fullscreen-btn {
      text-align: center;
      margin-top: 1rem;
    }

    #fullscreen-btn {
      background: linear-gradient(45deg, #ffd700, #ff8c00);
      border: none;
      border-radius: 25px;
      padding: 10px 30px;
      font-weight: bold;
      transition: all 0.3s ease;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    #fullscreen-btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 5px 15px rgba(255, 215, 0, 0.4);
      background: linear-gradient(45deg, #ff8c00, #ffd700);
    }

    #play-btn {
      background: linear-gradient(45deg, #ffd700, #ff8c00);
      border: none;
      text-decoration: none;
      border-radius: 25px;
      padding: 15px 40px;
      font-weight: bold;
      transition: all 0.3s ease;
      text-transform: uppercase;
      letter-spacing: 2px;
      color: #000;
      box-shadow: 0 4px 15px rgba(255, 215, 0, 0.3);
    }

    #play-btn:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 25px rgba(255, 215, 0, 0.5);
      background: linear-gradient(45deg, #ff8c00, #ffd700);
    }

    .parallax-content h1 {
      font-size: 4rem;
      text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.5);
      margin-bottom: 1.5rem;
    }

    .parallax-content p {
      font-size: 2rem;
      color: #fff;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
      margin-bottom: 2rem;
    }

    @media (max-width: 768px) {
      #game-iframe {
        height: 60vh;
      }
      
      .parallax-content h1 {
        font-size: 2.5rem;
      }
      
      .parallax-content p {
        font-size: 1.5rem;
      }
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
          <ul class="navbar-nav ms-auto text-center">
            <li class="nav-item"><a class="nav-link fw-bold text-white" href="../index.php">Home</a></li>
            <li class="nav-item"><a class="nav-link fw-bold text-white" href="materi/materi.php">Materi</a></li>
            <li class="nav-item"><a class="nav-link fw-bold text-white text-decoration-underline" href="game.php">Game</a></li>
            <li class="nav-item"><a class="nav-link fw-bold text-white" href="Quiz/quiz.php">Quiz</a></li>
            <li class="nav-item"><a class="nav-link fw-bold text-white" href="about.php">About</a></li>
            <?php if (isset($_COOKIE['logusmulmed'])): ?>
              <li class="nav-item dropdown profile-dropdown ms-3">
                <a class="nav-link dropdown-toggle p-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="img-users/no-photo.jpg" alt="User Profile" class="profile-img rounded-circle" width="40" height="40">
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li><a class="dropdown-item" href="profile/profile.php">My Profile</a></li>
                  <li><hr class="dropdown-divider bg-light"></li>
                  <li><a class="dropdown-item" href="login.php">Logout</a></li>
                </ul>
              </li>
            <?php else: ?>
              <li class="nav-item ms-3">
                <a class="btn btn-outline-warning fw-bold" href="login.php">Login</a>
              </li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </header>

    <!-- Section Parallax -->
    <section class="parallax-bg">
      <div class="parallax-overlay"></div>
      <div class="parallax-content animate__animated animate__fadeInDown">
        <h1 class="text-warning font-bold">Play the Game</h1>
        <p>Increase Your Knowledge</p>
        <a href="#game-section" id="play-btn" class="mt-8">Play Now</a>
      </div>
    </section>

    <!-- Section Game -->
    <section id="game-section">
      <iframe id="game-iframe" src="../game/index.html"></iframe>
      <div class="fullscreen-btn">
        <button id="fullscreen-btn" class="btn">Fullscreen</button>
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