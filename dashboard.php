<?php
session_start();
if (empty($_SESSION['login']) || empty($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="left">Dashboard</div>
        <div class="right">Hi, <?php echo htmlspecialchars($username); ?></div>
    </header>
    <nav>
        <a href="dashboard.php">Dashboard</a>
        <a href="makanan.php">Makanan Khas</a>
        <a href="logout.php">Keluar</a>
    </nav>
    <main>
        <h2>Selamat Datang</h2>
        <p>Anda telah berhasil login.</p>
    </main>
    <footer>FOOTER</footer>
</body>
</html>
