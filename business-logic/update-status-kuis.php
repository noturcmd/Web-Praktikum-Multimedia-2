<?php

include __DIR__ . "/../connection/db_connection.php";

$koneksi = getConnection();
$idUser = $_COOKIE["logusid"];
$query = "UPDATE users SET status_kuis = 'belum' WHERE id='$idUser'";
$koneksi->exec($query);

header('location: ../pages/Quiz/quiz.php');
exit();

?>