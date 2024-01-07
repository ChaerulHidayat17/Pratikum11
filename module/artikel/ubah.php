<?php

include_once("Database.php");

// Buat objek database
$db = new Database();

if (isset($_GET['nim'])) {
    $nim_to_update = $_GET['nim'];

    // Query untuk mengambil data dengan NIM tertentu dari tabel 'mahasiswa'
    $query = "SELECT * FROM mahasiswa WHERE nim = '$nim_to_update'";
    $result = $db->query($query);

    if ($result) {
        $row = $result->fetch_assoc();

        // Proses perubahan data
        if (isset($_POST['submit'])) {
            $nama = $_POST['nama'];
            $kelas = $_POST['kelas'];

            // Query untuk melakukan update data ke dalam tabel 'mahasiswa'
            $update_query = "UPDATE mahasiswa SET nama = '$nama', kelas = '$kelas' WHERE nim = '$nim_to_update'";
            $update_result = $db->query($update_query);

            if ($update_result) {
                echo "Data berhasil diubah.";
            } else {
                echo "Gagal mengubah data.";
            }
        }

    } else {
        echo "Data dengan NIM $nim_to_update tidak ditemukan.";
    }
} else {
    echo "NIM tidak ditemukan.";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data</title>
</head>
<body>
<h1>Ubah Data</h1>

<?php if (isset($row)): ?>
    <form action="ubah.php?nim=<?php echo $nim_to_update; ?>" method="post">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="<?php echo $row['nama']; ?>" required>
        <br>
        <label for="kelas">Kelas:</label>
        <input type="text" id="kelas" name="kelas" value="<?php echo $row['kelas']; ?>" required>
        <br>
        <button type="submit" name="submit">Ubah Data</button>
    </form>
<?php endif; ?>

<br>
<a href="/">Kembali ke Halaman Beranda</a>
</body>
</html>
