<?php 
    include('../../connect.php'); 
    // unlink('./../../assets/img/dt-3.png');
    $id = $_POST['idd'];
    $query = "DELETE FROM video WHERE video.MaMulti ='$id'";
    // $table = query_select("SELECT * FROM video WHERE video.MaMulti = '$id'");
    // $count = $table->rowCount();
    // foreach($table as $row){
    //     $url = $row['URLHinh'];
    //     // unlink('../../'.$url);
    // }
    $statement = $conn->prepare($query);
    $statement->execute();

?>