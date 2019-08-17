<?php
$servername = "ec2-54-243-197-120.compute-1.amazonaws.com";
$username = "ccwekdggescbgx";
$password = "1285fc30772fa73e9a1082fc0e1997a1aa9908a1b4004b1c79922d1887dede52";
$db = "dijrh1n975ppm";
$options=array(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
try {
    $conn = new PDO("pgsql:host=$servername;dbname=$db", $username, $password,$options);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    //echo "connected: ";
} catch (PDOException $e) {
    echo "connection failed: " . $e->getMessage();
}

?>
