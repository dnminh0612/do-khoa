<?php
$servername = "ec2-50-19-114-27.compute-1.amazonaws.com";
$username = "lazvglaoydhsek";
$password = "a80d4e1586a4934f0d7e30c25d2e54dbcb69000b8ec7208d6d341b042368e06b";
$options=array(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
try {
    // $conn = new PDO("mysql:host=$servername;dbname=dbanee5sahaek4", $username, $password,$options);
    $conn = new PDO('pgsql:host=ec2-50-19-114-27.compute-1.amazonaws.com;dbname=dbanee5sahaek4', 'lazvglaoydhsek', 'a80d4e1586a4934f0d7e30c25d2e54dbcb69000b8ec7208d6d341b042368e06b');
    // $conn = pg_connect("host=ec2-50-19-114-27.compute-1.amazonaws.com port=5432 dbname=dbanee5sahaek4 user=lazvglaoydhsek password=a80d4e1586a4934f0d7e30c25d2e54dbcb69000b8ec7208d6d341b042368e06b");
    
    //echo "connected: ";
} catch (PDOException $e) {
    echo "connection failed: " . $e->getMessage();
}

?>
