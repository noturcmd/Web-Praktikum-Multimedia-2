<!doctype html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kuis</title>
  <link rel="shortcut icon" href="../../logo/logo_mulmed.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../../styles/style1.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="stylesheet" href="../../styles/parallax.css">
  <link rel="stylesheet" href="../../styles/quiz.css">
</head>

<body>

  <div class="container-fluid p-0 m-0">
    <header class="navbar navbar-expand-lg navbar-light justify-content-center align-items-center bg-black">
      <img src="../../logo/logo_mulmed.png" alt="icon-owl" width="80">
      <ul class="nav nav-pills nav-fill lead">
        <li class="nav-item">
          <a class="nav-link fw-bold text-white link-secondary" aria-current="page" href="../../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-bold text-white link-secondary" href="../../pages/materi/materi.php">Materi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-bold text-white link-secondary" href="../game/game.php">Game</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-bold text-white text-decoration-underline link-secondary" href="../Quiz/quiz.php">Quiz</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-bold text-white link-secondary" href="../profile/profile.php">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-bold text-white link-secondary" href="../about.php">About</a>
        </li>
      </ul>
    </header>

    <section class="parallax-bg">
      <div class="parallax-overlay"></div>
      <div class="parallax-content animate__animated animate__fadeInDown">
        <h1 class="fw-bold mb-4 display-2 text-warning">Uji Pengetahuanmu</h1>
        <p class="h3">Tantang dirimu dengan berbagai kuis yang menantang!</p>
        <a href="#kuis" class="mt-8 inline-block bg-blue-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-600 transition duration-300 h4">Mulai Kuis</a>
      </div>
    </section>

    <main class="quiz-container" id="kuis">
      <div class="quiz-header">Kuis Pilihan Ganda</div>
      <form>
        <div class="mb-4">
          <div class="question">1. Apa nama hewan yang memiliki punuk dan tinggal di gurun pasir?</div>
          <div class="options">
            <input type="radio" id="q1a" name="q1" value="a">
            <label for="q1a">A. Unta</label>
            <input type="radio" id="q1b" name="q1" value="b">
            <label for="q1b">B. Buaya</label>
            <input type="radio" id="q1c" name="q1" value="c">
            <label for="q1c">C. Harimau</label>
            <input type="radio" id="q1d" name="q1" value="d">
            <label for="q1d">D. Kucing</label>
          </div>
        </div>

        <div class="mb-4">
          <div class="question">2. What is the largest planet in our Solar System?</div>
          <div class="options">
            <input type="radio" id="q2a" name="q2" value="a">
            <label for="q2a">A. Earth</label>
            <input type="radio" id="q2b" name="q2" value="b">
            <label for="q2b">B. Mars</label>
            <input type="radio" id="q2c" name="q2" value="c">
            <label for="q2c">C. Jupiter</label>
            <input type="radio" id="q2d" name="q2" value="d">
            <label for="q2d">D. Saturn</label>
          </div>
        </div>

        <div class="text-center">
          <button type="submit" class="btn btn-primary btn-submit">Submit Quiz</button>
        </div>
      </form>
    </main>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>