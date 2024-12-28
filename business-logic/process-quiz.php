<?php
session_start();
require_once '../business-logic/process-quiz.php';
require_once "../connection/db_connection.php";

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: quiz.php');
    exit();
}

try {
    $conn = getConnection();
    $user_id = $_COOKIE['logusid'];
    // Get correct answers from database
    $stmt = $conn->prepare("SELECT id_soal, jawaban FROM soal");
    $stmt->execute();
    $correct_answers = $stmt->fetchAll(PDO::FETCH_KEY_PAIR);
    var_dump($correct_answers);
    // Calculate score
    $score = 0;
    $total_questions = count($correct_answers);

    $counter = 1;
    foreach ($_POST as $key => $value) {
        $jawabanUser = explode(")", $value);
        $jawabanUser = $jawabanUser[0];
        if ($jawabanUser === $correct_answers[$counter]) {
            $score += 1;
        }

        $counter++;
    }
    // Calculate percentage score
    $percentage_score = ($score / $total_questions) * 100;
    
    $stmt = $conn->prepare("UPDATE users SET skor = ?, status_kuis = ? WHERE id = ?");
    $stmt->execute([$percentage_score, "selesai", $user_id]);
    
    header('Location: ../pages/Quiz/quiz-result.php');
    exit();
} catch (PDOException $e) {
    // Log error and show user-friendly message
    error_log($e->getMessage());
    $_SESSION['error'] = "An error occurred while processing your quiz. Please try again.";
    header('Location: ../pages/Quiz/quiz.php');
    exit();
}
