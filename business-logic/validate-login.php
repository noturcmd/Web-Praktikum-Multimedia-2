<?php

function validateLogin($con)
{
    if (isset($_POST["login"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        $query = "SELECT * FROM users WHERE email='$email'";
        $stm = $con->prepare($query);
        $stm->execute();
        $checkUser = $stm->fetch(PDO::FETCH_ASSOC);
        if ($checkUser) {
            if (password_verify($password, $checkUser["password"])) {
                setcookie("login", "success", time() + (86400 * 7), "/");
                setcookie("logusid", $checkUser["id"], time() + (86400 * 7), "/");
                setcookie("logusmulmed", "osasuvu%/45342290pp" . $checkUser["id"], time() + (86400 * 7), "/");
                $con = null;
                echo <<<ALERT
                <script>
                alert('Login Berhasil!');
                document.location.href = "../index.php";
                </script>
                ALERT;
                exit();
            } else {
                $con = null;
                echo <<<ALERT
                <script>
                alert('Password salah!');
                document.location.href = "../login.php";
                </script>
                ALERT;
                exit();
            }
        } else {
            $con = null;
            echo <<<ALERT
            <script>
            alert('Login gagal! Email tidak terdaftar');
            document.location.href = "../login.php";
            </script>
            ALERT;
            exit();
        }
    } else {
        $con = null;
        header("location: ../login.php");
        exit();
    }
}
