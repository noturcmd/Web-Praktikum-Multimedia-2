<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quiz Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #1a1a1a, #2d2d2d);
      min-height: 100vh;
      color: #fff;
    }

    .quiz-container {
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(10px);
      border-radius: 20px;
      padding: 2rem;
      box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
      border: 1px solid rgba(255, 255, 255, 0.18);
      margin-top: 3rem;
    }

    .question-card {
      background: rgba(255, 255, 255, 0.05);
      border-radius: 15px;
      padding: 1.5rem;
      margin-bottom: 1.5rem;
      transition: transform 0.3s ease;
    }

    .question-card:hover {
      transform: translateY(-5px);
    }

    .option-label {
      display: block;
      padding: 1rem;
      margin: 0.5rem 0;
      border-radius: 10px;
      background: rgba(255, 255, 255, 0.08);
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .option-label:hover {
      background: rgba(255, 193, 7, 0.2);
    }

    input[type="radio"]:checked + .option-label {
      background: rgba(255, 193, 7, 0.4);
      border: 1px solid #ffc107;
    }

    .btn-submit {
      background: linear-gradient(45deg, #ffd700, #ff8c00);
      border: none;
      padding: 12px 35px;
      font-weight: bold;
      border-radius: 25px;
      transition: all 0.3s ease;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    .btn-submit:hover {
      transform: translateY(-3px);
      box-shadow: 0 5px 15px rgba(255, 215, 0, 0.4);
      background: linear-gradient(45deg, #ff8c00, #ffd700);
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="quiz-container animate__animated animate__fadeIn">
      <h1 class="text-center text-warning mb-5">Knowledge Quiz</h1>
      
      <form action="process-quiz.php" method="POST">
        <?php
        // Database connection
        require_once '../../connection/db_connection.php';

        try {
          // Fetch questions from database
          $conn = getConnection();
          $stmt = $conn->prepare("SELECT id_soal, id_materi, soal, opsi FROM soal ORDER BY id_soal");
          $stmt->execute();
          $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
          
          // Counter for question numbering
          $questionNumber = 1;

          // Loop through each question
          foreach($questions as $question) {
            // Convert options string to array (assuming options are stored as JSON or comma-separated)
            $options = $question['opsi'];
            $options = explode(";", $options);
            
            if(!$options) {
              // If not JSON, try comma-separated
              $options = explode(',', $question['opsi']);
            }
        ?>
            <div class="question-card">
              <h5 class="mb-4"><?php echo $questionNumber . '. ' . htmlspecialchars($question['soal']); ?></h5>
              <div class="options">
                <?php 
                // Loop through options
                foreach($options as $key => $option) {
                  $optionId = 'q' . $question['id_soal'] . '_' . $key;
                ?>
                  <div class="option">
                    <input type="radio" 
                           name="q<?php echo $question['id_soal']; ?>" 
                           id="<?php echo $optionId; ?>" 
                           value="<?php echo $key; ?>" 
                           class="d-none">
                    <label for="<?php echo $optionId; ?>" class="option-label">
                      <?php echo htmlspecialchars($option); ?>
                    </label>
                  </div>
                <?php
                }
                ?>
              </div>
            </div>
        <?php
            $questionNumber++;
          }
        } catch(PDOException $e) {
          echo '<div class="alert alert-danger">Error loading questions. Please try again later.</div>';
        }
        ?>

        <div class="text-center mt-5">
          <button type="submit" class="btn btn-submit">Submit Answers</button>
        </div>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

