<?php
include "../../connection/db_connection.php";

// Ambil id user dari cookie

$koneksi = getConnection();
$cookie = $_COOKIE['logusmulmed'] ?? '';
$user_id = substr($cookie, strpos($cookie, 'pp') + 2);

// Query untuk mengambil data user berdasarkan id
$query = "SELECT *, DATE_FORMAT(created_at,'%d/%m/%Y') AS tanggal FROM users WHERE id=:id";
$stm = $koneksi->prepare($query);
$stm->bindParam(':id', $user_id);
$stm->execute();
$user = $stm->fetch(PDO::FETCH_ASSOC);

$userImage = $user['image'];
var_dump($user['image']);
// exit();
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
  <style>
    body {
      height: 100vh;
    }

    /* Adjust the size of the profile image */
    .profile-img {
      width: 45px;
      /* You can adjust this to your preferred size */
      height: 45px;
      /* Maintain aspect ratio with width */
      object-fit: cover;
      /* Ensure the image is not distorted */
    }

    .foto-profile {
      width: 100px;
      height: 100px;
    }

    #panel {
      display: none;
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
                <a class="nav-link fw-bold text-white" href="../Quiz/quiz.php">Quiz</a>
              </li>
            <?php endif; ?>
            <li class="nav-item">
              <a class="nav-link fw-bold text-white" href="../about.php">About</a>
            </li>
            <?php if (isset($_COOKIE['logusmulmed'])): ?>
              <li class="nav-item">
                <a class="nav-link fw-bold text-white" href="../../business-logic/validate-logout.php" onclick="return confirm('Yakin ingin logout?')">Logout</a>
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
    <main class="container" style="margin-top: 200px;">
      <div class="card shadow-lg animate__animated animate__fadeIn">
        <div class="card-header text-center">
          <h3 class="fw-bold mb-0"><i class="fas fa-user-circle me-2"></i>User Profile</h3>
        </div>
        <form>
          <div class="profile-img-container mt-4">
            <img src="../../img-users/<?= $userImage ?>" alt="User Photo" class="profile-img rounded-circle foto-profile">
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
                  <label for="level_hewan" class="fw-bold text-start" style="width: 350px;"><i class="fas fa-paw stat-icon"></i>Skor Kuis</label>
                  <input type="text" class="form-control-plaintext text-end" id="level_hewan" value="<?= $user['skor'] ?? '0' ?>" readonly>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                  <label for="text" class="fw-bold text-start" style="width: 350px;"><i class="fas fa-leaf stat-icon"></i>Status Kuis</label>
                  <input type="text" class="form-control-plaintext text-end" id="text" value="<?= $user['status_kuis'] ?>" readonly>
                </li>
              </ul>
            </div>
          </div>
        </form>
        <div class="container text-center mt-5 mb-5">
          <!-- Tombol Update -->
          <button type="button" class="btn btn-outline-light border border-secondary text-dark me-3" id="flip">
            Update Foto
          </button>
        </div>
        <div id="panel" class="mb-5 mx-4">
          <!-- Form untuk upload gambar -->
          <form action="../../business-logic/update-profile-user.php" method="post" enctype="multipart/form-data" id="updateAvatarForm" class="text-center mt-4">
            <div class="mb-3">
              <input type="hidden" name="user-id" value="<?= $_COOKIE["logusid"] ?>">
              <label for="avatarInput" class="form-label">Pilih Gambar Baru</label>
              <input type="file" id="avatarInput" class="form-control text-dark" accept="image/*" name="update-image">
            </div>
            <button type="submit" class="btn btn-primary">Upload Gambar</button>
          </form>
        </div>
      </div>

    </main>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <script>
    $(document).ready(function() {
      $("#flip").click(function() {
        $("#panel").slideToggle("slow");
      });
    });
  </script>
</body>

</html>

<?php $koneksi = null ?>