<?php


function updateProgressUser($level, $totalLevel, $userId, $con){
    $progressLevel = ($level / $totalLevel) * 100;
    $query = "UPDATE users SET level_kuis='$level', progress_kuis='{$progressLevel}%'  WHERE id='$userId'";
    $con = getConnection();
    $con->exec($query);
    $con = null;
}



?>