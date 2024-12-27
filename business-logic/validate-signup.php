<?php

function validateSignUp($con)
{
    if (isset($_POST["signup"])) {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        $query = "SELECT email FROM users WHERE email='$email'";
        $stm = $con->prepare($query);
        $stm->execute();
        $checkUser = $stm->fetch(PDO::FETCH_ASSOC);

        if ($checkUser) {
            $con = null;
            echo <<<ALERT
            <script>
                alert('Email sudah digunakan!');
                document.location.href = "../signup.php";
            </script>
            ALERT;
            exit();
        } else {
            $query = "SELECT LOWER(username) FROM users WHERE username='$username'";
            $stm = $con->prepare($query);
            $stm->execute();
            $checkUser = $stm->fetch(PDO::FETCH_ASSOC);
            if ($checkUser) {
                echo "user sudah ada!";
                $con = null;
                echo <<<ALERT
                <script>
                alert('Username sudah digunakan!');
                document.location.href = "../signup.php";
                </script>
                ALERT;
                exit();
            } else {
                $query = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
                $stm = $con->prepare($query);
                
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                
                // Bind parameter
                $stm->bindParam(':username', $username);
                $stm->bindParam(':email', $email);
                $stm->bindParam(':password', $hashedPassword);
                
                // Eksekusi query
                if ($stm->execute()) {
                    $con = null;
                    echo <<<ALERT
                    <script>
                    alert('Registrasi berhasil! Silakan login.');
                    document.location.href = "../login.php";
                    </script>
                    ALERT;
                    exit();
                } else {
                    $con = null;
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
        $con = null;
        header("location: ../login.php");
        exit();
    }
}
