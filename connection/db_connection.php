<?php

function getConnection()
{
    $host = "localhost";
    $dbname = "beastie_brain_tease";
    $dbuser = "root";
    $dbpass = "";
    return new PDO("mysql:host=$host;charset=utf8;dbname=$dbname;", $dbuser, $dbpass);
}
