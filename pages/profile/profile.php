<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Profile</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="../../styles/style1.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body>
  <div class="container-fluid p-0 m-0">
    <header class="navbar navbar-expand-lg navbar-light">
      <img src="../../images/icon-header-left.png" alt="icon-owl" width="80">
      <ul class="nav nav-pills nav-fill">
        <li class="nav-item">
          <a class="nav-link fw-bold" aria-current="page" href="../../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-bold" href="../game/game.php">Game</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-bold" href="../Quiz/quiz.php">Quiz</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-bold text-decoration-underline" href="profile.php">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-bold" href="../about.php">About</a>
        </li>
      </ul>
    </header>

    <main class="container mt-5">
      <div class="card shadow-lg">
        <div class="card-header text-center">
          <h3 class="fw-bold">User Profile</h3>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <span class="fw-bold">Username</span>
            <span><?= "Username" ?></span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <span class="fw-bold">Email</span>
            <span><?= "user@example.com" ?></span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <span class="fw-bold">Joined Date</span>
            <span><?= "2024-10-24" ?></span>
          </li>
        </ul>
      </div>
    </main>




  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>