<?php
require_once 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = trim(htmlspecialchars($_POST["nama"]));
    $ucapan = trim(htmlspecialchars($_POST["ucapan"]));

    if (!empty($nama) && !empty($ucapan)) {
        $stmt = $conn->prepare("INSERT INTO db_ulasan (nama, pesan) VALUES (?, ?)");
        $stmt->bind_param("ss", $nama, $ucapan);

        if ($stmt->execute()) {
            echo "<div class='alert alert-success'>Terima kasih, ucapan Anda telah dikirim!</div>";
        } else {
            echo "<div class='alert alert-danger'>Gagal menyimpan ucapan. Coba lagi!</div>";
        }
        $stmt->close();
    } else {
        echo "<div class='alert alert-danger'>Harap isi semua kolom!</div>";
    }
} else {
    echo "<div class='alert alert-danger'>Metode tidak diizinkan!</div>";
}
