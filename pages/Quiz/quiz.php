<!doctype html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kuis</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Styling dasar untuk background dan tampilan kuis */
    body {
      background-color: #f0f8ff;
      margin: 0;
      font-family: Arial, sans-serif;
      height: 100vh; /* Tambahkan tinggi penuh untuk pemusatan vertikal */
      display: flex;
      flex-direction: column;
      justify-content: center; /* Memusatkan secara vertikal */
      align-items: center; /* Memusatkan secara horizontal */
    }

    /* Styling untuk container kuis */
    .quiz-container {
      background-color: #ffffff;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
      max-width: 700px;
      width: 100%;
      text-align: center;
    }

    .question-selector {
      display: flex;
      justify-content: center;
      margin-bottom: 20px;
    }

    .question-selector button {
      margin: 0 5px;
      padding: 10px 15px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .question-selector button.active {
      background-color: #28a745;
    }

    .question {
      font-size: 1.5rem;
      margin-bottom: 20px;
    }

    .answers {
      list-style-type: none;
      padding: 0;
      text-align: center; /* Memusatkan teks di dalam daftar */
    }

    .answers li {
      margin-bottom: 10px;
    }

    .submit-btn {
      display: block;
      width: 100%;
      padding: 10px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 1.2rem;
      margin-top: 20px;
    }

    .submit-btn:hover {
      background-color: #0056b3;
    }

    /* Styling untuk navbar agar tetap berada di atas */
    .navbar {
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 1000;
    }

    .container-fluid {
      padding-top: 90px; /* Tambahkan padding di bawah navbar */
    }
  </style>
</head>

<body>

  <!-- Navbar tetap berada di atas halaman -->
  <div class="container-fluid p-0 m-0">
    <header class="navbar navbar-expand-lg navbar-light bg-warning">
      <img src="../../images/icon-header-left.png" alt="icon-owl" width="80">
      <ul class="nav nav-pills nav-fill">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="../../index.php">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../game/game.php">Permainan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="quiz.php">Kuis</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../profile/profile.php">Profil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../about.php">Tentang</a>
        </li>
      </ul>
    </header>
  </div>

  <!-- Container kuis -->
  <div class="quiz-container">
    <div class="question-selector" id="questionSelector">
      <!-- Tombol pemilih pertanyaan akan diisi dengan JS -->
    </div>

    <div class="question" id="questionText">Memuat soal...</div>

    <ul class="answers" id="answerOptions">
      <!-- Pilihan jawaban akan diisi dengan JS -->
    </ul>

    <button class="submit-btn" onclick="submitAnswer()">Kirim Jawaban</button>
  </div>

  <script>
    const questions = [
      {
        question: "Hewan apakah yang dikenal sebagai 'Raja Hutan'?",
        answers: ["A. Harimau", "B. Gajah", "C. Singa", "D. Macan Tutul"],
        correct: 2
      },
      {
        question: "Tumbuhan apa yang dikenal mampu bertahan hidup di gurun?",
        answers: ["A. Kaktus", "B. Pakis", "C. Ek", "D. Maple"],
        correct: 0
      },
      {
        question: "Apa hewan darat tercepat di dunia?",
        answers: ["A. Singa", "B. Cheetah", "C. Gazelle", "D. Kuda"],
        correct: 1
      },
      {
        question: "Hewan apakah yang bisa mengubah warna kulitnya untuk berkamuflase?",
        answers: ["A. Katak", "B. Gurita", "C. Bunglon", "D. Burung Beo"],
        correct: 2
      },
      {
        question: "Bagian tumbuhan manakah yang berperan dalam fotosintesis?",
        answers: ["A. Akar", "B. Batang", "C. Bunga", "D. Daun"],
        correct: 3
      },
      {
        question: "Apa hewan tertinggi di dunia?",
        answers: ["A. Gajah", "B. Jerapah", "C. Kanguru", "D. Badak"],
        correct: 1
      },
      {
        question: "Tumbuhan apakah yang memiliki khasiat obat dan sering digunakan untuk mengobati luka bakar?",
        answers: ["A. Lidah Buaya", "B. Mawar", "C. Tulip", "D. Daffodil"],
        correct: 0
      },
      {
        question: "Hewan apakah yang dikenal dengan migrasi panjangnya melintasi lautan?",
        answers: ["A. Penguin", "B. Hiu", "C. Paus", "D. Penyu"],
        correct: 3
      },
      {
        question: "Proses apakah yang dilakukan tumbuhan untuk membuat makanannya sendiri?",
        answers: ["A. Respirasi", "B. Pencernaan", "C. Fotosintesis", "D. Fermentasi"],
        correct: 2
      },
      {
        question: "Hewan apakah yang sering menjadi simbol kebijaksanaan dalam berbagai budaya?",
        answers: ["A. Burung Hantu", "B. Anjing", "C. Kucing", "D. Kelinci"],
        correct: 0
      }
    ];

    let currentQuestionIndex = 0;

    document.addEventListener("DOMContentLoaded", function () {
      generateQuestionSelector();
      loadQuestion(0);
    });

    function generateQuestionSelector() {
      const selectorContainer = document.getElementById("questionSelector");
      for (let i = 0; i < questions.length; i++) {
        const button = document.createElement("button");
        button.textContent = i + 1;
        button.onclick = () => loadQuestion(i);
        if (i === 0) {
          button.classList.add("active");
        }
        selectorContainer.appendChild(button);
      }
    }

    function loadQuestion(index) {
      currentQuestionIndex = index;
      document.querySelectorAll(".question-selector button").forEach((btn, idx) => {
        if (idx === index) {
          btn.classList.add("active");
        } else {
          btn.classList.remove("active");
        }
      });

      const questionObj = questions[index];
      document.getElementById("questionText").textContent = questionObj.question;
      const answerList = document.getElementById("answerOptions");
      answerList.innerHTML = ""; // Clear old options

      questionObj.answers.forEach((answer, i) => {
        const li = document.createElement("li");
        li.innerHTML = `<label><input type="radio" name="answer" value="${i}"> ${answer}</label>`;
        answerList.appendChild(li);
      });
    }

    function submitAnswer() {
      const selectedAnswer = document.querySelector('input[name="answer"]:checked');
      if (selectedAnswer) {
        const answerValue = parseInt(selectedAnswer.value);
        const correctAnswer = questions[currentQuestionIndex].correct;
        if (answerValue === correctAnswer) {
          alert("Benar!");
        } else {
          alert("Salah. Coba lagi.");
        }
      } else {
        alert("Silakan pilih jawaban.");
      }
    }
  </script>
</body>

</html>
