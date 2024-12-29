<?php
require '../../connection/db_connection.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    try {
        $pdo = getConnection();
        $query = "SELECT * FROM materi WHERE id_materi = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            echo "<h3>" . htmlspecialchars($row['judul_materi']) . "</h3>";
            echo "<p><strong>Mata Pelajaran:</strong> " . htmlspecialchars($row['mata_pelajaran']) . "</p>";
            echo "<p>" . nl2br(htmlspecialchars($row['materi'])) . "</p>";
        } else {
            echo "<p class='text-danger'>Materi tidak ditemukan.</p>";
        }
    } catch (PDOException $e) {
        echo "<p class='text-danger'>Terjadi kesalahan: " . $e->getMessage() . "</p>";
    }
} else {
    echo "<p class='text-danger'>ID materi tidak ditemukan.</p>";
}
?>
