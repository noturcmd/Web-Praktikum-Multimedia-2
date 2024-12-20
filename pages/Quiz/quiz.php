<?php

session_start();

include "../../connection/db_connection.php";
$current_question = isset($_GET['q']) ? (int)$_GET['q'] : 0;

$query = "SELECT * FROM soal";
$stm = $koneksi->prepare($query);
$stm->execute();
$user = $stm->fetchAll();


$questions = array();

for ($i = 0; $i < count($user); $i++) {
  $opsi = explode(";", $user[$i]["opsi"]);
  $question = [];
  $question['question'] = $user[$i]['soal'];
  $opsi2 = [];
  foreach ($opsi as $value) {
    $opsi2[] = $value;
  }
  $question['options'] = $opsi2;
  $question['correct'] = $user[$i]['jawaban'];
  $questions[] = $question;
}





if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['answer'])) {
    $_SESSION['answers'][$current_question - 1] = $_POST['answer'];
  }

  if ($current_question >= count($questions)) {
    $correct_answers = 0;
    foreach ($questions as $index => $question) {

      if (isset($_SESSION['answers'][$index]) && strtolower($_SESSION['answers'][$index]) === strtolower($question['correct'])) {
        $correct_answers++;
      }
    }
    $_SESSION['final_score'] = ($correct_answers / count($questions)) * 100;
  }
}

if ($current_question === 0) {
  $_SESSION['answers'] = array();
  unset($_SESSION['final_score']);
}
?>


