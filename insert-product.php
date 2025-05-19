<?php
require "../db.php";
try{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['naam']) && isset($_POST['geboortedatum']) ) {
        $pdo->insertPersoon($_POST['naam'], $_POST['geboortedatum']);
        echo "persoon toegevoegd";
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
        <input type="text" name="naam" placeholder="Naam" required>
        <input type="date" name="geboortedatum" placeholder="geboortedatum" required>
        <input type="submit">
    </form>
</body>
</html>