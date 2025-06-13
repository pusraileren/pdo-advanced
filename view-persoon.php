<?php

require "../db.php"; 

$personen = $pdo->getPersonen();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Overzicht personen</h2>
    <table border="1">
    <tr>
        <th>ID</th>
        <th>Naam</th>
        <th>geboortedatum</th>
        <th colspan="2">Action</th>
    </tr>

        <?php
         $personen = $pdo->getPersonen();
         if (!empty($personen)) {
        foreach ($personen as $persoon) {
            echo "<tr>";
                echo "<td>" .$persoon['persoonId']."</td>";
                echo "<td>" .$persoon['naam']."</td>";
                echo "<td>" .$persoon['geboortedatum']."</td>";
                echo "<td><a href=update-product.php?persoonId='" .$persoon['persoonId']."'>Edit</a></td>";
                 echo "<td><a href=delete-product.php?persoonId='" .$persoon['persoonId']."'>Delete</a></td>";

            echo "<tr>";
        }
    } else {
        echo "Geen data gevonden.";
    }
        ?>
    </table>
</body>
</html>