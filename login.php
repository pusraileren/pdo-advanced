<?php
require './db.php';
session_start();
if (!empty($_SESSION['login_status'])) {
    header('Location: dashboard.php');
    exit;
}

try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $login = $pdo->login($_POST['email']);
        if ($login && password_verify($_POST['password'], $login['password'])) {
            $_SESSION['login_status'] = true;
            header('Location: dashboard.php');
        } else {
            echo "Verkeerde inloggegevens";
        }
    }
} catch (PDOException $e) {
    echo $e;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Wachtwoord">
        <input type="submit" name="submit" placeholder="Naam">
    </form>
</body>
</html>





