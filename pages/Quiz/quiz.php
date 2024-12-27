<?php

session_start();

include "../../connection/db_connection.php";
include "../../business-logic/update-progress-user.php";


$current_question = isset($_GET['q']) ? (int)$_GET['q'] : 0;

$koneksi = getConnection();

$query = "SELECT * FROM soal";
$stm = $koneksi->prepare($query);
$stm->execute();
$user = $stm->fetchAll(PDO::FETCH_ASSOC);

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
    updateProgressUser($current_question, count($user), $_COOKIE['logusid'], $koneksi);
  }

  if ($current_question >= count($questions)) {
    $correct_answers = 0;
    for ($i=0; $i < count($questions); $i++) {
      $jawabanUser = explode(")", $_SESSION['answers'][$i]);
      $jawabanUser = $jawabanUser[0];
      if($jawabanUser == $questions[$i]['correct']){
        $correct_answers += 1;
      }
    }
    $skorAkhir = ($correct_answers / count($questions)) * 100;
    updateSkor($skorAkhir, $_COOKIE['logusid'], $koneksi);
    $_SESSION['final_score'] = $skorAkhir;
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
              <a class="nav-link fw-bold text-white link-secondary" href="../game.php">Game</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold text-white link-secondary text-decoration-underline" href="quiz.php">Quiz</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold text-white link-secondary" href="../about.php">About</a>
            </li>
            <?php if (isset($_COOKIE['logusmulmed'])): ?>
              <li class="nav-item dropdown profile-dropdown ms-3">
                <a class="nav-link dropdown-toggle p-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="../../img-users/no-photo.jpg" alt="User Profile" class="profile-img rounded-circle" width="40" height="40">
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li><a class="dropdown-item" href="pages/profile/profile.php">My Profile</a></li>
                  <li>
                    <hr class="dropdown-divider bg-light">
                  </li>
                  <li><a class="dropdown-item" href="../../business-logic/validate-logout.php">Logout</a></li>
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

    <main class="quiz-container" style="margin-top: 200px;" id="kuis">

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
          <div class="score-display h3">Skor Akhir : <?php echo number_format($_SESSION['final_score'], 0); ?></div>
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
          <button class="btn btn-custom mt-2" onclick="window.location.href='?q=0'">Mulai Ulang Kuis</button>
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