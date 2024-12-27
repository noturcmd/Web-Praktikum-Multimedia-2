<?php
include "../../connection/db_connection.php";

// Ambil id user dari cookie
$cookie = $_COOKIE['logusmulmed'] ?? '';
$user_id = substr($cookie, strpos($cookie, 'pp') + 2);

// Query untuk mengambil data user berdasarkan id
$query = "SELECT *, DATE_FORMAT(created_at,'%d/%m/%Y') AS tanggal FROM users WHERE id=:id";
$stm = $koneksi->prepare($query);
$stm->bindParam(':id', $user_id);
$stm->execute();
$user = $stm->fetch(PDO::FETCH_ASSOC);

// Redirect jika user belum login
if (!isset($_COOKIE['login'])) {
  header("Location: ../../login.php");
  exit();
}
?>

<!doctype html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Profile</title>
  <link rel="shortcut icon" href="../../logo/logo_mulmed.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="stylesheet" href="../../styles/parallax.css">
  <link rel="stylesheet" href="../../styles/profile.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <style>

  </style>
</head>

<body>
  <div class="container-fluid p-0 m-0">
    <header class="navbar navbar-expand-lg navbar-dark bg-black px-3">
      <div class="container-fluid">
        <!-- Logo -->
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
            <li class="nav-item">
              <a class="nav-link fw-bold text-white" href="../quiz/quiz.php">Quiz</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold text-white text-decoration-underline" href="profile.php">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold text-white" href="../about.php">About</a>
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

    <main class="container mt-5">
      <div class="card shadow-lg animate__animated animate__fadeIn">
        <div class="card-header text-center">
          <h3 class="fw-bold mb-0"><i class="fas fa-user-circle me-2"></i>User Profile</h3>
        </div>
        <form>
          <div class="profile-img-container mt-4">
            <img src="../../img-users/no-photo.jpg" alt="User Photo" class="profile-img rounded-circle">
          </div>
          <div class="row p-4">
            <div class="col-md-6">
              <ul class="list-group list-group-flush">
                <input type="hidden" class="form-control-plaintext text-end" id="id" value="<?= $user['id'] ?>" readonly>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                  <label for="username" class="fw-bold text-start" style="width: 150px;"><i class="fas fa-user stat-icon"></i>Username</label>
                  <input type="text" class="form-control-plaintext text-end" id="username" value="<?= $user['username'] ?>" readonly>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                  <label for="email" class="fw-bold text-start" style="width: 150px;"><i class="fas fa-envelope stat-icon"></i>Email</label>
                  <input type="text" class="form-control-plaintext text-end fst-italic" id="email" value="<?= empty($user['email']) ? 'Tidak ada email' : $user['email'] ?>" readonly>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                  <label for="joinedDate" class="fw-bold text-start" style="width: 150px;"><i class="fas fa-calendar-alt stat-icon"></i>Joined Date</label>
                  <input type="text" class="form-control-plaintext text-end" id="joinedDate" value="<?= $user['tanggal'] ?>" readonly>
                </li>
              </ul>
            </div>

            <div class="col-md-6">
              <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-start">
                  <label for="level_hewan" class="fw-bold text-start" style="width: 350px;"><i class="fas fa-paw stat-icon"></i>Level Quiz Hewan</label>
                  <input type="text" class="form-control-plaintext text-end" id="level_hewan" value="<?= $user['level_quiz_hewan'] ?? '0' ?> | <?= $user['score_quiz_hewan'] ?? '0' ?>" readonly>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                  <label for="text" class="fw-bold text-start" style="width: 350px;"><i class="fas fa-leaf stat-icon"></i>Level Quiz Tumbuhan</label>
                  <input type="text" class="form-control-plaintext text-end" id="text" value="<?= $user['level_quiz_tumbuhan'] ?? '0' ?> | <?= $user['score_quiz_tumbuhan'] ?? '0' ?>" readonly>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                  <label for="level-game" class="fw-bold text-start" style="width: 350px;"><i class="fas fa-gamepad stat-icon"></i>Level Game</label>
                  <input type="text" class="form-control-plaintext text-end" id="level-game" value="<?= $user['level_game'] ?? '0' ?> | <?= $user['score_game'] ?? '0' ?>" readonly>
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