<?php


function updateProgressUser($level, $totalLevel, $userId, $con){
    $progressLevel = ($level / $totalLevel) * 100;
    $query = "UPDATE users SET level_kuis='$level', progress_kuis='{$progressLevel}%'  WHERE id='$userId'";
    $con = getConnection();
    $con->exec($query);
    $con = null;
}


function updateSkor($skor, $userId, $con){
    $query = "UPDATE users SET skor='$skor' WHERE id='$userId'";
    $con = getConnection();
    $con->exec($query);
    $con = null;
}

function getLevelUser($userId, $con){
    $query = "SELECT level_kuis FROM users WHERE id='$userId'";
    $con = getConnection();
    $result = $con->query($query);
    $con = null;
    return $result->fetchAll();
}
?>