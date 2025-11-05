<?php
session_start();

// daftar akun valid
$users = [
    "admin" => "pass@admiN1",
    "anita" => "pass@anitA2",
    "sapta" => "pass@saptA3",
    "kontol" => "pass@kontoL4"
];

// pastikan request berasal dari form (method POST)
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // amankan input (hapus spasi dan ubah ke huruf kecil)
    $username = strtolower(trim($_POST['username'] ?? ''));
    $password = trim($_POST['password'] ?? '');

    // cek apakah username terdaftar
    if (array_key_exists($username, $users)) {

        // cek apakah password benar
        if ($users[$username] === $password) {
            $_SESSION['username'] = ucfirst($username);
            $_SESSION['login'] = true;

            // arahkan ke dashboard
            header("Location: dashboard.php");
            exit();
        } else {
            echo "<script>alert('Password yang dimasukkan salah'); window.location='login.php';</script>";
            exit();
        }

    } else {
        echo "<script>alert('Username tidak terdaftar'); window.location='login.php';</script>";
        exit();
    }

} else {
    // jika akses langsung tanpa POST
    header("Location: login.php");
    exit();
}
?>
