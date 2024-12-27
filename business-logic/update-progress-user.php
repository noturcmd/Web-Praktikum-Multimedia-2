<?php


function updateLevelUser($level, $userId, $con){
    $query = "UPDATE users SET level_kuis='$level' WHERE id='$userId'";
    $con = getConnection();
    $con->exec($query);
    $con = null;
}


function updateSkorUser($skor, $userId, $con){
    $query = "UPDATE users SET skor='$skor' WHERE id='$userId'";
    $con = getConnection();
    $con->exec($query);
    $con = null;
}

function updateProgressUser($level, $jumlahSoal, $userId, $con){
    $progressLevel = ($level / $jumlahSoal) * 100;
    $query = "UPDATE users SET progress_kuis='{$progressLevel}%'  WHERE id='$userId'";
    $con = getConnection();
    $con->exec($query);
    $con = null;
}
?>