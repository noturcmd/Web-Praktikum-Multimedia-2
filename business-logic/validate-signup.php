<?php

include "../connection/db_connection.php";



if (isset($_POST["signup"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $query = "SELECT email FROM users WHERE email='$email'";
    $stm = $koneksi->prepare($query);
    $stm->execute();
    $checkUser = $stm->fetch(PDO::FETCH_ASSOC);

    if ($checkUser) {
        $koneksi = null;
        echo <<<ALERT
        <script>
            alert('Email sudah digunakan!');
            document.location.href = "../signup.php";
        </script>
        ALERT;
        exit();
    } else {
        $query = "SELECT LOWER(username) FROM users WHERE username='$username'";
        $stm = $koneksi->prepare($query);
        $stm->execute();
        $checkUser = $stm->fetch(PDO::FETCH_ASSOC);
        if ($checkUser) {
            echo "user sudah ada!";
            $koneksi = null;
            echo <<<ALERT
            <script>
                alert('Username sudah digunakan!');
                document.location.href = "../signup.php";
            </script>
            ALERT;
            exit();
        } else {
            $query = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
            $stm = $koneksi->prepare($query);

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Bind parameter
            $stm->bindParam(':username', $username);
            $stm->bindParam(':email', $email);
            $stm->bindParam(':password', $hashedPassword);

            // Eksekusi query
            if ($stm->execute()) {
                echo <<<ALERT
                <script>
                    alert('Registrasi berhasil! Silakan login.');
                    document.location.href = "../login.php";
                </script>
                ALERT;
                exit();
            } else {
                echo <<<ALERT
                <script>
                    alert('Terjadi kesalahan, coba lagi nanti.');
                    document.location.href = "../signup.php";
                </script>
                ALERT;
                exit();
            }
        }
    }
} else {
    header("location: ../login.php");
    exit();
}

$koneksi = null;
