<?php
include "../../connection/db_connection.php";

$koneksi = getConnection();

$query = "select * from materi limit 3";

$result = $koneksi->query($query);
$result = $result->fetchAll(PDO::FETCH_ASSOC);


?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Materi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="shortcut icon" href="../../logo/logo_mulmed.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="stylesheet" href="../../styles/parallax.css">
  <link rel="stylesheet" href="../../styles/profile.css">
  <style>
    body {
      background-color: #f8f9fa;
    }

    .card {
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
      transform: scale(1.05);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }

    .navbar {
      background-color: #343a40;
    }

    .navbar-brand {
      font-weight: bold;
    }

    .page-header {
      padding: 50px 0;
      background: linear-gradient(45deg, #343a40, #6c757d);
      color: white;
      text-align: center;
    }

    .page-header h1 {
      margin: 0;
      font-size: 2.5rem;
    }

    .btn-custom {
      background-color: #ffc107;
      border: none;
    }

    .btn-custom:hover {
      background-color: #e0a800;
    }
  </style>
</head>

<body>
  <header class="navbar navbar-expand-lg navbar-dark bg-black px-3">
    <div class="container-fluid">
      <!-- Logo dan Judul -->
      <a class="navbar-brand d-flex align-items-center" href="../../index.php">
        <img src="../../logo/logo_mulmed.png" alt="icon-owl" width="50" class="me-2">
        <span class="text-white fw-bold">Beastie Brain Tease</span>
      </a>

      <!-- Hamburger Menu -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Navbar Links -->
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto text-center">
          <li class="nav-item">
            <a class="nav-link fw-bold text-white" href="../../index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-bold text-white" href="../materi/materi.php">Materi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-bold text-white" href="../game.php">Game</a>
          </li>
          <?php if (isset($_COOKIE['logusmulmed'])): ?>
            <li class="nav-item">
              <a class="nav-link fw-bold text-white" href="../Quiz/quiz.php">Quiz</a>
            </li>
          <?php endif; ?>
          <li class="nav-item">
            <a class="nav-link fw-bold text-white" href="../about.php">About</a>
          </li>
          <?php if (isset($_COOKIE['logusmulmed'])): ?>
            <li class="nav-item">
              <a class="nav-link fw-bold text-white" href="../../business-logic/validate-logout.php" onclick="return confirm('Yakin ingin logout?')">Logout</a>
            </li>
          <?php else: ?>
            <li class="nav-item ms-3">
              <a class="btn btn-outline-warning fw-bold" href="../../login.php">Login</a>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </header>

  <main class="container" style="margin-top: 200px;">
    <div class="row g-4">
      <!-- Card 1 -->
      <div class="col-md-4">
        <div class="card h-100">
          <img src="path/to/your-image1.jpg" class="card-img-top" alt="Materi 1">
          <div class="card-body">
            <h5 class="card-title"><?= $result[0]['judul_materi'] ?></h5>
            <p class="card-text"><?= substr($result[0]['materi'], 0, 100) ?>...</p>
            <a href="pages/materi/materi.php?id=1" class="btn btn-custom w-100">Selengkapnya</a>
          </div>
        </div>
      </div>
      <!-- Card 2 -->
      <div class="col-md-4">
        <div class="card h-100">
          <img src="path/to/your-image2.jpg" class="card-img-top" alt="Materi 2">
          <div class="card-body">
            <h5 class="card-title"><?= $result[1]['judul_materi'] ?></h5>
            <p class="card-text"><?= substr($result[1]['materi'], 0, 100) ?>...</p>
            <a href="pages/materi/materi.php?id=2" class="btn btn-custom w-100">Selengkapnya</a>
          </div>
        </div>
      </div>
      <!-- Card 3 -->
      <div class="col-md-4">
        <div class="card h-100">
          <img src="path/to/your-image3.jpg" class="card-img-top" alt="Materi 3">
          <div class="card-body">
            <h5 class="card-title"><?= $result[2]['judul_materi'] ?></h5>
            <p class="card-text"><?= substr($result[2]['materi'], 0, 100) ?>...</p>
            <a href="pages/materi/materi.php?id=3" class="btn btn-custom w-100">Selengkapnya</a>
          </div>
        </div>
      </div>
    </div>
  </main>

  <footer class="text-center py-4 bg-dark text-white">
    <p>&copy; 2024 Beastie Brain Tease. All rights reserved.</p>
  </footer>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>