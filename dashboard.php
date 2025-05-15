<?php
session_start();
if(empty($_SESSION['login_status'])){
    header("Location: login.php") ;
    exit;
}
echo "welkom";

echo "<a href='logout.php'>Logout</a>";

?>