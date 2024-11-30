<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>
  <link rel="shortcut icon" href="logo/logo_mulmed.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="stylesheet" href="styles/parallax.css">
  <link rel="stylesheet" href="styles/style1.css">
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
              <a class="nav-link fw-bold text-white link-secondary" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold text-white link-secondary" href="materi/materi.php">Materi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold text-white link-secondary" href="game/game.php">Game</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold text-white link-secondary" href="quiz/quiz.php">Quiz</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold text-white link-secondary" href="profile/profile.php">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold text-white link-secondary text-decoration-underline" href="about.php">About</a>
            </li>
          </ul>
        </div>
      </div>
    </header>

    <section class="container my-5">
      <div class="text-center">
        <h1 class="fw-bold mb-4">About Beastie Brain Tease</h1>
        <p class="lead">
          Beastie Brain Tease adalah platform pembelajaran interaktif yang dirancang untuk membantu pengguna memperluas pengetahuan mereka melalui materi edukatif, game interaktif, dan quiz yang menantang.
          Kami percaya bahwa belajar bisa menjadi lebih menyenangkan dengan pengalaman yang interaktif dan menghibur.
        </p>
      </div>
      <hr class="my-5">

      <!-- Author Information -->
      <div class="text-center">
        <h2 class="fw-bold mb-4">Author Information</h2>
        <div class="row justify-content-center">
          <!-- Author 1 -->
          <div class="col-lg-8 d-flex align-items-center mb-4">
            <div class="flex-grow-1 text-start">
              <ul class="list-unstyled">
                <li><strong>Nama:</strong> John Doe</li>
                <li><strong>NIM:</strong> 123456789</li>
                <li><strong>Jurusan:</strong> Teknik Informatika</li>
                <li><strong>Fakultas:</strong> Fakultas Teknik</li>
                <li><strong>Universitas:</strong> Universitas XYZ</li>
              </ul>
            </div>
            <img src="../img-users/no-photo.jpg" alt="Author Photo 1" class="rounded-circle ms-4" style="width: 120px; height: 120px; object-fit: cover;">
          </div>

          <!-- Author 2 -->
          <div class="col-lg-8 d-flex align-items-center mb-4">
            <div class="flex-grow-1 text-start">
              <ul class="list-unstyled">
                <li><strong>Nama:</strong> Jane Smith</li>
                <li><strong>NIM:</strong> 987654321</li>
                <li><strong>Jurusan:</strong> Sistem Informasi</li>
                <li><strong>Fakultas:</strong> Fakultas Teknologi Informasi</li>
                <li><strong>Universitas:</strong> Universitas ABC</li>
              </ul>
            </div>
            <img src="../img-users/no-photo.jpg" alt="Author Photo 2" class="rounded-circle ms-4" style="width: 120px; height: 120px; object-fit: cover;">
          </div>

          <!-- Author 3 -->
          <div class="col-lg-8 d-flex align-items-center mb-4">
            <div class="flex-grow-1 text-start">
              <ul class="list-unstyled">
                <li><strong>Nama:</strong> Michael Johnson</li>
                <li><strong>NIM:</strong> 1122334455</li>
                <li><strong>Jurusan:</strong> Teknik Komputer</li>
                <li><strong>Fakultas:</strong> Fakultas Teknik</li>
                <li><strong>Universitas:</strong> Universitas DEF</li>
              </ul>
            </div>
            <img src="../img-users/no-photo.jpg" alt="Author Photo 3" class="rounded-circle ms-4" style="width: 120px; height: 120px; object-fit: cover;">
          </div>
        </div>
      </div>
    </section>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>