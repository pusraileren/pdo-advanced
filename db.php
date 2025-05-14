<?php
class DB {
    public $pdo;

    public function __construct($db = "winkel", $host = "localhost", $user = "root", $pass = "") {
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function aanmelden($naam, $email, $password, $adres) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO user (naam, email, password, adres) VALUES (:naam, :email, :password, :adres)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            "naam" => $naam,
            "email" => $email,
            "password" => $hash,
            "adres" => $adres
        ]);
    }

    public function registerUser($naam, $email, $password, $adres, $telefoon) {
        $hash = password_hash($password, PASSWORD_DEFAULT);

        // Controleer of email al bestaat
        $check = $this->pdo->prepare("SELECT COUNT(*) FROM user WHERE email = :email");
        $check->execute(["email" => $email]);
        if ($check->fetchColumn() > 0) {
            throw new Exception("Email is al geregistreerd.");
        }

        $sql = "INSERT INTO user (naam, email, password, adres, telefoon)
                VALUES (:naam, :email, :password, :adres, :telefoon)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            "naam" => $naam,
            "email" => $email,
            "password" => $hash,
            "adres" => $adres,
            "telefoon" => $telefoon
        ]);
    }
}

$pdo = new DB();
?>

