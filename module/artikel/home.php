<?php
include_once("Database.php");

// Buat objek database
$db = new Database();

// Mendapatkan semua artikel dari tabel 'artikel'
$articles = $db->get('artikel');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<header>
    <h1>Selamat Datang di Situs Kami</h1>
</header>

<nav>

    <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="artikel.php">Artikel</a></li>
        <li><a href="kontak.php">Kontak</a></li>
    </ul>
</nav>

<section>
    <h2>Artikel Terbaru</h2>
    <ul>
        <?php foreach ($articles as $article): ?>
            <li>
                <h3><?php echo $article['judul']; ?></h3>
                <p><?php echo $article['konten']; ?></p>
                <!-- Tambahkan link ke halaman detail artikel jika diperlukan -->
                <a href="artikel.php?id=<?php echo $article['id']; ?>">Baca Selengkapnya</a>
            </li>
        <?php endforeach; ?>
    </ul>
</section>

<footer>
    <p>&copy; 2024 Situs Kami. Hak Cipta Dilindungi.</p>
</footer>

</body>
</html>
