<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Materi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../../styles/parallax.css">
  <link rel="stylesheet" href="../../styles/StylePages.css">
  <style>
    .materi-card {
      transition: transform 0.3s;
    }

    .materi-card:hover {
      transform: scale(1.05);
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .materi-header {
      background: linear-gradient(45deg, #6a11cb, #2575fc);
      color: white;
      padding: 20px 0;
    }

    .modal-body {
      text-align: justify;
      text-indent: 2em;
    }

    .card-img-top {
      width: 200px;
      height: auto;
      object-fit: cover;
      margin: 0 auto;
    }

    .materi-card {
      text-align: center;
    }
  </style>
</head>

<body style="background-color: #000A1F;">
  <div class="container-fluid p-0 m-0">
    <!-- Header Tetap Tidak Diubah -->
    <header class="navbar navbar-expand-lg navbar-dark bg-black px-3">
      <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="../../index.php">
          <img src="../../logo/logo_mulmed.png" alt="icon-owl" width="50" class="me-2">
          <span class="text-white fw-bold">Beastie Brain Tease</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto text-center">
            <li class="nav-item"><a class="nav-link fw-bold text-white" href="../../index.php">Home</a></li>
            <li class="nav-item"><a class="nav-link fw-bold text-white text-decoration-underline" href="../materi/materi.php">Materi</a></li>
            <li class="nav-item"><a class="nav-link fw-bold text-white" href="../game.php">Game</a></li>
            <?php if (isset($_COOKIE['logusmulmed'])): ?>
              <li class="nav-item"><a class="nav-link fw-bold text-white" href="quiz.php">Quiz</a></li>
            <?php endif; ?>
            <li class="nav-item"><a class="nav-link fw-bold text-white" href="../about.php">About</a></li>
            <?php if (isset($_COOKIE['logusmulmed'])): ?>
              <li class="nav-item dropdown profile-dropdown ms-3">
                <a class="nav-link dropdown-toggle p-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="../../img-users/no-photo.jpg" alt="User Profile" class="profile-img rounded-circle" width="40" height="40">
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li><a class="dropdown-item text-warning" href="../profile/profile.php">My Profile</a></li>
                  <li><hr class="dropdown-divider bg-light"></li>
                  <li><a class="dropdown-item text-warning" href="../../business-logic/validate-logout.php" onclick="return confirm('Yakin ingin logout?')">Logout</a></li>
                </ul>
              </li>
            <?php else: ?>
              <li class="nav-item ms-3"><a class="btn btn-outline-warning fw-bold" href="../../login.php">Login</a></li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </header>

    <div class="container" style="margin-top: 150px;">
      <div class="row" id="materi-container">
        <?php
        require '../../connection/db_connection.php';

        try {
          $pdo = getConnection();

          $query = "SELECT * FROM materi ORDER BY id_materi ASC";
          $stmt = $pdo->query($query);

          if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              echo '<div class="col-lg-4 col-md-6 col-sm-12 mb-4">';
              echo '<div class="card materi-card">';
              if (!empty($row['gambar'])) {
                echo '<img src="../../images/' . htmlspecialchars($row['gambar']) . '" class="card-img-top" alt="' . htmlspecialchars($row['judul_materi']) . '">';
              }
              echo '<div class="card-body">';
              echo '<h5 class="card-title text-dark fw-bold">' . htmlspecialchars($row['judul_materi']) . '</h5>';
              echo '<h6 class="card-subtitle mb-2 text-muted">' . htmlspecialchars($row['mata_pelajaran']) . '</h6>';
              echo '<p class="card-text">' . substr(htmlspecialchars($row['materi']), 0, 100) . '...</p>';
              echo '<button class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#materiModal" data-id="' . $row['id_materi'] . '">Baca Selengkapnya</button>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
            }
          } else {
            echo '<p class="text-center">Belum ada materi tersedia.</p>';
          }
        } catch (PDOException $e) {
          echo '<p class="text-danger">Gagal memuat data: ' . $e->getMessage() . '</p>';
        }
        ?>
      </div>
    </div>

    <!-- Modal untuk Detail Materi -->
    <div class="modal fade" id="materiModal" tabindex="-1" aria-labelledby="materiModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="materiModalLabel">Detail Materi</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div id="materi-detail"></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#materiModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');

        $.ajax({
          url: 'get_materi.php',
          method: 'GET',
          data: { id: id },
          success: function (response) {
            $('#materi-detail').html(response);
          },
          error: function () {
            $('#materi-detail').html('<p class="text-danger">Gagal memuat data materi.</p>');
          }
        });
      });
    });
  </script>
</body>

</html>
