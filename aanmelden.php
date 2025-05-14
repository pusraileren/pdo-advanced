<?php
require "../db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $pdo->aanmelden($_POST["naam"], $_POST["email"], $_POST["password"], $_POST["adres"]);
        echo "Account aangemaakt!";
    } catch (PDOException $e) {
        echo $e;
    }
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
        <input type="text" name="naam" placeholder="Naam" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="text" name="adres" placeholder="Adres" required>
        <input type="submit" name="submit">
    </form>
</body>
</html>
