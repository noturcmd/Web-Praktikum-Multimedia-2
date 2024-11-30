<?php
include "../../connection/db_connection.php";

$query = "SELECT *, DATE_FORMAT(created_at,'%d/%m/%Y') AS tanggal  FROM users where id=1";
$stm = $koneksi->prepare($query);
$stm->execute();
$user = $stm->fetch();
?>

<!doctype html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Profile</title>
  <link rel="shortcut icon" href="../../logo/logo_mulmed.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="../../styles/style1.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
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
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link fw-bold text-white link-secondary" href="../../index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold text-white link-secondary" href="../materi/materi.php">Materi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold text-white link-secondary" href="../game/game.php">Game</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold text-white link-secondary" href="../Quiz/quiz.php">Quiz</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold text-white text-decoration-underline" href="profile.php">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold text-white link-secondary" href="../about.php">About</a>
            </li>
          </ul>
        </div>
      </div>
    </header>


    <main class="container mt-5">
      <div class="card shadow-lg">
        <div class="card-header text-center">
          <h3 class="fw-bold">User Profile</h3>
        </div>
        <form>
          <img src="../../img-users/no-photo.jpg" alt="User Photo" class="img-fluid rounded mx-auto d-block mb-3 mt-3" style="width: 150px; height: auto;">
          <div class="row">
            <div class="col-md-6">
              <ul class="list-group list-group-flush">
                <input type="hidden" class="form-control-plaintext text-end" id="id" value="<?= $user[0] ?>" readonly>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                  <label for="username" class="fw-bold text-start" style="width: 150px;">Username</label>
                  <input type="text" class="form-control-plaintext text-end" id="username" value="<?= $user[1] ?>" readonly>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                  <label for="email" class="fw-bold text-start" style="width: 150px;">Email</label>
                  <input type="text" class="form-control-plaintext text-end fst-italic" id="email" value="<?= empty($user[3]) ? 'Tidak ada email' : $user[3] ?>" readonly>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                  <label for="joinedDate" class="fw-bold text-start" style="width: 150px;">Joined Date</label>
                  <input type="text" class="form-control-plaintext text-end" id="joinedDate" value="<?= $user[12] ?>" readonly>
                </li>
              </ul>
            </div>

            <div class="col-md-6">
              <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-start">
                  <label for="level_hewan" class="fw-bold text-start" style="width: 350px;">Level Quiz Hewan (dicapai)</label>
                  <input type="text" class="form-control-plaintext text-end" id="level_hewan" value="<?= $user[5] ?> | <?= $user[9] ?>" readonly>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                  <label for="text" class="fw-bold text-start" style="width: 4000px;">Level Quiz Tumbuhan (dicapai)</label>
                  <input type="text" class="form-control-plaintext text-end" id="text" value="<?= $user[5] ?> | <?= $user[10] ?>" readonly>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                  <label for="level-game" class="fw-bold text-start" style="width: 350px;">Level Game (dicapai)</label>
                  <input type="text" class="form-control-plaintext text-end" id="level-game" value="<?= $user[7] ?> | <?= $user[11] ?>" readonly>
                </li>
              </ul>
            </div>
          </div>
        </form>
      </div>
    </main>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>