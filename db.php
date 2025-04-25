<?php
class Database {
    public $pdo;

    public function __construct($db = "winkel", $user = "root", $pwd = "", $host = "localhost") {
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pwd);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "connected to database $db";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

}

$db = new Database ()
?>
