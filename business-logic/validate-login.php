<?php


include "../connection/db_connection.php";

if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $query = "SELECT * FROM users WHERE email='$email'";
    $stm = $koneksi->prepare($query);
    $stm->execute();
    $checkUser = $stm->fetch(PDO::FETCH_ASSOC);
    if ($checkUser) {
        if (password_verify($password, $checkUser["password"])) {
            setcookie("login", "success", time() + (86400 * 7), "/");
            setcookie("UID", "osasuvu%/45342290pp" + $checkUser["id"], time() + (86400 * 7), "/");
            echo <<<ALERT
                <script>
                    alert('Login Berhasil!');
                    document.location.href = "../index.php";
                </script>
                ALERT;
            exit();
        } else {
            echo <<<ALERT
                <script>
                    alert('Password salah!');
                    document.location.href = "../login.php";
                </script>
                ALERT;
            exit();
        }
    } else {
        echo <<<ALERT
                <script>
                    alert('Login gagal! Email tidak terdaftar');
                    document.location.href = "../login.php";
                </script>
                ALERT;
        exit();
    }
} else {
    header("location: ../login.php");
    exit();
}
