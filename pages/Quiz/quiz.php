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
</head>

<body>

  <div class="container-fluid p-0 m-0">
    <header class="navbar navbar-expand-lg navbar-light justify-content-center align-items-center bg-black">
      <img src="../../logo/logo_mulmed.png" alt="icon-owl" width="80">
      <ul class="nav nav-pills nav-fill lead">
        <li class="nav-item">
          <a class="nav-link fw-bold text-white text-decoration-underline link-secondary" aria-current="page" href="../../index.php">Home</a>
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
        <h1 class="text-5xl font-bold mb-4">Uji Pengetahuanmu</h1>
        <p class="text-xl">Tantang dirimu dengan berbagai kuis yang menantang!</p>
        <a href="#materi" class="mt-8 inline-block bg-blue-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-600 transition duration-300">Mulai Kuis</a>
      </div>
    </section>

    <main>
      <section class="materi" id="materi">
        <button class="arrow left">&#9664;</button>
        <div class="content-box"></div>
        <button class="arrow right">&#9654;</button>
      </section>

      <!-- Elemen lain di dalam main -->
      <section class="additional-section">
        <h2>Konten Tambahan</h2>
        <p>Bagian ini juga mewarisi gradien latar belakang dari elemen utama.</p>
      </section>
    </main>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
