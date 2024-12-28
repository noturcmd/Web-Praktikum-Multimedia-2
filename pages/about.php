<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>About</title>
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

    .container {
      padding-top: 90px;
      backdrop-filter: blur(10px);
      background: rgba(0, 0, 0, 0.5);
      border-radius: 20px;
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
    }

    header {
      background: rgba(0, 0, 0, 0.9);
      backdrop-filter: blur(10px);
      box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
      position: fixed;
      width: 100%;
      top: 0;
      z-index: 1000;
    }

    .navbar-brand {
      transition: all 0.3s ease;
    }

    .navbar-brand:hover {
      transform: scale(1.05);
    }

    .navbar-brand img {
      filter: drop-shadow(0 0 8px rgba(255, 215, 0, 0.6));
    }

    .author-card {
      background: rgba(255, 255, 255, 0.1);
      border-radius: 15px;
      padding: 20px;
      margin-bottom: 30px;
      transition: all 0.3s ease;
      border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .author-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
      background: rgba(255, 255, 255, 0.15);
    }

    .rounded-circle {
      border: 3px solid #ffd700;
      box-shadow: 0 0 20px rgba(255, 215, 0, 0.3);
      transition: all 0.3s ease;
    }

    .rounded-circle:hover {
      transform: scale(1.1) rotate(5deg);
    }

    h1,
    h2 {
      background: linear-gradient(45deg, #ffd700, #ff8c00);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }

    .lead {
      line-height: 1.8;
      font-size: 1.2rem;
      text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
    }

    hr {
      background: linear-gradient(90deg, transparent, #ffd700, transparent);
      height: 2px;
      border: none;
    }

    .list-unstyled li {
      margin-bottom: 10px;
      transition: all 0.3s ease;
      padding: 5px 10px;
      border-radius: 5px;
    }

    .list-unstyled li:hover {
      background: rgba(255, 215, 0, 0.1);
      transform: translateX(10px);
    }

    strong {
      color: #ffd700;
      margin-right: 8px;
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

    @media (max-width: 768px) {
      .container {
        padding-top: 70px;
      }

      .author-card {
        flex-direction: column;
        text-align: center;
      }

      .rounded-circle {
        margin: 20px auto;
      }
    }
  </style>
</head>

<body>
  <div class="container-fluid p-0 m-0">
    <header class="navbar navbar-expand-lg navbar-dark px-3">
      <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="../index.php">
          <img src="../logo/logo_mulmed.png" alt="icon-owl" width="50" class="me-2">
          <span class="text-white fw-bold">Beastie Brain Tease</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto text-center">
            <li class="nav-item">
              <a class="nav-link fw-bold text-white" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold text-white" href="materi/materi.php">Materi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold text-white" href="game.php">Game</a>
            </li>
            <?php if (isset($_COOKIE['logusmulmed'])): ?>
              <li class="nav-item">
                <a class="nav-link fw-bold text-white" href="quiz/quiz.php">Quiz</a>
              </li>
            <?php endif; ?>
            <li class="nav-item">
              <a class="nav-link fw-bold text-white text-decoration-underline" href="about.php">About</a>
            </li>
            <?php if (isset($_COOKIE['logusmulmed'])): ?>
              <li class="nav-item dropdown profile-dropdown ms-3">
                <a class="nav-link dropdown-toggle p-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="../img-users/no-photo.jpg" alt="User Profile" class="profile-img rounded-circle" width="40" height="40">
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li><a class="dropdown-item" href="profile/profile.php">My Profile</a></li>
                  <li>
                    <hr class="dropdown-divider bg-light">
                  </li>
                  <li><a class="dropdown-item" href="../business-logic/validate-logout.php" onclick="return confirm('Yakin ingin logout?')">Logout</a></li>
                </ul>
              </li>
            <?php else: ?>
              <li class="nav-item ms-3">
                <a class="btn btn-outline-warning fw-bold" href="../login.php">Login</a>
              </li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </header>

    <section class="container my-5">
      <div class="text-center" data-aos="fade-up">
        <h1 class="fw-bold mb-4">About Beastie Brain Tease</h1>
        <p class="lead">
          Beastie Brain Tease adalah platform pembelajaran interaktif yang dirancang untuk membantu pengguna memperluas pengetahuan mereka melalui materi edukatif, game interaktif, dan quiz yang menantang.
          Kami percaya bahwa belajar bisa menjadi lebih menyenangkan dengan pengalaman yang interaktif dan menghibur.
        </p>
      </div>
      <hr class="my-5">

      <div class="text-center" data-aos="fade-up">
        <h2 class="fw-bold mb-4">Author Information</h2>
        <div class="row justify-content-center">
          <div class="col-lg-8 author-card d-flex align-items-center mb-4" data-aos="fade-right">
            <div class="flex-grow-1 text-start">
              <ul class="list-unstyled">
                <li><strong>Nama:</strong> Defriansyah Aji Pratama</li>
                <li><strong>NIM:</strong> K3522018</li>
                <li><strong>Jurusan:</strong> PTIK</li>
                <li><strong>Fakultas:</strong> FKIP</li>
                <li><strong>Universitas:</strong> Universitas Sebelas Maret</li>
              </ul>
            </div>
            <img src="../img-users/no-photo.jpg" alt="Author Photo 1" class="rounded-circle ms-4" style="width: 120px; height: 120px; object-fit: cover;">
          </div>

          <div class="col-lg-8 author-card d-flex align-items-center mb-4" data-aos="fade-left">
            <div class="flex-grow-1 text-start">
              <ul class="list-unstyled">
                <li><strong>Nama:</strong> Muhammad Wildan Azizi</li>
                <li><strong>NIM:</strong> K3522050</li>
                <li><strong>Jurusan:</strong> PTIK</li>
                <li><strong>Fakultas:</strong> FKIP</li>
                <li><strong>Universitas:</strong> Universitas Sebelas Maret</li>
              </ul>
            </div>
            <img src="../img-users/no-photo.jpg" alt="Author Photo 2" class="rounded-circle ms-4" style="width: 120px; height: 120px; object-fit: cover;">
          </div>

          <div class="col-lg-8 author-card d-flex align-items-center mb-4" data-aos="fade-right">
            <div class="flex-grow-1 text-start">
              <ul class="list-unstyled">
                <li><strong>Nama:</strong> Ridawanul Bakhri</li>
                <li><strong>NIM:</strong> K3522068</li>
                <li><strong>Jurusan:</strong> PTIK</li>
                <li><strong>Fakultas:</strong> FKIP</li>
                <li><strong>Universitas:</strong> Universitas Sebelas Maret</li>
              </ul>
            </div>
            <img src="../img-users/no-photo.jpg" alt="Author Photo 3" class="rounded-circle ms-4" style="width: 120px; height: 120px; object-fit: cover;">
          </div>
        </div>
      </div>
    </section>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init({
      duration: 1000,
      once: true
    });
  </script>
</body>

</html>
<?php
$koneksi = null
?>