<?php

require_once "../connection/db_connection.php";

$gambar = $_FILES["update-image"];
$idUser = $_POST["user-id"];


$con = getConnection();

$formatGambarUpload = explode(".", $gambar["name"]);
$formatGambarUploadAkhir = end($formatGambarUpload);
$namaFileUpload = $formatGambarUpload[0];

$gambar['name'] = "$idUser-.$formatGambarUploadAkhir";
$namaFileUpload = $gambar['name'];
if ($gambar['error'] == 0) {
    if ($gambar['size'] > 10_000_000) {
        $con = null;
        echo <<<SCRIPT
        <script>
        alert('Ukuran Foto terlalu besar');
        document.location.href = "../pages/profile/profile.php";
        </script>
        SCRIPT;
    } else {
        // Tentukan direktori tujuan
        $targetDir = __DIR__ . "/../img-users";

        // Tentukan path lengkap untuk file yang akan disimpan
        $targetFile = $targetDir . $gambar['name'];

        // Pindahkan file ke direktori tujuan
        if (move_uploaded_file($gambar["tmp_name"], __DIR__ . "/../img-users/" . $gambar['name'])) {
            $updateImageProfile = "UPDATE users set image='$namaFileUpload' WHERE id='$idUser'";
            $con->exec($updateImageProfile);
            $con = null;
            echo <<<SCRIPT
        <script>
        alert('Foto Profile berhasil diubah!');
        document.location.href = "../pages/profile/profile.php";
        </script>
        SCRIPT;
        } else {
            $con = null;
            echo <<<SCRIPT
        <script>
        alert('Gagal mengunggah file!');
        document.location.href = "../pages/profile/profile.php";
        </script>
        SCRIPT;
        }
    }
} else {
    $con = null;
    echo <<<SCRIPT
        <script>
        alert('Gambar belum dipilih!');
        document.location.href = "../pages/profile/profile.php";
        </script>
        SCRIPT;
}

?>