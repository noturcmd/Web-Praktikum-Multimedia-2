<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="styles/style1.css">
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="stylesheet" href="styles/parallax.css">
</head>

<body>
  <div class="container-fluid p-0 m-0">
    <header class="navbar navbar-expand-lg navbar-light bg-warning">
      <img src="../../images/icon-header-left.png" alt="icon-owl" width="80">
      <ul class="nav nav-pills nav-fill">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="">Game</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pages/Quiz/quiz.php">Quiz</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pages/Quiz/quiz.php">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pages/Quiz/quiz.php">About</a>
        </li>
      </ul>
    </header>

    <section class="parallax-bg">
      <div class="parallax-overlay"></div>
      <div class="parallax-content animate__animated animate__fadeInDown">
        <h1 class="text-5xl font-bold mb-4">Welcome to Luminara Library</h1>
        <p class="text-xl">Your Gateway to Unlimited Knowledge</p>
        <a href="#materi" class="mt-8 inline-block bg-blue-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-600 transition duration-300">Explore Now</a>
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
        <h2>Additional Content</h2>
        <p>This section also inherits the background gradient from the main element.</p>
      </section>
    </main>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
