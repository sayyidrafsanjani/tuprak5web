<?php
session_start();
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Website</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body{font-family:Arial,Helvetica,sans-serif;margin:0;padding:0;background:#f0f0f0}
        header, footer{background:#280872;color:#fff;text-align:center;padding:15px 0}
        main{display:flex;justify-content:center;align-items:center;height:70vh}
        .login-box{width:300px;background:#fff;padding:25px;border-radius:10px;box-shadow:0 0 10px rgba(0,0,0,0.2)}
        .login-box h2{text-align:center;margin-bottom:20px;color:#333}
        input[type=text],input[type=password]{width:100%;padding:10px;margin-bottom:15px;border:1px solid #ccc;border-radius:5px}
        input[type=submit]{background:#280872;color:#fff;border:none;padding:10px;width:100%;border-radius:5px;cursor:pointer}
        input[type=submit]:hover{background:#330b8f}
    </style>
</head>
<body>
    <header>HEADER</header>
    <main>
        <section class="login-box">
            <h2>Login</h2>
            <form method="post" action="ceklogin.php">
                <label>Username</label>
                <input type="text" name="username" required>
                <label>Password</label>
                <input type="password" name="password" required>
                <input type="submit" value="Login">
            </form>
        </section>
    </main>
    <footer>FOOTER</footer>
</body>
</html>
