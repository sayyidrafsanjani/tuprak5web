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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    form {
      background-color: #fff;
      padding: 2rem;
      margin: 1rem 0;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
    }
  </style>
</head>
<body>
  <header class="bg-dark text-white text-center py-3">
    <h1>Dashboard</h1>
    <p style="position:absolute; top:10px; right:20px;">Hi, <?php echo htmlspecialchars($username); ?></p>
  </header>
  <div class="container-fluid">
    <div class="row">
      <aside class="col-md-3 col-lg-2 bg-secondary text-white min-vh-100 p-3">
        <nav class="nav flex-column">
          <a class="nav-link active bg-primary text-white" href="dashboard.php">Dashboard</a>
          <a class="nav-link text-white" href="makanan.php">Makanan Khas</a>
          <a class="nav-link text-white" href="logout.php">Keluar</a>
        </nav>
      </aside>
      <main class="col-md-9 col-lg-10 p-4">
        <h2 class="mb-4">Selamat Datang di Dashboard</h2>
        <p>Halo <strong><?php echo htmlspecialchars($username); ?></strong>! Anda berhasil login ke sistem.</p>
        <p>Gunakan menu di sebelah kiri untuk menjelajahi halaman lain, seperti daftar <em>Makanan Khas Sulawesi Selatan</em>.</p>
      </main>
    </div>
  </div>
</body>
</html>
