<?php
    include "service/database.php";
    session_start();

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE username = '$username' AND email = '$email' AND password = '$password' ";
        $result = $db->query($sql);

        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            $_SESSION['username'] = $data['username'];
            echo "anda berhasil login";
            header("location: dashboard.php");
            exit;
        }   else {
            echo "anda gagal login";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran</title>
</head>
<body>
    <h3>Selamat datang</h3>
    <nav>
        <a href="#">Home</a>
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
    </nav>
    <section>
        <h2>Silahkan login</h2>
        <form action="login.php" method="POST">
            <label for="">Username :</label>
            <input type="text" name="username">
            <br>
            <label for="">Email :</label>
            <input type="email" name="email">
            <br>
            <label for="">Password :</label>
            <input type="password" name="password">
            <br>    
            <button type="submit" name="login">LOGIN</button>
        </form>
    </section>
    
</body>
</html>