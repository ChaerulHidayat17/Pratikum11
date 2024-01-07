<?php

include_once("Database.php");

// Buat objek database
$db = new Database();

if (isset($_POST['submit'])) {
    // Tangani penambahan data ke dalam database
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];

    // Query untuk menambah data ke dalam tabel 'mahasiswa'
    $query = "INSERT INTO mahasiswa (nim, nama, kelas) VALUES ('$nim', '$nama', '$kelas')";
    $result = $db->query($query);

    if ($result) {
        echo "Data berhasil ditambahkan.";
    } else {
        echo "Gagal menambahkan data.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
</head>
<body>
<h1>Tambah Data</h1>
<form action="tambah.php" method="post">
    <!-- Formulir untuk menambahkan data -->
    <label for="nim">NIM:</label>
    <input type="text" id="nim" name="nim" required>
    <br>
    <label for="nama">Nama:</label>
    <input type="text" id="nama" name="nama" required>
    <br>
    <label for="kelas">Kelas:</label>
    <input type="text" id="kelas" name="kelas" required>
    <br>
    <button type="submit" name="submit">Tambah Data</button>
</form>

<br>
<a href="/">Kembali ke Halaman Beranda</a>
</body>
</html>
