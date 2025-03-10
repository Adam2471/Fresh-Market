<?php
include "config.php";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daftar Sayur yang Dijual</title>
    <link rel="stylesheet" href="styles.css" />
</head>
<body>
    <header>
        <h1>Daftar Sayur yang Dijual</h1>
        <nav>
            <ul>
                <li><a href="index.php">Kembali ke Beranda</a></li>
                <li><a href="#about">Tentang</a></li>
                <li><a href="#services">Layanan</a></li>
                <li><a href="#contact">Kontak</a></li>
            </ul>
        </nav>
    </header>

    <section id="sayur-list">
        <h2>Daftar Sayur</h2>
        <table border="1" cellpadding="10">
            <tr>
                <th>Nama Sayur</th>
                <th>Harga (Rp)</th>
                <th>Stok</th>
            </tr>
            <?php
            if (mysqli_connect_errno()) {
                echo "<tr><td colspan='3' style='color:red;'>Koneksi ke database gagal!</td></tr>";
            } else {
                $query = "SELECT * FROM sayur";
                $stmt = mysqli_prepare($conn, $query);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                        echo "<td>" . number_format($row['harga'], 0, ',', '.') . "</td>";
                        echo "<td>" . intval($row['stok']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>Tidak ada data</td></tr>";
                }
            }
            ?>
        </table>
    </section>

    <footer>
        <p>&copy; 2025 Website Fresh Market. Semua hak dilindungi.</p>
    </footer>
</body>
</html>
