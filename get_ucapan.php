<?php
include 'db.php';

$result = $conn->query("SELECT nama, pesan AS ucapan, created_date AS waktu FROM db_ulasan ORDER BY created_date DESC");

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<li class='list-group-item' style='margin-bottom:20px;'><strong>" . htmlspecialchars($row["nama"]) . "</strong>: " . htmlspecialchars($row["ucapan"]) . "<br><small>" . $row["waktu"] . "</small></li>";
    }
} else {
    echo "<li class='list-group-item'>Belum ada ucapan.</li>";
}

$conn->close();
