<?php
session_start();

// Array soal dan jawaban
$questions = [
    [
        'question' => 'Berapakah hasil dari 8 × 9?',
        'options' => ['72', '64', '81', '90'],
        'correct' => '72'
    ],
    [
        'question' => 'Planet apakah yang terdekat dengan matahari?',
        'options' => ['Venus', 'Mars', 'Merkurius', 'Jupiter'],
        'correct' => 'Merkurius'
    ],
    [
        'question' => 'Siapakah penemu bola lampu?',
        'options' => ['Thomas Edison', 'Albert Einstein', 'Isaac Newton', 'Nikola Tesla'],
        'correct' => 'Thomas Edison'
    ],
    [
        'question' => 'Apa ibukota Indonesia?',
        'options' => ['Jakarta', 'Bandung', 'Surabaya', 'Yogyakarta'],
        'correct' => 'Jakarta'
    ],
    [
        'question' => 'Berapa jumlah provinsi di Indonesia?',
        'options' => ['34', '33', '35', '38'],
        'correct' => '38'
    ],
    [
        'question' => 'Tahun berapa Indonesia merdeka?',
        'options' => ['1945', '1944', '1946', '1947'],
        'correct' => '1945'
    ],
    [
        'question' => 'Siapa presiden pertama Indonesia?',
        'options' => ['Soekarno', 'Soeharto', 'Habibie', 'Gusdur'],
        'correct' => 'Soekarno'
    ],
    [
        'question' => 'Apa nama mata uang Indonesia?',
        'options' => ['Rupiah', 'Dollar', 'Euro', 'Peso'],
        'correct' => 'Rupiah'
    ],
    [
        'question' => 'Berapa jumlah sila dalam Pancasila?',
        'options' => ['5', '4', '6', '7'],
        'correct' => '5'
    ],
    [
        'question' => 'Benua terbesar di dunia adalah?',
        'options' => ['Asia', 'Afrika', 'Amerika', 'Eropa'],
        'correct' => 'Asia'
    ]
];

$current_question = isset($_GET['q']) ? (int)$_GET['q'] : 0;

// Inisialisasi array jawaban jika belum ada
if (!isset($_SESSION['answers'])) {
    $_SESSION['answers'] = array();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['answer'])) {
        $_SESSION['answers'][$current_question - 1] = $_POST['answer']; // Simpan jawaban untuk pertanyaan sebelumnya
    }
    
    // Hitung skor hanya jika sudah menjawab semua pertanyaan
    if ($current_question >= count($questions)) {
        $correct_answers = 0;
        foreach ($questions as $index => $question) {
            if (isset($_SESSION['answers'][$index]) && $_SESSION['answers'][$index] === $question['correct']) {
                $correct_answers++;
            }
        }
        $_SESSION['final_score'] = ($correct_answers / count($questions)) * 100;
    }
}

