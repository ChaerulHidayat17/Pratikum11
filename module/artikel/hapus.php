<?php

include_once("Database.php");

// Buat objek database
$db = new Database();

if (isset($_GET['nim'])) {
    $nim_to_delete = $_GET['nim'];

    // Query untuk menghapus data dengan NIM tertentu dari tabel 'mahasiswa'
    $query = "DELETE FROM mahasiswa WHERE nim = '$nim_to_delete'";
    $result = $db->query($query);

    if ($result) {
        echo "Data dengan NIM $nim_to_delete berhasil dihapus.";
    } else {
        echo "Gagal menghapus data.";
    }
} else {
    echo "NIM tidak ditemukan.";
}

?>
