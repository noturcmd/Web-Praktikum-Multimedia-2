<?php

session_destroy();
setcookie("logusid", "", time() - 1, "/");
setcookie("login", "", time() - 1, "/");
setcookie("logusmulmed", "", time() - 1, "/");

header("location: ../index.php");
exit();


?>