<?php

include_once("Database.php");

// Buat objek database
$db = new Database();

// Routing Aplikasi
$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);

switch ($request_uri[0]) {
    case '/':
        // Halaman Beranda
        include 'home.php.php';
        break;
    case '/artikel':
        // Halaman Hapus
        include 'hapus.php.php';
        break;
    case '/kontak':
        // Halaman Tambah
        include 'tambah.php.php';
        break;
    case '/kontak':
        // Halaman Ubah
        include 'ubah.php';
        break;


    default:
        // Jika rute tidak ditemukan, tampilkan halaman 404
        header('HTTP/1.0 404 Not Found');
        include '404.php';
        break;
}
// Mengambil semua data dari tabel 'mahasiswa'
$query = "SELECT * FROM mahasiswa";
$result = $db->query($query);

if ($result) {
    // Jika query berhasil, tampilkan data dalam bentuk tabel
    echo "<table border='1'>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Kelas</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['nim']}</td>
                <td>{$row['nama']}</td>
                <td>{$row['kelas']}</td>
              </tr>";
    }

    echo "</table>";
} else {
    // Jika query gagal, tampilkan pesan kesalahan
    echo "Gagal mengambil data.";
}

?>
