<?php
require "../db.php";
$pdo = new DB();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $naam = $_POST["naam"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $adres = $_POST["adres"];
    $telefoon = $_POST["telefoon"];

    // Validatie
    $errors = [];

    if (empty($naam)) $errors[] = "Naam is verplicht.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Ongeldig e-mailadres.";
    if (strlen($password) < 6) $errors[] = "Wachtwoord moet minimaal 6 tekens zijn.";
    if (empty($adres)) $errors[] = "Adres is verplicht.";
    if (!preg_match('/^[0-9]{10}$/', $telefoon)) $errors[] = "Ongeldig telefoonnummer.";

    if (empty($errors)) {
        try {
            $pdo->registerUser($naam, $email, $password, $adres, $telefoon);
            echo "Account succesvol aangemaakt!";
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    } else {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Registreren</title>
</head>
<body>
    <h2>Registratieformulier</h2>
    <form method="POST">
        <input type="text" name="naam" placeholder="Naam" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Wachtwoord" required>
        <input type="text" name="adres" placeholder="Adres" required>
        <input type="text" name="telefoon" placeholder="Telefoonnummer" required>
        <input type="submit" name="submit" value="Registreren">
    </form>
</body>
</html>
