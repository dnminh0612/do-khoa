<?php
$servername = "localhost";
$username = "id10513533_qlmp";
$password = "123456";
$options=array(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
try {
    $conn = new PDO("mysql:host=$servername;dbname=id10513533_qlmp", $username, $password,$options);
    
    //echo "connected: ";
} catch (PDOException $e) {
    echo "connection failed: " . $e->getMessage();
}

?>
