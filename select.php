<?php
    function query_select($sql)
    {
        $table = array();
        try {
            include 'connect.php';
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $table = $stmt;
            $conn = null;
        } catch (PDOException $e) {
            echo "connection failed: " . $e->getMessage();
        }
        return $table;
    }
?>