<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kuis Interaktif</title>
  <link rel="shortcut icon" href="../../logo/logo_mulmed.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../../styles/style1.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="stylesheet" href="../../styles/parallax.css">
  <link rel="stylesheet" href="../../styles/quiz.css">

  <style>
    .quiz-container {
      border-radius: 30px;
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
      padding: 40px;
      max-width: 900px;
      margin: 40px auto;
      position: relative;
      overflow: hidden;
      background: rgba(255, 255, 255, 0.9) !important;
    }

    .quiz-intro {
      text-align: center;
      margin-bottom: 30px;
      padding: 20px;
      background: linear-gradient(45deg, rgba(255, 107, 107, 0.1), rgba(78, 205, 196, 0.1));
      border-radius: 15px;
    }

    .quiz-intro h2 {
      color: #FF6B6B;
      font-weight: 700;
      font-size: 2.2em;
      margin-bottom: 15px;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    .quiz-intro p {
      color: #2C3E50;
      font-size: 1.1em;
      line-height: 1.6;
      max-width: 800px;
      margin: 0 auto;
    }

    .progress {
      height: 12px;
      border-radius: 10px;
      background: rgba(0, 0, 0, 0.1);
      margin-bottom: 30px;
    }

    .progress-bar {
      background: goldenrod;
      transition: width 0.5s ease;
    }

    .option-card {
      background: rgba(255, 255, 255, 0.8) !important;
      border: 2px solid rgba(78, 205, 196, 0.3) !important;
      border-radius: 20px;
      padding: 20px;
      margin: 15px 0;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .option-card:hover {
      transform: translateY(-5px);
      background: rgba(78, 205, 196, 0.2) !important;
      border-color: #4ECDC4 !important;
    }

    .option-card.selected {
      background: linear-gradient(45deg, rgba(78, 205, 196, 0.9), rgba(46, 204, 113, 0.9)) !important;
      color: white;
      border-color: transparent;
    }

    .btn-custom {
      background: #000A1F;
      color: white;
      padding: 15px 40px;
      border-radius: 50px;
      border: none;
      font-size: 1.2em;
      transition: all 0.3s ease;
    }

    .btn-custom:hover {
      transform: translateY(-3px);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
      color: white;
    }
  </style>
</head>

<body>

  <div class="container-fluid p-0 m-0">
    <header class="navbar navbar-expand-lg navbar-dark bg-black px-3">
      <div class="container-fluid">
        <!-- Logo -->
        <a href="../../index.php" class="navbar-brand d-flex align-items-center">
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
              <a class="nav-link fw-bold text-white link-secondary" aria-current="page" href="../../index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold text-white link-secondary" href="../materi/materi.php">Materi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold text-white link-secondary" href="../game/game.php">Game</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold text-white link-secondary text-decoration-underline" href="quiz.php">Quiz</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold text-white link-secondary" href="../profile/profile.php">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold text-white link-secondary" href="../about.php">About</a>
            </li>
          </ul>
        </div>
      </div>
    </header>

    <section class="parallax-bg">
      <div class="parallax-overlay"></div>
      <div class="parallax-content animate__animated animate__fadeInDown">
        <h1 class="text-5xl font-bold mb-4">Play the Game</h1>
        <p class="text-xl">Increase Your Knowledge</p>
        <a href="#kuis" class="mt-8 inline-block bg-blue-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-600 transition duration-300">Play Now</a>
      </div>
    </section>

    <main class="quiz-container mt-5" id="kuis">

      <div class="quiz-intro animate__animated animate__fadeIn">
        <h2>✨ Selamat Datang di Kuis Interaktif! ✨</h2>
        <p class="lead">
          Mari uji pengetahuan Anda melalui serangkaian pertanyaan menarik.
          Setiap jawaban yang tepat membawa Anda selangkah lebih dekat menuju keberhasilan!
        </p>
      </div>

      <?php if (isset($_SESSION['final_score']) && $current_question >= count($questions)): ?>
        <div class="result-container animate__animated animate__bounceIn">
          <h2>Selamat! Anda telah menyelesaikan kuis</h2>
          <div class="score-display"><?php echo number_format($_SESSION['final_score'], 0); ?></div>
          <div class="score-message">
            <?php
            if ($_SESSION['final_score'] == 100) {
              echo "Sempurna! Anda menjawab semua pertanyaan dengan benar!";
            } elseif ($_SESSION['final_score'] >= 80) {
              echo "Bagus sekali! Anda hampir sempurna!";
            } elseif ($_SESSION['final_score'] >= 60) {
              echo "Cukup baik! Tetap semangat!";
            } else {
              echo "Jangan menyerah! Coba lagi!";
            }
            ?>
          </div>
          <button class="btn btn-custom" onclick="window.location.href='?q=0'">Mulai Ulang Kuis</button>
        </div>
      <?php else: ?>
        <div class="progress">
          <div class="progress-bar" role="progressbar" style="width: <?php echo (($current_question + 1) / count($questions)) * 100; ?>%"></div>
        </div>

        <div class="text-center mb-4">
          <div class="question-number animate__animated animate__bounceIn">
            <?php echo $current_question + 1; ?>/<?php echo count($questions); ?>
          </div>
          <h5 class="question-text animate__animated animate__fadeIn">
            <?php echo $questions[$current_question]['question']; ?>
          </h5>
        </div>

        <form method="POST" action="?q=<?php echo $current_question + 1; ?>" id="quizForm">
          <div class="options animate__animated animate__fadeInUp">
            <?php foreach ($questions[$current_question]['options'] as $index => $value): ?>
              <div class="option-card <?php echo (isset($_SESSION['answers'][$current_question]) && $_SESSION['answers'][$current_question] === $value) ? 'selected' : ''; ?>"
                onclick="selectOption(this, '<?php echo $value; ?>')">
                <div class="d-flex align-items-center">
                  <div class="option-number me-3"><?php echo chr(65 + $index); ?>.</div>
                  <div class="option-text"><?php echo $value; ?></div>
                </div>
              </div>
            <?php endforeach; ?>
            <input type="hidden" name="answer" id="selectedAnswer">
          </div>

          <div class="d-flex justify-content-between mt-5">
            <?php if ($current_question > 0): ?>
              <button type="button" class="btn btn-custom" onclick="window.location.href='?q=<?php echo $current_question - 1; ?>'">
                ← Sebelumnya
              </button>
            <?php else: ?>
              <div></div>
            <?php endif; ?>

            <button type="submit" class="btn btn-custom">
              <?php echo ($current_question < count($questions) - 1) ? 'Selanjutnya →' : 'Selesai ✓'; ?>
            </button>
          </div>
        </form>
      <?php endif; ?>
    </main>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function selectOption(element, answer) {
      document.querySelectorAll('.option-card').forEach(card => {
        card.classList.remove('selected');
        card.classList.remove('animate__animated');
        card.classList.remove('animate__pulse');
      });

      element.classList.add('selected');
      element.classList.add('animate__animated');
      element.classList.add('animate__pulse');

      document.getElementById('selectedAnswer').value = answer;
    }

    document.getElementById('quizForm').onsubmit = function(e) {
      if (!document.getElementById('selectedAnswer').value) {
        e.preventDefault();
        alert('Silakan pilih jawaban terlebih dahulu!');
        return false;
      }
      return true;
    }
  </script>
</body>

</html>