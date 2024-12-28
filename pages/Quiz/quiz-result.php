<?php

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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
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
  <div class="container">
    <div class="result-container animate__animated animate__fadeIn">
      <h1 class="mb-4">Quiz Results</h1>
      
      <?php
      session_start();
      
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