// Reset kuis jika memulai dari awal
if ($current_question === 0) {
    $_SESSION['answers'] = array();
    unset($_SESSION['final_score']);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuis Interaktif</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(45deg, #FF6B6B, #4ECDC4);
            min-height: 100vh;
            padding: 50px 0;
            font-family: 'Poppins', sans-serif;
        }
        .quiz-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 30px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
            padding: 40px;
            max-width: 900px;
            margin: 0 auto;
            position: relative;
            overflow: hidden;
        }
        .quiz-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, #FF6B6B, #4ECDC4);
        }
        .progress {
            height: 12px;
            border-radius: 10px;
            background: rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }
        .progress-bar {
            background: linear-gradient(90deg, #FF6B6B, #4ECDC4);
            transition: width 0.5s ease;
        }
        .question-number {
            font-size: 2.5em;
            font-weight: 700;
            color: #FF6B6B;
            margin-bottom: 20px;
        }
        .option-card {
            background: white;
            border: 2px solid #eee;
            border-radius: 20px;
            padding: 20px;
            margin: 15px 0;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        .option-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            border-color: #4ECDC4;
        }
        .option-card.selected {
            background: linear-gradient(45deg, #4ECDC4, #2ECC71);
            color: white;
            border-color: transparent;
        }
        .result-container {
            text-align: center;
            padding: 40px;
        }
        .score-display {
            font-size: 4em;
            font-weight: bold;
            color: #FF6B6B;
            margin: 20px 0;
        }
        .score-message {
            font-size: 1.5em;
            margin-bottom: 30px;
            color: #2C3E50;
        }
        .btn-custom {
            background: linear-gradient(45deg, #FF6B6B, #4ECDC4);
            color: white;
            padding: 15px 40px;
            border-radius: 50px;
            border: none;
            font-size: 1.2em;
            transition: all 0.3s ease;
        }
        .btn-custom:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="quiz-container animate__animated animate__fadeIn">
            <?php if (isset($_SESSION['final_score']) && $current_question >= count($questions)): ?>
                <div class="result-container animate__animated animate__bounceIn">
                    <h2>Selamat! Anda telah menyelesaikan kuis</h2>
                    <div class="score-display"><?php echo number_format($_SESSION['final_score'], 0); ?></div>
                    <div class="score-message">
                        <?php
                        if ($_SESSION['final_score'] == 100) {
                            echo "Sempurna! Anda menjawab semua pertanyaan dengan benar!";
                        } elseif ($_SESSION['final_score'] >= 80) {
                            echo "Bagus sekali! Anda hampir sempurna!";
                        } elseif ($_SESSION['final_score'] >= 60) {
                            echo "Cukup baik! Tetap semangat!";
                        } else {
                            echo "Jangan menyerah! Coba lagi!";
                        }
                        ?>
                    </div>
                    <button class="btn btn-custom" onclick="window.location.href='?q=0'">Mulai Ulang Kuis</button>
                </div>
            <?php else: ?>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" 
                         style="width: <?php echo (($current_question + 1) / count($questions)) * 100; ?>%"></div>
                </div>
                
                <div class="text-center mb-4">
                    <div class="question-number animate__animated animate__bounceIn">
                        <?php echo $current_question + 1; ?>/<?php echo count($questions); ?>
                    </div>
                    <h5 class="question-text animate__animated animate__fadeIn">
                        <?php echo $questions[$current_question]['question']; ?>
                    </h5>
                </div>

                <form method="POST" action="?q=<?php echo $current_question + 1; ?>" id="quizForm">
                    <div class="options animate__animated animate__fadeInUp">
                        <?php foreach ($questions[$current_question]['options'] as $index => $value): ?>
                            <div class="option-card <?php echo (isset($_SESSION['answers'][$current_question]) && $_SESSION['answers'][$current_question] === $value) ? 'selected' : ''; ?>" 
                                 onclick="selectOption(this, '<?php echo $value; ?>')">
                                <div class="d-flex align-items-center">
                                    <div class="option-number me-3"><?php echo chr(65 + $index); ?>.</div>
                                    <div class="option-text"><?php echo $value; ?></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <input type="hidden" name="answer" id="selectedAnswer">
                    </div>

                    <div class="d-flex justify-content-between mt-5">
                        <?php if ($current_question > 0): ?>
                            <button type="button" class="btn btn-custom" 
                                    onclick="window.location.href='?q=<?php echo $current_question - 1; ?>'">
                                ← Sebelumnya
                            </button>
                        <?php else: ?>
                            <div></div>
                        <?php endif; ?>
                        
                        <button type="submit" class="btn btn-custom">
                            <?php echo ($current_question < count($questions) - 1) ? 'Selanjutnya →' : 'Selesai ✓'; ?>
                        </button>
                    </div>
                </form>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function selectOption(element, answer) {
            document.querySelectorAll('.option-card').forEach(card => {
                card.classList.remove('selected');
                card.classList.remove('animate__animated');
                card.classList.remove('animate__pulse');
            });
            
            element.classList.add('selected');
            element.classList.add('animate__animated');
            element.classList.add('animate__pulse');
            
            document.getElementById('selectedAnswer').value = answer;
        }

        // Memastikan pengguna memilih jawaban sebelum melanjutkan
        document.getElementById('quizForm').onsubmit = function(e) {
            if (!document.getElementById('selectedAnswer').value) {
                e.preventDefault();
                alert('Silakan pilih jawaban terlebih dahulu!');
                return false;
            }
            return true;
        }
    </script>
</body>
</html>




