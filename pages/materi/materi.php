<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Materi</title>
  <link rel="shortcut icon" href="../../logo/logo_mulmed.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="../../styles/style1.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="stylesheet" href="../../styles/parallax.css">
</head>

<body>
  <div class="container-fluid p-0 m-0">
    <!-- Header yang diselaraskan dengan index.php -->
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
              <a class="nav-link fw-bold text-white link-secondary" href="../../index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold text-white text-decoration-underline link-secondary" href="../materi/materi.php">Materi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold text-white link-secondary" href="../game.php">Game</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold text-white link-secondary" href="../quiz/quiz.php">Quiz</a>
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


    <!-- Konten lainnya tetap sama -->
    <section class="parallax-bg m-0 p-0">
      <div class="parallax-overlay"></div>
      <div class="parallax-content animate__animated animate__fadeInDown">
        <h1 class="display-2 fw-bold mb-4 text-warning">Materi Pembelajaran</h1>
        <p class="display-6 text-white">Tingkatkan Pengetahuanmu</p>
        <a href="#materi" class="mt-8 inline-block bg-blue-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-600 transition duration-300 h3">Mari belajar, semoga ilmunya bermanfaat!</a>
      </div>
    </section>

    <main>
      <section class="materi" id="materi">
        <button class="arrow left">&#9664;</button>
        <div class="content-box">
          <img src="" alt="">
        </div>
        <button class="arrow right">&#9654;</button>
      </section>

      <section class="additional-section">
        <h2>Additional Content</h2>
        <p>This section also inherits the background gradient from the main element.</p>
      </section>
    </main>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>