<?php
session_start();
include "../../connection/db_connection.php";
$idUser = $_COOKIE['logusid'];
$query = "SELECT skor, status_kuis FROM users WHERE id='$idUser'";
$koneksi = getConnection();

$result = $koneksi->query($query);
$result = $result->fetchAll(PDO::FETCH_ASSOC);
if($result[0]['status_kuis'] == "selesai"){
  $skor = $result[0]['skor'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quiz Results</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="stylesheet" href="../../styles/parallax.css">
  <link rel="stylesheet" href="../../styles/StylePages.css">
  <style>
    body {
      background: linear-gradient(135deg, #1a1a1a, #2d2d2d);
      min-height: 100vh;
      color: #fff;
      font-family: 'Poppins', sans-serif;
    }

    .result-container {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(10px);
      border-radius: 20px;
      padding: 3rem;
      box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
      border: 1px solid rgba(255, 255, 255, 0.18);
      margin-top: 5rem;
      text-align: center;
    }

    .score-display {
      font-size: 4rem;
      font-weight: bold;
      color: #ffc107;
      margin: 2rem 0;
      text-shadow: 0 0 10px rgba(255, 193, 7, 0.5);
    }

    .result-message {
      font-size: 1.5rem;
      margin-bottom: 2rem;
    }

    .btn-action {
      background: linear-gradient(45deg, #ffd700, #ff8c00);
      border: none;
      padding: 12px 35px;
      font-weight: bold;
      border-radius: 25px;
      transition: all 0.3s ease;
      text-transform: uppercase;
      letter-spacing: 1px;
      margin: 0 10px;
    }

    .btn-action:hover {
      transform: translateY(-3px);
      box-shadow: 0 5px 15px rgba(255, 215, 0, 0.4);
      background: linear-gradient(45deg, #ff8c00, #ffd700);
    }

    .progress {
      height: 25px;
      background: rgba(255, 255, 255, 0.1);
      border-radius: 15px;
      margin: 2rem 0;
    }

    .progress-bar {
      background: linear-gradient(45deg, #ffd700, #ff8c00);
      border-radius: 15px;
      transition: width 1.5s ease-in-out;
    }
  </style>
</head>
<body>
  <div class="container-fluid p-0 m-0">
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
                <a class="nav-link fw-bold text-white text-decoration-underline" href="quiz.php">Quiz</a>
              </li>
            <?php endif; ?>
            <li class="nav-item">
              <a class="nav-link fw-bold text-white" href="../about.php">About</a>
            </li>
            <?php if (isset($_COOKIE['logusmulmed'])): ?>
              <li class="nav-item dropdown profile-dropdown ms-3">
                <a class="nav-link dropdown-toggle p-0 text-warning" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="../../img-users/no-photo.jpg" alt="User Profile" class="profile-img rounded-circle" width="40" height="40">
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li><a class="dropdown-item text-warning" href="../profile/profile.php">My Profile</a></li>
                  <li><hr class="dropdown-divider bg-light"></li>
                  <li><a class="dropdown-item text-warning" href="../../business-logic/validate-logout.php" onclick="return confirm('Yakin ingin logout?')">Logout</a></li>
                </ul>
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
    <div class="result-container animate__animated animate__fadeIn">
      <h1 class="mb-4 text-white h2">Quiz Results</h1>
      
      <?php

      
      if($result[0]['status_kuis'] == "selesai") {
        $percentage = number_format($skor, 1);
        
        echo '<div class="progress">';
        echo '<div class="progress-bar" role="progressbar" style="width: ' . $percentage . '%" ';
        echo 'aria-valuenow="' . $percentage . '" aria-valuemin="0" aria-valuemax="100"></div>';
        echo '</div>';
        
        echo '<div class="score-display">' . $percentage . '</div>';
        
        if($percentage >= 80) {
          echo '<p class="result-message">Excellent! You\'ve mastered this topic!</p>';
        } elseif($percentage >= 60) {
          echo '<p class="result-message">Good job! Keep practicing to improve further!</p>';
        } else {
          echo '<p class="result-message">Keep learning! You\'ll do better next time!</p>';
        }
        
      } else {
        echo '<p class="result-message">No quiz results available.</p>';
      }
      ?>
      
      <div class="mt-4">
        <a href="../../business-logic/update-status-kuis.php" class="btn btn-action">Try Again</a>
        <a href="../../index.php" class="btn btn-action">Home</a>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
$koneksi = null
?>