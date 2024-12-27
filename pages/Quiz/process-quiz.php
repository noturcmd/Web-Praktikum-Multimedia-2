<?php
session_start();
require_once '../../connection/db_connection.php';

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: quiz.php');
    exit();
}

try {
    $conn = getConnection();
    
    // Get correct answers from database
    $stmt = $conn->prepare("SELECT id_soal, jawaban_benar FROM soal");
    $stmt->execute();
    $correct_answers = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);
    
    // Calculate score
    $score = 0;
    $total_questions = count($correct_answers);
    
    foreach ($correct_answers as $question_id => $correct_answer) {
        // Check if question was answered
        if (isset($_POST['q' . $question_id])) {
            $user_answer = $_POST['q' . $question_id];
            // Compare user answer with correct answer
            if ($user_answer === $correct_answer) {
                $score++;
            }
        }
    }
    
    // Calculate percentage score
    $percentage_score = ($score / $total_questions) * 100;
    
    // Update user's score in database if logged in
    if (isset($_COOKIE['logusmulmed'])) {
        $user_id = $_COOKIE['logusmulmed'];
        
        // Get current score
        $stmt = $conn->prepare("SELECT skor FROM users WHERE id_user = ?");
        $stmt->execute([$user_id]);
        $current_score = $stmt->fetchColumn();
        
        // Update only if new score is higher
        if ($percentage_score > $current_score) {
            $stmt = $conn->prepare("UPDATE users SET skor = ? WHERE id_user = ?");
            $stmt->execute([$percentage_score, $user_id]);
        }
    }
    
    // Redirect to results page with score
    $_SESSION['quiz_score'] = $percentage_score;
    header('Location: quiz-result.php');
    exit();
    
} catch(PDOException $e) {
    // Log error and show user-friendly message
    error_log($e->getMessage());
    $_SESSION['error'] = "An error occurred while processing your quiz. Please try again.";
    header('Location: quiz.php');
    exit();
}
?>
