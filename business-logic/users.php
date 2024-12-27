<?php

function getLevelUser($userId, $con){
    $query = "SELECT level_kuis FROM users WHERE id='$userId'";
    $result = $con->query($query);
    $con = null;
    return $result->fetchAll();
}

?>