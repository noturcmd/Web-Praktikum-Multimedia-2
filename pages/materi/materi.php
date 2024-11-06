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
    <header class="navbar navbar-expand-lg navbar-light justify-content-center align-items-center bg-black">
      <img src="../../logo/logo_mulmed.png" alt="icon-owl" width="80">
      <ul class="nav nav-pills nav-fill lead">
        <li class="nav-item">
          <a class="nav-link fw-bold text-white link-secondary" aria-current="page" href="../../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-bold text-white text-decoration-underline link-secondary" href="../materi/materi.php">Materi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-bold text-white link-secondary" href="../game/game.php">Game</a>
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
    </header>

    <!-- Konten lainnya tetap sama -->
    <section class="parallax-bg">
      <div class="parallax-overlay"></div>
      <div class="parallax-content animate__animated animate__fadeInDown">
        <h1 class="text-5xl font-bold mb-4">Play the Game</h1>
        <p class="text-xl">Increase Your Knowledge</p>
        <a href="#materi" class="mt-8 inline-block bg-blue-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-600 transition duration-300">Play Now</a>
      </div>
    </section>

    <main>
      <section class="materi" id="materi">
        <button class="arrow left">&#9664;</button>
        <div class="content-box"></div>
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

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materi PHP Dasar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
        }
        p {
            font-size: 16px;
            color: #555;
        }
    </style>
</head>
<body>

<div class="container">
    <?php
    // Mendefinisikan variabel untuk judul dan isi materi
    $judul = "Materi PHP Dasar";
    $isi = "PHP adalah bahasa pemrograman server-side yang digunakan untuk membuat halaman web dinamis. PHP dapat berintegrasi dengan berbagai jenis database, seperti MySQL.";

    // Menampilkan judul dan isi materi
    echo "<h1>$judul</h1>";
    echo "<p>$isi</p>";
    ?>
</div>

</body>
</html>


</html>
