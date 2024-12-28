<?php

include "../../connection/db_connection.php";
$idUser = $_COOKIE['logusid'];
$query = "SELECT status_kuis FROM users WHERE id='$idUser'";
$koneksi = getConnection();

$result = $koneksi->query($query);
$result = $result->fetchAll(PDO::FETCH_ASSOC);
if ($result[0]['status_kuis'] == "selesai") {
  header("location: quiz-result.php");
  exit();
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quiz Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../../styles/parallax.css">
  <link rel="stylesheet" href="../../styles/StylePages.css">
  <style>
    body {
      background: linear-gradient(135deg, #1a1a1a, #2d2d2d);
      min-height: 100vh;
      color: #fff;
    }

    .quiz-container {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(10px);
      border-radius: 20px;
      padding: 2rem;
      box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
      border: 1px solid rgba(255, 255, 255, 0.18);
      margin-top: 3rem;
    }

    .question-card {
      background: rgba(255, 255, 255, 0.05);
      border-radius: 15px;
      padding: 1.5rem;
      margin-bottom: 1.5rem;
      transition: transform 0.3s ease;
    }

    .question-card:hover {
      transform: translateY(-5px);
    }

    .option-label {
      display: block;
      padding: 1rem;
      margin: 0.5rem 0;
      border-radius: 10px;
      background: rgba(255, 255, 255, 0.08);
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .option-label:hover {
      background: rgba(255, 193, 7, 0.2);
    }

    input[type="radio"]:checked+.option-label {
      background: rgba(255, 193, 7, 0.4);
      border: 1px solid #ffc107;
    }

    .btn-submit {
      background: linear-gradient(45deg, #ffd700, #ff8c00);
      border: none;
      padding: 12px 35px;
      font-weight: bold;
      border-radius: 25px;
      transition: all 0.3s ease;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    .btn-submit:hover {
      transform: translateY(-3px);
      box-shadow: 0 5px 15px rgba(255, 215, 0, 0.4);
      background: linear-gradient(45deg, #ff8c00, #ffd700);
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
                <a class="nav-link dropdown-toggle p-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="../../img-users/no-photo.jpg" alt="User Profile" class="profile-img rounded-circle" width="40" height="40">
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li><a class="dropdown-item" href="../profile/profile.php">My Profile</a></li>
                  <li>
                    <hr class="dropdown-divider bg-light">
                  </li>
                  <li><a class="dropdown-item" href="../../business-logic/validate-logout.php">Logout</a></li>
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

    <div class="quiz-container animate__animated animate__fadeIn">
      <h1 class="text-center text-warning mb-5" style="margin-top: 60px;">Knowledge Quiz</h1>

      <form action="../../business-logic/process-quiz.php" method="POST">
        <?php
        // Database connection
        require_once '../../connection/db_connection.php';

        try {
          // Fetch questions from database
          $conn = getConnection();
          $stmt = $conn->prepare("SELECT id_soal, id_materi, soal, opsi FROM soal ORDER BY id_soal");
          $stmt->execute();
          $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);

          // Counter for question numbering
          $questionNumber = 1;

          // Loop through each question
          foreach ($questions as $question) {
            // Convert options string to array (assuming options are stored as JSON or comma-separated)
            $options = $question['opsi'];
            $options = explode(";", $options);

            if (!$options) {
              // If not JSON, try comma-separated
              $options = explode(',', $question['opsi']);
            }
        ?>
            <div class="question-card">
              <h5 class="mb-4"><?php echo $questionNumber . '. ' . htmlspecialchars($question['soal']); ?></h5>
              <div class="options">
                <?php
                // Loop through options
                foreach ($options as $key => $option) {
                  $optionId = 'q' . $question['id_soal'] . '_' . $key;
                ?>
                  <div class="option">
                    <input type="radio"
                      name="q<?php echo $question['id_soal']; ?>"
                      id="<?php echo $optionId; ?>"
                      value="<?php echo $option; ?>"
                      class="d-none">
                    <label for="<?php echo $optionId; ?>" class="option-label">
                      <?php echo htmlspecialchars($option); ?>
                    </label>
                  </div>
                <?php
                }
                ?>
              </div>
            </div>
        <?php
            $questionNumber++;
          }
        } catch (PDOException $e) {
          echo '<div class="alert alert-danger">Error loading questions. Please try again later.</div>';
        }
        ?>

        <div class="text-center mt-5">
          <button type="submit" class="btn btn-submit">Submit Answers</button>
        </div>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>